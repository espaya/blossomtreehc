<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class ConsentForServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Consent For Services And Financial Agreement';

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        return view('customer.docs.consent_for_services_and_financial_agreement', [
            'pageTitle' => $pageTitle, 
            'user' => $user
        ]);
    }
}
