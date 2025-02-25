<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Address;
use App\Models\ContractFormAmended;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ContractFormAmendedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index($date)
    {
        $date = date('Y');
        $pageTitle = "Contract Form Amended $date";

        $id = Auth::user()->id;

        $address = Address::where('userID', $id)->get();

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $contractForm = ContractFormAmended::where('customerID', Auth::user()->id)->get();
        

        return view('customer.docs.contract_form_amended_2024', [
            'date' => $date, 
            'pageTitle' => $pageTitle, 
            'user' => $user,
            'address' => $address,
            'contractForm' => $contractForm,
        ]);
    }

    public function save(Request $request, $date)
    {
        $request->validate([
            'initial' => ['required', 'string', 'min:3', 'max:5'],
            'clients_signature' => ['required'],
            'client_signed_date' => ['required', 'date'],
            'e_signature' => ['required']
        ], [
            'e_signature' => 'Please check this button to adopt a signature',
            'client_signed_date' => 'Please this field is required',
            'initial' => 'Please enter your initials'
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

            ContractFormAmended::create([
                'clients_signature' => Crypt::encryptString($signatureFileName),
                'initial' => Crypt::encryptString($request->initial),
                'client_signed_date' => Crypt::encryptString($request->client_signed_date),
                'customerID' => Auth::user()->id
            ]);

            Db::commit();

            return redirect()->back()->with(['success' => 'Document Signed Successfully']);
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
