<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportingPatientAbuseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        return view('customer.docs.reporting_patient_abuse_and_neglect');
    }
}
