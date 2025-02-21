<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\ConsentForServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ConsentForServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Consent For Services And Financial Agreement';

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $consent = ConsentForServices::where('customerID', Auth::user()->id)->get();

        return view('customer.docs.consent_for_services_and_financial_agreement', [
            'pageTitle' => $pageTitle, 
            'user' => $user,
            'consent' => $consent
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'e_signature' => ['required', 'in:1'], // ✅ Checkbox validation
            'medical_record_number' => ['required', 'string'],
            'consent' => ['required', 'string'],
            'client_agent_signature' => ['required'],
            'client_agent_name' => ['required', 'string'],
            'relationship' => ['required', 'string'],
            'client_date_signed' => ['required', 'date']
        ], [
            'e_signature.required' => 'Please check this box to adopt signature',
        ]);

        try 
        {
            DB::beginTransaction();

            $storagePath = public_path('signatures'); // ✅ Better storage practice

            // ✅ Ensure the directory exists
            if (!File::exists($storagePath)) 
            {
                File::makeDirectory($storagePath, 0755, true, true);
            }

            $signatureFileName = null; // ✅ Prevent undefined variable error

            // ✅ Save Client Signature
            if ($request->filled('client_agent_signature')) 
            {
                $signatureData = $request->client_agent_signature;

                if (preg_match('/^data:image\/png;base64,/', $signatureData)) {
                    $image = preg_replace('/^data:image\/png;base64,/', '', $signatureData);
                    $imageData = base64_decode($image);
                    $signatureFileName = 'signature_' . time() . '.png';
                    File::put("$storagePath/$signatureFileName", $imageData);
                }
            } 

            ConsentForServices::create([
                'medical_record_number' => Crypt::encryptString($request->medical_record_number),
                'consent' => Crypt::encryptString($request->consent),
                'client_agent_signature' => Crypt::encryptString($signatureFileName),
                'client_agent_name' => Crypt::encryptString($request->client_agent_name),
                'relationship' => Crypt::encryptString($request->relationship),
                'client_date_signed' => Crypt::encryptString($request->client_date_signed),
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
