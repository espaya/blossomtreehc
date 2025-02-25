<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\ConfidentialityPolicy;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ConfidentialityPolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Confidentiality Policy';

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $confidentiality_policy = ConfidentialityPolicy::where('customerID', Auth::user()->id)->get();
        
        return view('customer.docs.confidentiality_policy', [
            'pageTitle' => $pageTitle, 
            'user' => $user,
            'confidentiality_policy' =>  $confidentiality_policy
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'signature' => ['required'],
            'date_signed' => ['required', 'date'],
        ]);

        try 
        {
            DB::beginTransaction();

            $storagePath = public_path('signatures');

            // ✅ Ensure the directory exists
            if (!File::exists($storagePath)) 
            {
                File::makeDirectory($storagePath, 0755, true, true);
            }

            // ✅ Save Client Signature
            if ($request->filled('signature')) 
            {
                $signatureData = $request->signature;

                if (preg_match('/^data:image\/png;base64,/', $signatureData)) {
                    $image = preg_replace('/^data:image\/png;base64,/', '', $signatureData);
                    $imageData = base64_decode($image);
                    $signatureFileName = 'signature_' . time() . '.png';
                    File::put("$storagePath/$signatureFileName", $imageData);
                }
            }

            DB::commit();

            ConfidentialityPolicy::create([
                'signature' => Crypt::encryptString($signatureFileName),
                'date_signed' => Crypt::encryptString($request->date_signed),
                'customerID' => Auth::user()->id,
            ]);

            return redirect()->back()->with(['success' => 'Document Signed Successfully']);
        }
        catch(Exception $ex)
        {
            DB::rollBack();

            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
