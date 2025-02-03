<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class ReportingPatientAbuseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile(); 

        $pageTitle = 'Reporting Patient Abuse And Neglect';

        return view('customer.docs.reporting_patient_abuse_and_neglect', [
            'user' => $user, 
            'pageTitle' => $pageTitle
        ]);
    }

}
