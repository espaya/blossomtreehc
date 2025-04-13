<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorizationForUse;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAuthorizationForUseController extends Controller
{
    public function index($id, $dcoID)
    {
        $authorization = AuthorizationForUse::where('customerID', $id)
            ->where('id', $dcoID)
            ->get();

        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.authorization_for_use_and_disclosure_of_protected_health_information', [
            'authorization' => $authorization, 
            'user' => $user
        ]);
    }
}
