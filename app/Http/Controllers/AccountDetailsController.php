<?php

namespace App\Http\Controllers;

use App\Mail\UpdateProfileEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AccountDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $pageTitle = 'Account Details';

        $generalController = new GeneralController();
        
        $user = $generalController->userProfile();

        $id = $user->id;

        return view('customer.account.account-details', ['pageTitle' => $pageTitle, 'user' => $user, 'id' => $id]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;

        // Find user by ID
        $user = User::find($id);

        if($user)
        {
            // Validate data
            $validatedData = $request->validate([
                'firstname' => ['required', 'string', 'min:3', 'regex:/^[a-zA-Z .-]+$/'],
                'lastname' => ['required', 'string', 'min:3', 'regex:/^[a-zA-Z .-]+$/'],
                'email' => ['required', 'email', Rule::unique('users')->ignore($id, 'id')], 
                'phone' => ['required', 'string', Rule::unique('users', 'phone')->ignore($id, 'id')],
                'password' => ['nullable'], 
                'new_password' => ['nullable', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'],
                'confirmation_password' => ['nullable', 'same:new_password'],
                'img' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp']
            ]);

            // Check if the provided current password matches the stored hash
            if ($request->filled('password') && !Hash::check($request->input('password'), $user->password)) 
            {
                return redirect()->back()->with(['password_error' => 'Your current password is not correct']);
            }
            else 
            {
                // // Update password only if a new password is provided
                if (!empty($request->new_password)) {
                    $user->password = Hash::make($request->new_password); 
                }

                $validatedData['password'] = $user->password;

                // Check if a new image was uploaded
                if ($request->hasFile('img')) {
                    // Process the image upload
                    $image = $request->file('img');
                    $extension = $image->getClientOriginalExtension();
                    $filename = uniqid() . '.' . $extension; 
                    // Ensure the directory exists
                    if (!Storage::exists('public/profiles')) 
                    {
                        Storage::makeDirectory('public/profiles');
                        chmod(storage_path('app/public/profiles'), 0755); // Set directory permissions
                    }
                    
                    $image->storeAs('public/profiles', $filename); 

                    // Add the image path to the validated data
                    $validatedData['img'] = $filename;
                } else {
                    // Remove 'img' from the data array to prevent it from being updated
                    unset($validatedData['img']);
                }

                // fill model with validated data
                $user->fill($validatedData);
                
                // Save fields that were changed
                if ($user->isDirty())
                {
                    $user->save();

                    // send email notification to user
                    Mail::to(Auth::user()->email)->send(new UpdateProfileEmail($user, ucfirst(auth()->user()->firstname)));
                    
                    return redirect()->back()->with(['success' => 'Profile Updated Successfully']);
                }
            } 

             
        } 
        
        return redirect()->back()->with(['success' => 'No Changes Were Made']);
    }


}
