<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsentForServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        return view('customer.docs.consent_for_services_and_financial_agreement');
    }
}
