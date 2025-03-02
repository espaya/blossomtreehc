<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\AuthorizationAgreement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AuthorizationAgreementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Authorization Agreement And Acknowledgement';

        try 
        {    
            $generalController = new GeneralController();
            $user = $generalController->userProfile();

            $authorization = AuthorizationAgreement::where('customerID', Auth::user()->id)->get();

            return view('customer.docs.authorization_agreement_and_acknowledgement', [
                'pageTitle' => $pageTitle, 
                'user' => $user,
                'authorization' => $authorization
            ]);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'consumer_signature' => ['required'],
            'consumer_signed_date' => ['required'],
            'e_signature' => ['required'],
            'signatureText' => ['required_if:e_signature,1']
        ], [
            'signatureText' => 'Please enter your signature here'
        ]);

        try 
        {
            DB::beginTransaction(); // start transaction

            $signatureFileName = null;

            $storagePath = public_path('signatures');

            if(!File::exists($storagePath))
            {
                File::makeDirectory($storagePath, 0755, true, true);
            }

            if($request->has('consumer_signature'))
            {
                $signatureData = $request->consumer_signature;

                // Decode the base64 string and save as PNG
                $image = str_replace('data:image/png;base64', '', $signatureData);
                $image = str_replace(' ', '+', $image);
                $imageData = base64_decode($image);

                // Generate a unique file name
                $signatureFileName = 'signature_' . time() . '.png';
                $filePath = "$storagePath/$signatureFileName";

                // store
                File::put($filePath, $imageData);
            }

            AuthorizationAgreement::create([
                'consumer_signature' => Crypt::encryptString($signatureFileName),
                'consumer_signed_date' => Crypt::encryptString($request->consumer_signed_date),
                'customerID' => Auth::user()->id,
            ]);

            DB::commit(); // commit transaction

            return redirect()->back()->with(['success' => 'Document Signed Successfully']);
        }
        catch(Exception $ex)
        {
            DB::rollBack(); // rollback transaction

            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
