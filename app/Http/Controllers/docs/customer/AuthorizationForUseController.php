<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class AuthorizationForUseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTile = "Authorization For Use And Disclosure of Protected Health Information";
        
        $generalController = new GeneralController();
        $user = $generalController->userProfile();
        
        return view('customer.docs.authorization_for_use_and_disclosure_of_protected_health_information', [
            'pageTitle' => $pageTile, 
            'user' => $user
        ]);
    }
}
