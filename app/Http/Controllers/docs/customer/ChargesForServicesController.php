<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class ChargesForServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = "Charges For Services";

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        return view('customer.docs.charges_for_services', ['pageTitle' => $pageTitle, 'user' => $user]);
    }
}
