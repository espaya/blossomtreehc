<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractFormAmendedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index($date)
    {
        $date = date('Y');
        $pageTitle = "Contract Form Amended $date";

        $id = Auth::user()->id;

        $address = Address::where('userID', $id)->get();

        $generalController = new GeneralController();
        $user = $generalController->userProfile();
        

        return view('customer.docs.contract_form_amended_2024', [
            'date' => $date, 
            'pageTitle' => $pageTitle, 
            'user' => $user,
            'address' => $address
        ]);
    }
}
