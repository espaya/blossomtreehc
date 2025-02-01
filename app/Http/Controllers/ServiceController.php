<?php

namespace App\Http\Controllers;

use App\Mail\CustomServiceEmail;
use App\Models\CustomService;
use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $pageTitle = 'Services';

        $generalController = new GeneralController();
        
        $user = $generalController->userProfile();

        // get all services
        $services = Service::orderBy('id', 'asc')->paginate(10);

        return view('customer.account.services', ['pageTitle' => $pageTitle, 'user' => $user, 'services' => $services]);
    }

    public function myCustomService(Request $request)
    {
        $id = Auth::user()->id;

        try 
        {
            $validatedData = $request->validate([
                'myCustomService' => [
                    'required',
                    'string',
                    Rule::unique('custom_service')->where('customerID', $id)
                ]
            ]);

            $customService = CustomService::create([
                'customerID' => $id,
                'myCustomService' => $validatedData['myCustomService'],
            ]);

            // send email notification to the user
            Mail::to(Auth::user()->email)->send(new CustomServiceEmail($customService, ucfirst(Auth::user()->firstname)));

            return redirect()->back()->with(['success' => 'Custom service added successfully']);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
