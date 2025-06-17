<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Mail\LoginEmailNotification;
use App\Mail\TwoFactorCodeMail;
use App\Models\UserDevice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use PragmaRX\Google2FA\Google2FA;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $agent = new Agent();
        $device = $agent->device();
        $platform = $agent->platform();
        $platformVersion = $agent->version($platform);
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);

        $loginDate = Carbon::now('America/New_York')->format('l, F j, Y, g:i A');

        $deviceInfo = [
            'device' => $device,
            'platform' => $platform,
            'platform_version' => $platformVersion,
            'browser' => $browser,
            'browser_version' => $browserVersion
        ];

        $userId = Auth::id();

        // Check if this device is already in the database
        $existingDevice = UserDevice::where('user_id', $userId)
            ->where('device', $device)
            ->where('platform', $platform)
            ->where('platform_version', $platformVersion)
            ->where('browser', $browser)
            ->where('browser_version', $browserVersion)
            ->first();

        if (!$existingDevice) {
            // It's a new device, send email notification
            Mail::to(Auth::user()->email)->send(new LoginEmailNotification($user, ucfirst(Auth::user()->firstname), $loginDate, implode(' / ', $deviceInfo)));

            // Save the new device in the database
            UserDevice::create([
                'user_id' => $userId,
                'device' => $device,
                'platform' => $platform,
                'platform_version' => $platformVersion,
                'browser' => $browser,
                'browser_version' => $browserVersion,
            ]);
        }

        if (Auth::check()) {
            $request->session()->put('2fa:user:id', $user->id);
            $request->session()->put('2fa:remember', $request->has('remember'));

            $google2fa = new Google2FA();
            $secret = $google2fa->generateSecretKey(); // Generate a new secret 
            $getTimestamp = $google2fa->getTimestamp();

            $opt = $google2fa->oathTotp($secret, $getTimestamp);

            $user->two_factor_secret = $secret;
            $user->opt = $opt;
            $user->save();

            Mail::to($user->email)->send(new TwoFactorCodeMail($user, $opt));
        }

        // Set coookies for remembering email and password
        if ($request->has('remember')) {
            cookie()->queue('remember_email', $request->email, 43200);
            cookie()->queue('remember_password', $request->password, 43200);
        } else {
            cookie()->queue(cookie()->forget('remember_email'));
            cookie()->queue(cookie()->forget('remember_password'));
        }

        return redirect()->route('2fa.setup');
    }

    public function showLoginForm()
    {
        $pageTitle = 'Sign In';
        return view('auth.login', ['pageTitle' => $pageTitle]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ], [
            'email.required' => 'This field is required',
            'email.email' => 'Invalid input',

            'password.required' => 'This field is required',
            'password.string' => 'Invalid input',
            'password.min' => 'Input is too short',
            'recaptcha.required' => 'Please complete the recaptcha',
            'g-recaptcha-response.captcha' => 'Invalid input'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->remember == 1; // Convert to boolean

        if (Auth::attempt($credentials, $remember)) {

            $user = Auth::user();

            $agent = new Agent();
            $device = $agent->device();
            $platform = $agent->platform();
            $platformVersion = $agent->version($platform);
            $browser = $agent->browser();
            $browserVersion = $agent->version($browser);

            $loginDate = Carbon::now('America/New_York')->format('l, F j, Y, g:i A');

            $deviceInfo = [
                'device' => $device,
                'platform' => $platform,
                'platform_version' => $platformVersion,
                'browser' => $browser,
                'browser_version' => $browserVersion
            ];

            $userId = Auth::id();

            // Check if this device is already in the database
            $existingDevice = UserDevice::where('user_id', $userId)
                ->where('device', $device)
                ->where('platform', $platform)
                ->where('platform_version', $platformVersion)
                ->where('browser', $browser)
                ->where('browser_version', $browserVersion)
                ->first();

            if (!$existingDevice) {
                // It's a new device, send email notification
                Mail::to(Auth::user()->email)->send(new LoginEmailNotification($user, ucfirst(Auth::user()->firstname), $loginDate, implode(' / ', $deviceInfo)));

                // Save the new device in the database
                UserDevice::create([
                    'user_id' => $userId,
                    'device' => $device,
                    'platform' => $platform,
                    'platform_version' => $platformVersion,
                    'browser' => $browser,
                    'browser_version' => $browserVersion,
                ]);
            }

            if (Auth::check()) {
                $request->session()->put('2fa:user:id', $user->id);
                $request->session()->put('2fa:remember', $request->has('remember'));

                $google2fa = new Google2FA();
                $secret = $google2fa->generateSecretKey(); // Generate a new secret 
                $getTimestamp = $google2fa->getTimestamp();

                $opt = $google2fa->oathTotp($secret, $getTimestamp);

                $user->two_factor_secret = $secret;
                $user->opt = $opt;
                $user->save();

                Mail::to($user->email)->send(new TwoFactorCodeMail($user, $opt));
            }

            // Set coookies for remembering email and password
            if ($request->has('remember')) {
                cookie()->queue('remember_email', $request->email, 43200);
                cookie()->queue('remember_password', $request->password, 43200);
            } else {
                cookie()->queue(cookie()->forget('remember_email'));
                cookie()->queue(cookie()->forget('remember_password'));
            }

            return redirect()->route('2fa.setup');
        }
    }
}
