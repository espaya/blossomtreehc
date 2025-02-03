<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class AuthorizationAgreementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Authorization Agreement And Acknowledgement';

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        return view('customer.docs.authorization_agreement_and_acknowledgement', ['pageTitle' => $pageTitle, 'user' => $user]);
    }
}
