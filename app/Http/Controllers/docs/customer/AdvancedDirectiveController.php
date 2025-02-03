<?php

namespace App\Http\Controllers\docs\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;

class AdvancedDirectiveController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'customer']);
    }

    public function index()
    {
        $pageTitle = 'Advanced Directive Acknowledgement - HIPAA Home Care Privacy Rights';

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        return view('customer.docs.advanced_directive_acknowledgement', ['pageTitle' => $pageTitle, 'user' => $user]);
    }
}
