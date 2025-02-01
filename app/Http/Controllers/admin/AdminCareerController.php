<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\Career;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCareerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        $pageTitle  = 'Career';

        $career = DB::table('careers')->where('archived', 0)->paginate(10);

        return view('admin.career.index', ['career' => $career, 'pageTitle' => $pageTitle, 'user' => $user]);
    }

    public function destroy($id)
    {
        try
        {
            // find application by id
            $career = Career::find($id);

            // delete resume from directory
            unlink('storage/resumes/' . $career->resume);

           // delete record from db
            $career->delete();

            // redirect back with success message
            return redirect()->back()->with(['success' => 'Career application deleted successfully']);
  
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function view($id)
    {
        $generalController = new GeneralController();
        $user = $generalController->userProfile();

        try
        {
            $application = Career::find($id);

            $pageTitle  = ucfirst($application->firstname) . ' ' . ucfirst($application->lastname);

            return view('admin.career.career-single', ['applicant' => $application,  'user' => $user, 'pageTitle' => $pageTitle]);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
