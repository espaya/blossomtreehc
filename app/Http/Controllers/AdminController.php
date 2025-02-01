<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $pageTitle = 'Admin Dashboard';

        $generalController = new GeneralController();
        
        $user = $generalController->userProfile();

        return view('admin.index', ['pageTitle' => $pageTitle, 'user' => $user]);
    }

    public function getRecentActivities()
    {
        // Define a time period for what constitutes "recent"
        $recentPeriod = Carbon::now()->subDays(7); // last 7 days

        // Fetch recent activities from different tables;
        $recentActivities = collect();

        // Fetch recent users
        $recentUsers = DB::table('users')
            ->where('created_at', '>=', $recentPeriod)
            ->select('firstname as entity_name', 'created_at', DB::raw("'User' as entity_type"))
            ->get();

        $recentActivities = $recentActivities->merge($recentUsers);

        // Fetch recent services
        // $recentServices = DB::table('my_service')
        //     ->where('created_at', '>=', $recentPeriod)
        //     ->select('');
    }
}
