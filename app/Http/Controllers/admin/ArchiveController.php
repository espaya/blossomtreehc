<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Career;
use Exception;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $pageTitle = 'Archive';

        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $career = Career::where('archived', '1')->paginate(10); 

        return view('admin.archive.archive', ['pageTitle' => $pageTitle, 'user' => $user, 'career' => $career]);
    }

    public function patch(Request $request)
    {
        $request->validate([
            'archive' => ['required', 'regex:/^[0-9]{1,}+$/']
        ]);

        try 
        {
            $career = Career::find($request->archive);

            $career->archived = '1';
            $career->save();

            return redirect()->back()->with('success', 'Application archived successfully');
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with('error', $ex->getMessage());
        }
        
    }

    public function restore(Request $request)
    {
        $request->validate([
            'restore' => ['required', 'regex:/^[0-9]{1,}+$/']
        ]);

        try 
        {
            $career = Career::find($request->restore);
            $career->archived = '0';
            $career->save();

            return redirect()->back()->with('success', 'Career application restored successfully');
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with('error', $ex->getMessage());
        }

    }
}
