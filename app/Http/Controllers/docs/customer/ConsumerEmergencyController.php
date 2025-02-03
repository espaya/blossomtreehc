<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class ConsumerEmergencyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $pageTitle = 'Consumer Emergency And Contact Information';

        return view('customer.docs.consumer_emergency_and_contact_information', [
            'user' => $user, 
            'pageTitle' => $pageTitle
        ]);
    }
}
