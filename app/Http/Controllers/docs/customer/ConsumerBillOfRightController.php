<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class ConsumerBillOfRightController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Consumer Bill of Rights';
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        return view('customer.docs.consumer_bill_of_rights', ['pageTitle' => $pageTitle, 'user' => $user]);
    }
}
