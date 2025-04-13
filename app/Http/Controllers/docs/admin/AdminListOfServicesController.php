<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\ListOfServices;
use App\Models\User;
use Illuminate\Http\Request;

class AdminListOfServicesController extends Controller
{
    public function index($id, $docID)
    {
        $listOfService = ListOfServices::where('customerID', $id)
            ->where('id', $docID)
            ->get();

        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.list_for_services_provided', [
            'listOfService' => $listOfService,
            'user' => $user
        ]);
    }
}
