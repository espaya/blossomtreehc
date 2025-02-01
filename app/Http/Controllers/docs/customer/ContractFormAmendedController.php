<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractFormAmendedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        return view('customer.docs.contract_form_amended_2024');
    }
}
