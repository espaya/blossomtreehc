<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Address;
use App\Models\ConsumerEmergency;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ConsumerEmergencyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $pageTitle = 'Consumer Emergency And Contact Information';

        $consumer_emergency = ConsumerEmergency::where('customerID', Auth::user()->id)->get();

        // check if users address is empty or not
        $isAddress = Address::where('userID', Auth::user()->id)->get();

        return view('customer.docs.consumer_emergency_and_contact_information', [
            'user' => $user, 
            'pageTitle' => $pageTitle,
            'consumer_emergency' => $consumer_emergency,
            'isAddress' => $isAddress
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'soc' => ['required', 'string'],
            'telephone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'cell_phone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'responsible_persons_name' => ['required', 'string'],
            'relationship' => ['required', 'string'],
            'friend_relative_name' => ['required', 'string'],
            'relationship' => ['required', 'string'],
            'primary_physician' => ['required', 'string'],
            'friend_relative_relationship' => ['required', 'string'],
            'responsible_person_home_telephone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'responsible_person_work_phone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'responsible_person_cell_phone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'friend_relative_home_telephone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'friend_relative_work_phone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'friend_relative_cell_phone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'physician_telephone' => ['required', 'regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],

            'messages' => [
                'telephone.regex' => 'The telephone number format is invalid. Use (123) 456-7890 or similar.',
                'cell_phone.regex' => 'The cell phone number format is invalid.',
                'responsible_person_home_telephone.regex' => 'Enter a valid USA phone number.',
                'responsible_person_work_phone.regex' => 'Enter a valid USA phone number.',
                'responsible_person_cell_phone.regex' => 'Enter a valid USA phone number.',
                'friend_relative_home_telephone.regex' => 'Enter a valid USA phone number.',
                'friend_relative_work_phone.regex' => 'Enter a valid USA phone number.',
                'friend_relative_cell_phone.regex' => 'Enter a valid USA phone number.',
                'physician_telephone.regex' => 'Enter a valid USA phone number.',
            ],

        ], [
            'telephone.required' => 'Please enter a telephone number.',
            'cell_phone.required' => 'Please enter a cell phone number.',
            'responsible_person_home_telephone.required' => 'Please enter the home telephone number.',
            'responsible_person_work_phone.required' => 'Please enter the work phone number.',
            'responsible_person_cell_phone.required' => 'Please enter the cell phone number.',
            'friend_relative_home_telephone.required' => 'Please enter the home telephone number for a friend or relative.',
            'friend_relative_work_phone.required' => 'Please enter the work phone number for a friend or relative.',
            'friend_relative_cell_phone.required' => 'Please enter the cell phone number for a friend or relative.',
            'physician_telephone.required' => 'Please enter the physician’s telephone number.',
        ]);

        try 
        {
            DB::beginTransaction();

            ConsumerEmergency::create([
                'soc' => Crypt::encryptString($request->soc),
                'telephone' => Crypt::encryptString($request->telephone),
                'cell_phone' => Crypt::encryptString($request->cell_phone),
                'responsible_persons_name' => Crypt::encryptString($request->responsible_persons_name),
                'relationship' => Crypt::encryptString($request->relationship),
                'responsible_person_home_telephone' => Crypt::encryptString($request->responsible_person_home_telephone),
                'responsible_person_work_phone' => Crypt::encryptString($request->responsible_person_work_phone),
                'responsible_person_cell_phone' => Crypt::encryptString($request->responsible_person_work_phone),
                'friend_relative_name' => Crypt::encryptString($request->responsible_person_work_phone),
                'friend_relative_relationship' => Crypt::encryptString($request->friend_relative_relationship),
                'friend_relative_home_telephone' => Crypt::encryptString($request->friend_relative_home_telephone),
                'friend_relative_work_phone' => Crypt::encryptString($request->friend_relative_work_phone),
                'friend_relative_cell_phone' => Crypt::encryptString($request->friend_relative_cell_phone),
                'primary_physician' => Crypt::encryptString($request->primary_physician),
                'physician_telephone' => Crypt::encryptString($request->physician_telephone),
                'customerID' => Auth::user()->id
            ]);

            DB::commit();

            return redirect()->back()->with(['success' => 'Document Submitted Successfully']);
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
