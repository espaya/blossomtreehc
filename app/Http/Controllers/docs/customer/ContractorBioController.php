<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class ContractorBioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $pageTitle = 'Contractor Bio Review';

        return view('customer.docs.contractor_bio_review', [
            'user' => $user, 
            'pageTitle' => $pageTitle
        ]);
    }
}
