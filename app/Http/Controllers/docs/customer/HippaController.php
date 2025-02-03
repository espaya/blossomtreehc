<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class HippaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {        
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $pageTitle = 'Hipaa';
        
        return view('customer.docs.hippa', [
            'user' => $user, 
            'pageTitle' => $pageTitle
        ]);
    }
}
