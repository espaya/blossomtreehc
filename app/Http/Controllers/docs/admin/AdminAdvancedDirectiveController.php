<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\AdvancedDirective;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAdvancedDirectiveController extends Controller
{
    public function index($id, $docID)
    {
        try 
        {
            $advance = AdvancedDirective::where('customerID', $id)->where('id', $docID)->get();

            $user = User::where('id', $id)->first();
            
            return view('admin.customer.docs.advanced_directive_acknowledgement', [
                
                'advance' => $advance,
                'user' => $user
            ]);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
