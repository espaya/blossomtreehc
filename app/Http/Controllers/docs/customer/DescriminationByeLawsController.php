<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class DescriminationByeLawsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        
        $generalController = new GeneralController(); 
        $user = $generalController->userProfile();

        $pageTitle = 'Discrimination Bye Laws';

        return view('customer.docs.descrimination_bye_laws', [
            'user' => $user, 
            'pageTitle' => $pageTitle
        ]);
    }
}
