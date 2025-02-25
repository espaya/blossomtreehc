<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\ListOfServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ListOfServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $pageTitle = 'List of Services Provided';

        $listOfService = ListOfServices::where('customerID', Auth::user()->id)->get();

        return view('customer.docs.list_for_services_provided', [
            'user' => $user, 
            'pageTitle' => $pageTitle,
            'listOfService' => $listOfService
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'client_legal_signature' => ['required'],
            'client_legal_date' => ['required', 'date'],
            'clients_rep_name' => ['nullable', 'string'],
            'relation_to_client' => ['nullable', 'string'],
            'signature_text' => ['required']
        ], [
            'signature_text.required' => 'Please enter your signature',
            'client_legal_date.required' => 'Please enter the signed date',
            'client_legal_signature.required' => 'Please your signature is required'
        ]);

        try 
        {
            DB::beginTransaction();

            $signatureFileName = null;

            $storagePath = public_path('signatures');

            // ✅ Ensure the directory exists
            if (!File::exists($storagePath)) 
            {
                File::makeDirectory($storagePath, 0755, true, true); 
            }

            // ✅ Save Client Signature
            if ($request->filled('client_legal_signature')) 
            {
                $signatureData = $request->client_legal_signature;
                if (preg_match('/^data:image\/png;base64,/', $signatureData)) {
                    $image = preg_replace('/^data:image\/png;base64,/', '', $signatureData);
                    $imageData = base64_decode($image);
                    $signatureFileName = 'signature_' . time() . '.png';
                    File::put("$storagePath/$signatureFileName", $imageData);
                }
            }

            ListOfServices::create([
                'client_legal_signature' => $signatureFileName ? Crypt::encryptString($signatureFileName) : null,
                'client_legal_date' => $request->client_legal_date ? Crypt::encryptString($request->client_legal_date) : null, 
                'clients_rep_name' => $request->clients_rep_name ? Crypt::encryptString($request->clients_rep_name) : null,
                'relation_to_client' => $request->relation_to_client ? Crypt::encryptString($request->relation_to_client) : null,
                'customerID' => Auth::user()->id,
            ]);

            DB::commit();

            return redirect()->back()->with(['success' => 'Document Signed Successfully']);
        }
        catch(Exception $ex)
        {
            DB::rollBack();

            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
