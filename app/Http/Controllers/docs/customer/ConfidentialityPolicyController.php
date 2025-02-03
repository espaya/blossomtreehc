<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

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
        
        return view('customer.docs.confidentiality_policy', ['pageTitle' => $pageTitle, 'user' => $user]);
    }
}
