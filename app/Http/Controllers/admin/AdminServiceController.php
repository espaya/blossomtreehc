<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\MyServices;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    
    public function index()
    {
        $pageTitle = 'Services';
        $generalController = new GeneralController(); 
        $user = $generalController->userProfile();

        // get services
        $services = Service::orderBy('title', 'asc')->paginate(10);

        return view('admin.service', ['pageTitle' => $pageTitle, 'user' => $user, 'services' => $services]);
    }

    public function add()
    {
        $pageTitle = 'Add Service';
        $generalController = new GeneralController(); 
        $user = $generalController->userProfile();

        return view('admin.add-service', ['pageTitle' => $pageTitle, 'user' => $user]);
    }

    public function save(Request $request)
    {
        // validate inputs
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        // save service to db
        Service::create([
            'title' => $request->title
        ]); 

        return redirect()->back()->with(['success' => 'Service Added Successfully']);
    }
 
    public function edit($id)
    {
        $pageTitle = 'Edit Service';
        $generalController = new GeneralController(); 
        $user = $generalController->userProfile();
        
        $service = Service::find($id);

        return view('admin.edit-service', ['pageTitle' =>$pageTitle, 'user' => $user, 'service' => $service]);
    }

    public function update(Request $request, $id)
    {
        // validate inputs
        $data = $request->validate([
            'title' => ['required', 'string']
        ]);

        // find service by id
        $service = Service::find($id);

        // fill service model with data
        $service->fill($data);

        // save fields that were modified
        if($service->isDirty())
        {
            $service->save();

            return redirect()->back()->with(['success' => 'Service Updated Successfully']);
        }

        // return if no changes were made
        return redirect()->back()->with(['success' => 'No changes were made']);
    }

    public function destroy(Request $request, $id)
    {
        // Find the service by ID
        $service = Service::find($id);

        // Check if the service exists
        if (!$service)
        {
            return redirect()->back()->with(['error' => 'Service not found.']);
        }

        // Find related services subscribed to by users
        $relatedServices = MyServices::where('serviceID', $id)->get();

        try 
        {
            // Begin Transaction
            DB::beginTransaction();

            // Delete the main service
            $service->delete();

            // Check if there are related services and delete them
            if ($relatedServices->isNotEmpty())
            {
                // Use chunking for large deletions
                $relatedServices->chunk(100, function ($services)
                {
                    foreach ($services as $relatedService) 
                    {
                        $relatedService->delete();
                    }
                });
            }

            // Commit Transaction
            DB::commit();

            // Redirect back with success message
            return redirect()->back()->with(['success' => 'Service deleted successfully.']);

        } 
        catch (Exception $ex) 
        {
            // Rollback Transaction on error
            DB::rollBack();

            // Redirect back with error message
            return redirect()->back()->with(['error' => 'Error deleting service.' . $ex->getMessage()]);
        }
    }
}
