<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\PolicyForInvestigating;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPolicyForInvestigatingController extends Controller
{
    public function index($id, $docID)
    {
        $policy = PolicyForInvestigating::where('customerID', $id)
            ->where('id', $docID)
            ->get();

        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.policy_for_investigating_any_grievances_by_a_client_or_designated_representative', [
            'policy' => $policy,
            'user' => $user
        ]);
    }
}
