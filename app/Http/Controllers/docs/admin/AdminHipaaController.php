<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\Hippa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHipaaController extends Controller
{
    public function index($id, $docID)
    {
        $hipaa = Hippa::where('customerID', $id)
            ->where('id', $docID)
            ->get();

        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.hippa', [
            'hipaa' => $hipaa, 
            'user' => $user
        ]);
    }
}
