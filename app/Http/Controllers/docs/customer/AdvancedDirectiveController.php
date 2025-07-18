<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\AdvancedDirective;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class AdvancedDirectiveController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Advanced Directive Acknowledgement - HIPAA Home Care Privacy Rights';

        try 
        {
            $generalController = new GeneralController();
            $user = $generalController->userProfile();

            $advance = AdvancedDirective::where('customerID', Auth::user()->id)->get();
            
            return view('customer.docs.advanced_directive_acknowledgement', [
                'pageTitle' => $pageTitle, 
                'user' => $user, 
                'advance' => $advance
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
            'medical_record_number' => ['required'],
            'living_will' => ['required'],
            'statutory_power' => ['required'],
            'confirm' => ['required'],
            'clients_signature' => ['required'],
            'clients_signed_date' => ['required'],
            'e_signature' => ['required'],
            'signatureText' => ['required_if:e_signature,1']
        ], [
            'signatureText.required_if' => 'Please enter your signature here'
        ]);

        try 
        {
            DB::beginTransaction(); // begin transaction

            $signatureFileName = null;

            $storagePath = public_path('signatures'); // Correct path

            // Ensure the directory exists
            if (!File::exists($storagePath)) {
                File::makeDirectory($storagePath, 0755, true); // Remove extra boolean parameter
            }


            // convert the clients_signature into png, save the name to the db and the file to the directory
            if($request->has('clients_signature'))
            {
                $signatureData = $request->clients_signature;

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

            AdvancedDirective::create([
                'medical_record_number' => Crypt::encryptString($request->medical_record_number),
                'living_will' => Crypt::encryptString($request->living_will),
                'statutory_power' => Crypt::encryptString($request->statutory_power),
                'clients_signature' => Crypt::encryptString($signatureFileName), // Fixed here
                'confirm' => Crypt::encryptString($request->confirm),
                'clients_signed_date' => Crypt::encryptString($request->clients_signed_date),
                'customerID' => Auth::user()->id
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
