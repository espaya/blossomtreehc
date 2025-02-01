<?php

namespace App\Http\Controllers;

use App\Mail\CareerConfirmationMail;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function __contruct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {

    }

    public function save(Request $request)
    {
        // Validate data
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'min:3'],
            'lastname' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'position' => ['required', 'string'],
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'resume' => ['required', 'file', 'mimes:pdf,docx'],
            'message' => ['required', 'string']
        ]);

        $fileName = '';

        // Upload resume to directory
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            // Check file extension
            if (strtolower($extension) != 'pdf' && strtolower($extension) != 'docx') {
                return redirect()->back()->with(['error' => 'Only PDFs and Word documents (DOCX) are allowed.']);
            }

            $fileName = uniqid() . '.' . $extension;

            // Directory to store resumes (adjust as per your storage setup)
            $directory = storage_path('app/public/resumes');

            // Ensure the directory exists
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // Move the uploaded file to storage
            $file->move($directory, $fileName);
        }

        // Save to database
        $career = new Career();
        $career->firstname = $validatedData['firstname'];
        $career->lastname = $validatedData['lastname'];
        $career->email = $validatedData['email'];
        $career->phone = $validatedData['phone'];
        $career->position = $validatedData['position'];
        $career->resume = $fileName;
        $career->message = $validatedData['message'];
        $career->save();

        // Send confimation email
        Mail::to($validatedData['email'])->send(new CareerConfirmationMail($career, ucfirst($validatedData['firstname']))); 

        return redirect()->back()->with(
            [
                'success' => 'Your application has been submitted and we will get back to you as soon as we can. A confirmation email will be sent to you shortly.'
            ]);
    }

}
