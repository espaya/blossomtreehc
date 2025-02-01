<?php

namespace App\Http\Controllers;

use App\Mail\AddServiceEmailNotification;
use App\Mail\ServiceUnsubscribedEmail;
use App\Models\CustomService;
use App\Models\MyServices;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class MyServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $id = Auth::user()->id;

        $pageTitle = 'My Services';

        $generalController = new GeneralController();
        
        $user = $generalController->userProfile();

        // get customer's subscribed service(s)
        $myServicesID = MyServices::where('customerID', $id)->pluck('serviceID');

        $customServices = DB::table('custom_service')->where('customerID', $id)->orderBy('id', 'desc')->get();

        // dd($customServices);

        $myServices = [];
        
        foreach($myServicesID as $item)
        {
            $myServices[] = Service::where('id', $item)->orderBy('id', 'desc')->get();
        }

        $myServices = collect($myServices);


        return view('customer.account.my-services', ['pageTitle' => $pageTitle, 'user' => $user, 'myServices' => $myServices, 'customServices' => $customServices]);
    }

    public function subscribe(Request $request)
    {
        // customer id
        $customerID = Auth::user()->id;

        // dd($customerID);

        // validate service id
        $validatedData = $request->validate([
            'serviceID' => ['required', 'integer']
        ]);

        // Check if the serviceID already exists for this customer
        $alreadyExists = MyServices::where('serviceID', $validatedData['serviceID'])
        ->where('customerID', $customerID)
        ->exists();

        if ($alreadyExists) {
        return redirect()->back()->with(['error' => 'This service has already being added']);
        }

        if($customerID)
        {
            // subscribe customer to the service
            $myServices = MyServices::create([
                'customerID' => $customerID,
                'serviceID' => $validatedData['serviceID']
            ]);

            // send email notification to user
            Mail::to(Auth::user()->email)->send(new AddServiceEmailNotification($myServices, ucfirst(Auth::user()->firstname)));

            return redirect()->back()->with(['success' => 'Service subscribed successfully']);
        }

        return redirect()->back()->with(['error' => 'Could not subscribed to this service']);
    }

    public function unsubscribe(Request $request)
    {
        $validatedData = $request->validate([
            'id' => ['required', 'int']
        ]);

        try 
        {
            $delete = MyServices::where('serviceID', $request->id)->first();

            if($delete)
            {
                $delete->delete();

                // send notification to user
                Mail::to(Auth::user()->email)->send(new ServiceUnsubscribedEmail($delete, ucfirst(Auth::user()->firstname)));

                return redirect()->back()->with(['success' => 'Service unsubscribed successfully']);
            }

            return redirect()->back()->with(['error' => 'Service not found']);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function customUnsubscribe(Request $request)
    {
        $request->validate([
            'id' => ['required', 'int']
        ]);

        try 
        {
            $delete = CustomService::where('id', $request->id)->first();

            if($delete)
            {
                $delete->delete();

                // send notification to user
                Mail::to(Auth::user()->email)->send(new ServiceUnsubscribedEmail($delete, ucfirst(Auth::user()->firstname)));

                return redirect()->back()->with(['success' => 'Service Unsubscribed Successfully']);
            }
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
