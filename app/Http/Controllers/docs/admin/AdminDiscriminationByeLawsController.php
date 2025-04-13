<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\DescriminationByeLaws;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDiscriminationByeLawsController extends Controller
{
    public function index($id, $docID)
    {
        $discrimination = DescriminationByeLaws::where('customerID', $id)
            ->where('id', $docID)
            ->get();

        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.descrimination_bye_laws', [
            'discrimination' => $discrimination, 
            'user' => $user
        ]);
    }
}
