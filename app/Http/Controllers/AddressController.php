<?php

namespace App\Http\Controllers;

use App\Mail\AddressEmailNotification;
use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $id = Auth::user()->id;
        $pageTitle = 'My Address';

        $generalController = new GeneralController();
        
        $user = $generalController->userProfile();
        
        // get address info
        $address = DB::table('address')->where('userID', $id)->get();

        return view('customer.account.my-address', ['user' => $user, 'pageTitle' => $pageTitle, 'address' => $address]);

    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validate([
            'address' => ['required', 'string', 'max:150'],
            'addressLine2' => ['nullable', 'string', 'max:150'],
            'city' => ['required', 'max:50'],
            'state' =>['required', 'max:50'],
            'zip' => ['required', 'max:20'],
            'country' => ['required', 'max:50'],
        ]);

        try 
        {    
            $findUser = Address::where('userID', $id)->firstOrFail();
            

            if($findUser)
            {
                // fill model with changes
                $findUser->fill($validatedData);

                if($findUser->isDirty())
                {
                    $findUser->save();

                    // send email notification to the user
                    Mail::to(Auth::user()->email)->send(new AddressEmailNotification($findUser, ucfirst($findUser->firstname)));

                    return redirect()->back()->with(['success' => 'Address Updated Successfully']);
                }
            }

            return redirect()->back()->with(['success' => 'No Changes Were Made']);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }

    }

    public function save(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'address' => ['required', 'string', 'max:150'],
            'addressLine2' => ['nullable', 'string', 'max:150'],
            'city' => ['required', 'max:50'],
            'state' =>['required', 'max:50'],
            'zip' => ['required', 'max:20'],
            'country' => ['required', 'max:50'],
        ]);

        try 
        {    
            $address = new Address();
            $address->userID = $id;
            $address->address = $request->address;
            $address->addressLine2 = $request->addressLine2;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->zip = $request->zip;
            $address->country = $request->country;
            $address->save();

            // send email notification to the user
            Mail::to(Auth::user()->email)->send(new AddressEmailNotification($address, ucfirst(Auth::user()->firstname)));

            return redirect()->back()->with(['success' => 'Address Added Successfully']);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
