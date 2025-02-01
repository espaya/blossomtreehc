<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Address;
use App\Models\CustomService;
use App\Models\MyServices;
use App\Models\User;
use App\Models\UserDevice;
use Exception;
use Illuminate\Http\Request;
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
                    'customService' => $customService
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
