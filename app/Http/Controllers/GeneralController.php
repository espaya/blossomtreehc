<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GeneralController extends Controller
{
    public function userProfile()
    {
        try 
        {
            $id = Auth::user()->id;
            $user = User::find($id);
            return $user;
        } 
        catch (Exception $ex) {
            //throw $th;
        }
    }
}
