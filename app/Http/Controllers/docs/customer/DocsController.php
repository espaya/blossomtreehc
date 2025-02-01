<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Documents';
        
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        return view('customer.docs.index', ['pageTitle' => $pageTitle, 'user' => $user]);
    }
}
