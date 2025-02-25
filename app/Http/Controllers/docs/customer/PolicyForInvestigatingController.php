<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\PolicyForInvestigating;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PolicyForInvestigatingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Policy For Investigating Any Grievances By A Client Or Designated Representative';

        $generalController = new GeneralController();
        $user = $generalController->userProfile(); 

        $policy = PolicyForInvestigating::where('customerID', Auth::user()->id)->get();

        return view('customer.docs.policy_for_investigating_any_grievances_by_a_client_or_designated_representative', [
            'user' => $user,
            'pageTitle' => $pageTitle,
            'policy' => $policy
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'clients_rep_name' => ['required', 'string'],
            'clients_rep_date' => ['required', 'date'],
        ], [
           'clients_rep_name.required' => 'Client\'s name or representative\'s name is required', 
           'clients_rep_date.required' => 'Date of signing this document is required'
        ]);

        try 
        {
            DB::beginTransaction();

            PolicyForInvestigating::create([
                'clients_rep_name' => $request->clients_rep_name ? Crypt::encryptString($request->clients_rep_name) : null,
                'clients_rep_date' => $request->clients_rep_date ? Crypt::encryptString($request->clients_rep_date) : null,
                'customerID' => Auth::user()->id,
            ]);

            DB::commit();

            return redirect()->back()->with(['success' => 'Document Signed Successfully']);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
