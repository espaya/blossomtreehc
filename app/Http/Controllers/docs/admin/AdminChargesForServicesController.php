<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\ChargesForServices;
use App\Models\User;
use Illuminate\Http\Request;

class AdminChargesForServicesController extends Controller
{
    public function index($id, $docID)
    {
        $charges = ChargesForServices::where('customerID', $id)->where('id', $docID)->get();
        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.charges_for_services', [
            'charges' => $charges, 
            'user' => $user
        ]);
    }
}
