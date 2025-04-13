<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorizationAgreement;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAuthorizationAgreementController extends Controller
{
    public function index($id, $docID)
    {
        $authorizationAgreegment = AuthorizationAgreement::where('customerID', $id)
            ->where('id', $docID)
            ->get();
        
        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.authorization_agreement_and_acknowledgement', [
            'authorizationAgreement' => $authorizationAgreegment, 
            'user' => $user
        ]);
    }
}
