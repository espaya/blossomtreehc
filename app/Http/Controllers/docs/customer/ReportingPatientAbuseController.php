<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\ReportingPatientAbuse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ReportingPatientAbuseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile(); 

        $pageTitle = 'Reporting Patient Abuse And Neglect';

        $reportingPatientAbuse = ReportingPatientAbuse::where('customerID', Auth::user()->id)->get();

        return view('customer.docs.reporting_patient_abuse_and_neglect', [
            'user' => $user, 
            'pageTitle' => $pageTitle,
            'reportingPatientAbuse' => $reportingPatientAbuse
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'clients_signature' => ['required'],
            'clients_date_signed' => ['required', 'date'],
            'signature_text' => ['required']
        ], [
            'clients_signature.required' => 'Client\'s signature is required',
            'clients_date_signed.required' => 'Date this document was signed is required',
            'signature_text' => 'Please enter your signature here'
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

            ReportingPatientAbuse::create([
                'clients_signature' => $signatureFileName ? Crypt::encryptString($signatureFileName) : null,
                'clients_date_signed' => $request->clients_date_signed ? Crypt::encryptString($request->clients_date_signed) : null,
                'customerID' => Auth::user()->id
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
