<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\ChargesForServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ChargesForServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = "Charges For Services";

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $charges = ChargesForServices::where('customerID', Auth::user()->id)->get();

        return view('customer.docs.charges_for_services', [
            'pageTitle' => $pageTitle, 
            'user' => $user,
            'charges' => $charges
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'e_signature' => ['nullable', 'boolean', 'required_without_all:ee_signature'],
            'ee_signature' => ['nullable', 'boolean', 'required_without_all:e_signature'],        

            'clients_signature' => ['nullable', 'required_if:e_signature,1'],
            'clients_signed_date' => ['nullable', 'required_if:e_signature,1', 'date'],

            'clients_rep_signature' => ['nullable', 'required_if:ee_signature,1'],
            'clients_rep_firstname' => ['nullable', 'required_if:ee_signature,1', 'string'],
            'clients_rep_lastname' => ['nullable', 'required_if:ee_signature,1', 'string'],
            'clients_rep_date_signed' => ['nullable', 'required_if:ee_signature,1', 'date'],
        ],[
            'e_signature.required_without_all' => 'At least client\'s or representative\'s signature must be adopted.',
            'ee_signature.required_without_all' => 'At least client\'s or representative\'s signature must be adopted.',
            'clients_signed_date.required_if' => 'The signed date is required',
            'clients_signed_date.date' => 'The signed date must be a valid date format.',
            'clients_rep_firstname' => 'Representative\'s first name is required',
            'clients_rep_lastname' => 'Representative\'s last name is required',
            'clients_rep_date_signed' => 'Representative\'s signed date is required'
        ]);

        try 
        {
            DB::beginTransaction(); // ✅ Add this to start the transaction

            $signatureFileName = null;
            $repSignatureFileName = null;

            $storagePath = public_path('signatures');

            // ✅ Ensure the directory exists
            if (!File::exists($storagePath)) 
            {
                File::makeDirectory($storagePath, 0755, true, true);
            }

            // ✅ Save Client Signature
            if ($request->filled('clients_signature')) 
            {
                $signatureData = $request->clients_signature;
                if (preg_match('/^data:image\/png;base64,/', $signatureData)) {
                    $image = preg_replace('/^data:image\/png;base64,/', '', $signatureData);
                    $imageData = base64_decode($image);
                    $signatureFileName = 'signature_' . time() . '.png';
                    File::put("$storagePath/$signatureFileName", $imageData);
                }
            }

            // ✅ Save Representative Signature
            if ($request->filled('clients_rep_signature')) 
            {
                $repSignatureData = $request->clients_rep_signature;
                if (preg_match('/^data:image\/png;base64,/', $repSignatureData)) {
                    $image = preg_replace('/^data:image\/png;base64,/', '', $repSignatureData);
                    $imageData = base64_decode($image);
                    $repSignatureFileName = 'signature_rep_' . time() . '.png';
                    File::put("$storagePath/$repSignatureFileName", $imageData);
                }
            }

            // ✅ Store in Database
            ChargesForServices::create([
                'clients_signature' => $signatureFileName ? Crypt::encryptString($signatureFileName) : null,
                'clients_signed_date' => $request->clients_signed_date ? Crypt::encryptString($request->clients_signed_date) : null,
                'clients_rep_signature' => $repSignatureFileName ? Crypt::encryptString($repSignatureFileName) : null,
                'clients_rep_firstname' => $request->clients_rep_firstname ? Crypt::encryptString($request->clients_rep_firstname) : null, // ✅ Fixed field reference
                'clients_rep_lastname' => $request->clients_rep_lastname ? Crypt::encryptString($request->clients_rep_lastname) : null,
                'clients_rep_date_signed' => $request->clients_rep_date_signed ? Crypt::encryptString($request->clients_rep_date_signed) : null,
                'customerID' => Auth::id(),
            ]);

            DB::commit(); // ✅ Commit transaction

            return redirect()->back()->with(['success' => 'Document Signed Successfully']);

        }
        catch(Exception $ex)
        {
            DB::rollBack();

            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
