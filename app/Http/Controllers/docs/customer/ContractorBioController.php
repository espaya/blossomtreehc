<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\ContractorBio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ContractorBioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $pageTitle = 'Contractor Bio Review';

        $contractor = ContractorBio::where('customerID', Auth::user()->id)->get();

        return view('customer.docs.contractor_bio_review', [
            'user' => $user, 
            'pageTitle' => $pageTitle,
            'contractor' => $contractor
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'e_signature' => ['required', 'boolean'],
            'date_of_birth' => ['required', 'date'],
            'social_security_number' => ['required'],
            'driver_license_number' => ['required'],
            'home_address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zip_code' => ['required'],
            'telephone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'date_of_hire' => ['required', 'date'],
            'level_of_education' => ['required', 'string'],
            'date_of_background_checks' => ['required', 'date'],
            'date_of_abuse_registry_check' => ['required', 'date'],
            'date_of_misconduct_registry_check' => ['required', 'date'],
            'date_of_substance_abuse_check' => ['required', 'date'],
            'date_of_evaluation' => ['required', 'date'],
            'contractor_signature' => ['required', 'string'],
            'date' => ['required', 'date'],
        ], [
            'e_signature' => 'Please select this field to adopt a signature'
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
            if ($request->filled('contractor_signature')) 
            {
                $signatureData = $request->contractor_signature;
                if (preg_match('/^data:image\/png;base64,/', $signatureData)) {
                    $image = preg_replace('/^data:image\/png;base64,/', '', $signatureData);
                    $imageData = base64_decode($image);
                    $signatureFileName = 'signature_' . time() . '.png';
                    File::put("$storagePath/$signatureFileName", $imageData);
                }
            }

            ContractorBio::create([
                'date_of_birth' => Crypt::encryptString($request->date_of_birth),
                'social_security_number' => Crypt::encryptString($request->social_security_number),
                'driver_license_number' => Crypt::encryptString($request->driver_license_number),
                'home_address' => Crypt::encryptString($request->home_address),
                'city' => Crypt::encryptString($request->city),
                'state' => Crypt::encryptString($request->state),
                'zip_code' => Crypt::encryptString($request->zip_code),
                'telephone' => Crypt::encryptString($request->telephone),
                'date_of_hire' => Crypt::encryptString($request->date_of_hire),
                'level_of_education' => Crypt::encryptString($request->level_of_education),
                'date_of_background_checks' => Crypt::encryptString($request->date_of_background_checks),
                'date_of_abuse_registry_check' => Crypt::encryptString($request->date_of_abuse_registry_check),
                'date_of_misconduct_registry_check' => Crypt::encryptString($request->date_of_misconduct_registry_check),
                'date_of_substance_abuse_check' => Crypt::encryptString($request->date_of_substance_abuse_check),
                'date_of_evaluation' => Crypt::encryptString($request->date_of_evaluation),
                'contractor_signature' => Crypt::encryptString($signatureFileName),
                'date' => Crypt::encryptString($request->date),
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
