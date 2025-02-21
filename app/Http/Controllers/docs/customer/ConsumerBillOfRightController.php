<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\ConsumerBillOfRight;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ConsumerBillOfRightController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Consumer Bill of Rights';
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $consumer_bill = ConsumerBillOfRight::where('customerID', Auth::user()->id)->get();

        return view('customer.docs.consumer_bill_of_rights', [
            'pageTitle' => $pageTitle, 
            'user' => $user,
            'consumer_bill' => $consumer_bill,
        ]); 
    }

    public function save(Request $request)
    {
        $request->validate([
            'e_signature' => ['required_without_all:ee_signature', 'boolean'], // Required if ee_signature is not provided
            'ee_signature' => ['required_without_all:e_signature', 'boolean'], // Required if e_signature is not provided

            'clients_signature' => ['nullable', 'required_if:e_signature,1'], // Required if e_signature is checked
            'clients_date_signed' => ['nullable', 'required_if:e_signature,1'],

            'clients_rep_signature' => ['nullable', 'required_if:ee_signature,1'],
            'clients_rep_firstname' => ['nullable', 'required_if:ee_signature,1'],
            'clients_rep_lastname' => ['nullable', 'required_if:ee_signature,1'],
            'clients_rep_signed_date' => ['nullable', 'required_if:ee_signature,1'],
        ],[
            'e_signature' => 'This signature or client\'s representative signature should be adopt',
            'ee_signature' => 'This signature or client\'s signature should be adopt'
        ]);

        try 
        {
            DB::beginTransaction();

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

            ConsumerBillOfRight::create([
                'clients_signature' => $signatureFileName ? Crypt::encryptString($signatureFileName) : null,
                'clients_date_signed' => $request->clients_date_signed ? Crypt::encryptString($request->clients_date_signed) : null,
                'clients_rep_signature' => $repSignatureFileName ? Crypt::encryptString($repSignatureFileName) : null,
                'clients_rep_firstname' => $request->clients_rep_firstname ? Crypt::encryptString($request->clients_rep_firstname) : null,
                'clients_rep_lastname' => $request->clients_rep_lastname ? Crypt::encryptString($request->clients_rep_lastname) : null,
                'clients_rep_signed_date' =>  $request->clients_rep_signed_date ? Crypt::encryptString($request->clients_rep_signed_date) : null,
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
