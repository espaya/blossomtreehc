<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Address;
use App\Models\AdvancedDirective;
use App\Models\AuthorizationAgreement;
use App\Models\AuthorizationForUse;
use App\Models\ChargesForServices;
use App\Models\ConfidentialityPolicy;
use App\Models\ConsentForServices;
use App\Models\ConsumerBillOfRight;
use App\Models\ConsumerEmergency;
use App\Models\CustomService;
use App\Models\DescriminationByeLaws;
use App\Models\Hippa;
use App\Models\ListOfServices;
use App\Models\MyServices;
use App\Models\PolicyForInvestigating;
use App\Models\ReportingPatientAbuse;
use App\Models\User;
use App\Models\UserDevice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    
    public function index()
    {
        $pageTitle = 'Customers';

        $generalController = new GeneralController(); 
        
        $user = $generalController->userProfile();

        // get customers
        $customers = DB::table('users')->where('role', 'CUSTOMER')->paginate(10);

        return view('admin.customer.customer', ['pageTitle' => $pageTitle, 'user' => $user, 'customers' => $customers]);
    }

    public function showDocs($id)
    {
        $user = Auth::user();

        $customer = User::where('id', $id)->first();
        $pageTitle = ucfirst($customer->firstname) . ' '. ucfirst($customer->lastname);

        /* Get customer forms */
        $advance_directive = AdvancedDirective::where('customerID', $id)->get();
        $authorization_agreement = AuthorizationAgreement::where('customerID', $id)->get();
        $authorization_for_use = AuthorizationForUse::where('customerID', $id)->get();
        $charges_for_services = ChargesForServices::where('customerID', $id)->get();
        $consent_for_services = ConsentForServices::where('customerID', $id)->get();
        $consumer_bill_of_right = ConsumerBillOfRight::where('customerID', $id)->get();
        $consumer_emergency = ConsumerEmergency::where('customerID', $id)->get();
        // $descrimination_bye_laws = DescriminationByeLaws::where('customerID', $id)->get();
        $hippa = Hippa::where('customerID', $id)->get();
        $list_of_services = ListOfServices::where('customerID', $id)->get();
        $policy_for_investigating = PolicyForInvestigating::where('customerID', $id)->get();
        $reporting_patient_abuse = ReportingPatientAbuse::where('customerID', $id)->get();

        return view('admin.customer.single-customer-docs', 
        [
            'user' => $user,
            'advance_directive' => $advance_directive,
            'authorization_agreement' => $authorization_agreement,
            'authorization_for_use' => $authorization_for_use,
            'charges_for_services' => $charges_for_services,
            'consent_for_services' => $consent_for_services,
            'consumer_bill_of_right' => $consumer_bill_of_right,
            'consumer_emergency' => $consumer_emergency,
            // 'descrimination_bye_laws' => $descrimination_bye_laws,
            'hippa' => $hippa,
            'list_of_services' => $list_of_services,
            'policy_for_investigating' => $policy_for_investigating,
            'reporting_patient_abuse' => $reporting_patient_abuse,
            'pageTitle' => $pageTitle,
        ]);
    }

    public function view($id)
    {
        $generalController = new GeneralController(); 
        $user = $generalController->userProfile();

        /**  get customer info **/
        //customer profile
        $profile = DB::table('users')->where('id', $id)->get();

        if($profile)
        {
            if($profile[0]->id == $id)
            {
                //customer address
                $address = DB::table('address')->where('userID', $id)->get();

                // get customer subscribed services
                $myServicesIDs = DB::table('my_services')->where('customerID', $id)->pluck('serviceID');
                
                $services = DB::table('service')->whereIn('id', $myServicesIDs)->get();
                
                $pageTitle = ucfirst($profile[0]->firstname) . ' ' . ucfirst($profile[0]->lastname);

                $customService = DB::table('custom_service')->where('customerID', $id)->orderBy('id', 'desc')->get();

            
                return view('admin.customer.single-customer', 
                [
                    'pageTitle' => $pageTitle, 
                    'user' => $user, 
                    'profile' => $profile, 
                    'address'=> $address,
                    'services' =>  $services,
                    'customService' => $customService,
                ]); 
            }
        }
    }

    public function search(Request $request)
    {
        $pageTitle = 'Customers';

        $generalController = new GeneralController(); 
        
        $user = $generalController->userProfile();

        $searchParam = $request->validate([
            'search' => ['required', 'string']
        ]);

        $searchWord = trim($searchParam['search']);

        try 
        {
            $search = DB::table('users')->where('firstname', 'like', "%$searchWord%")
            ->orWhere('lastname', 'like', "%$searchWord%")
            ->orWhere('phone', 'like', "%$searchWord%")
            ->paginate(10);

            return redirect()->back()->with(['search' => $search]);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function deleteCustomer($id)
    {
        try
        {
            DB::beginTransaction(); // start transaction 

            $deleteCustomer = User::find($id);

            if($deleteCustomer)
            {
                Address::where('userID', $id)->delete();
                CustomService::where('customerID', $id)->delete();
                MyServices::where('customerID', $id)->delete();
                UserDevice::where('user_id', $id)->delete();

                $deleteCustomer->delete();
            }

            DB::commit(); // commit the transaction

            return redirect()->back()->with(['success' => 'Customer and associated data has been deleted successfully']);
        }
        catch(Exception $ex)
        {
            DB::rollback(); // rollback transaction if an error occurs

            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

}
