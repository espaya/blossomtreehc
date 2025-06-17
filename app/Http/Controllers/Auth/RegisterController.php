<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255', 'min:3'],
            'lastname' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'],
            'password_confirmation' => ['same:password'],
            'phone' => ['required'],
            'termsCondition' => ['required'],
            'g-recaptcha-response' => ['required', 'captcha'],  // ReCAPTCHA validation
        ], [
            'firstname.required' => 'This field is required',
            'firstname.string' => 'This field contains invalid inputs',
            'firstname.max' => 'This field is too long',
            'firstname.min' => 'This field is too short.',

            'lastname.required' => 'This field is required',
            'lastname.string' => 'This field contains invalid input',
            'lastname.max' => 'This field is too long',
            'lastname.min' => 'This field is too short',

            'email.required' => 'This field is required',
            'email.string' => 'This field contains invalid inputs',
            'email.email' => 'Invalid email format',
            'email.max' => 'This field is too long',
            'email.unique' => 'Email already exists',

            'password.required' => 'This field is required',
            'password.string' => 'This field contains invalid inputs',
            'password.confirmed' => 'Please confirm the password',
            'password.regex' => 'This field must contain at leat an uppercase, a lowercase, a number and a special characters and not less that 8 characters long',

            'password_confirmation.same' => 'Passwords do not match.',

            'phone.required' => 'This field is required',

            'termsConditions.required' => 'Please accept our terms and conditions',

            'g-recaptcha-response.required' => 'This field is required',
            'g-recaptcha-response.captcha' => 'This field contains invali inputs',
        ]); 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'termsCondition' => strtolower(trim($data['termsCondition'])),
            'email' => strtolower(trim($data['email'])),
            'firstname' => strtolower(trim($data['firstname'])),
            'lastname' => strtolower(trim($data['lastname'])),
            'phone' => trim($data['phone']),
            'password' => Hash::make($data['password']),
        ]);

        // trigger email verification notification
        event(new Registered($user));

        // send a welcome mail to the user
        Mail::to($user->email)->send(new WelcomeMail($user, ucfirst($user->firstname)));

        return $user;
    }
}
