<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

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

        return view('customer.docs.policy_for_investigating_any_grievances_by_a_client_or_designated_representative', [
            'user' => $user,
            'pageTitle' => $pageTitle
        ]);
    }
}
