<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'Dashboard';

        $generalController = new GeneralController();

        $user = $generalController->userProfile();

        return view('customer.home', ['pageTitle' => $pageTitle, 'user' => $user, 'id' => $user->id]);
    }
}
