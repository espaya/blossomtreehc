<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\AuthorizationForUse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AuthorizationForUseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTile = "Authorization For Use And Disclosure of Protected Health Information";
        
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $authorization = AuthorizationForUse::where('customerID', Auth::user()->id)->get();
        
        return view('customer.docs.authorization_for_use_and_disclosure_of_protected_health_information', [
            'pageTitle' => $pageTile, 
            'user' => $user,
            'authorization' => $authorization
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'consent' => ['required'],
            'disclose_to' => ['required'],
            'hiv' => ['nullable'],
            'alcohol_substance' => ['nullable'],
            'psychotherapy' => ['nullable'],
            'other' => ['nullable'],
            'specify' => ['required_if:other,other'],
            'consumer_signature' => ['nullable'],
            'e_signature' => ['nullable'],
            'consumer_date_signed' => ['required_if:e_signature,1'],
            'ee_signature' => ['nullable'],
            'consumer_rep_signature' => ['nullable'],
            'consumer_rep_date_signed' => ['required_if:ee_signature,1'],
            'consumer_name_authority' => ['required_if:ee_signature,1'],
            'signatureText' => ['required_if:e_signature,1'],
            'eeSignatureText' => ['required_if:ee_signature,1']
        ], [
            'signatureText.required_if' => 'Please enter your signature'
        ]);

        try  
        {
            DB::beginTransaction();

            $signatureFileName = null;
            $repSignatureFileName = null;

            $storagePath = public_path('signatures');

            if (!File::exists($storagePath)) {
                File::makeDirectory($storagePath, 0755, true, true);
            }

            if ($request->has('consumer_signature')) {
                $signatureData = $request->consumer_signature;
                $image = preg_replace('/^data:image\/png;base64,/', '', $signatureData);
                $imageData = base64_decode($image);

                $signatureFileName = 'signature_' . time() . '.png';
                $filePath = "$storagePath/$signatureFileName";
                File::put($filePath, $imageData);
            }

            if ($request->has('consumer_rep_signature')) {
                $repSignatureData = $request->consumer_rep_signature;
                $image = preg_replace('/^data:image\/png;base64,/', '', $repSignatureData);
                $imageData = base64_decode($image);

                $repSignatureFileName = 'signature_rep_' . time() . '.png';
                $filePath = "$storagePath/$repSignatureFileName";
                File::put($filePath, $imageData);
            }

            AuthorizationForUse::create([
                'consent' => Crypt::encryptString($request->consent),
                'disclose_to' => Crypt::encryptString($request->disclose_to), // Store as JSON
                'hiv' => $request->hiv ? Crypt::encryptString($request->hiv) : null,
                'alcohol_substance' => $request->alcohol_substance ? Crypt::encryptString($request->alcohol_substance) : null,
                'psychotherapy' => $request->psychotherapy ? Crypt::encryptString($request->psychotherapy) : null,
                'other' => $request->other ? Crypt::encryptString($request->other) : null,
                'specify' => $request->specify ? Crypt::encryptString($request->specify) : null,
                'consumer_signature' => $signatureFileName ? Crypt::encryptString($signatureFileName) : null,
                'consumer_date_signed' => $request->consumer_date_signed ? Crypt::encryptString($request->consumer_date_signed) : null,
                'consumer_rep_signature' => $repSignatureFileName ? Crypt::encryptString($repSignatureFileName) : null,
                'consumer_rep_date_signed' => $request->consumer_rep_date_signed ? Crypt::encryptString($request->consumer_rep_date_signed) : null,
                'consumer_name_authority' => $request->consumer_name_authority ? Crypt::encryptString($request->consumer_name_authority) : null,
                'customerID' => Auth::user()->id,
            ]);

            DB::commit();

            return redirect()->back()->with(['success' => 'Document Signed Successfully']);
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }



}
