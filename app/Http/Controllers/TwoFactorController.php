<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Mail\TwoFactorCodeMail;
use App\Models\User;
use Exception;
use PragmaRX\Google2FA\Google2FA;


class TwoFactorController extends Controller
{
    // Show 2FA Setup Page (optional if you need a setup page)
    public function showSetupForm()
    {
        $pageTitle = '2fa Verification';

        return view('auth.2fa-setup', ['pageTitle' => $pageTitle]);
    }


    // Verify 2FA Code
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $user = Auth::user();
        $code = $request->code;
        
        $google2fa = new Google2FA();

        $window = 5;

        
        $isValid = $google2fa->verifyKey($user->two_factor_secret, $code, $window);

        if ($isValid) 
        {
            // 2FA Code is valid, proceed
            $user->two_factor_secret = null; // Clear the 2FA secret
            $user->two_factor_enabled = true; // Assuming you have this field
            $user->opt = null;

            $user->save();

            $request->session()->put('2fa:user:id', $user->id);
            $request->session()->put('2fa_verified', true); // After successful verification
            
            Auth::login($user, true);

            // Redirect based on user role
            if ($user->role === 'ADMIN') 
            {    
                return redirect()->route('admin');
            } 
            else if($user->role === 'CUSTOMER')
            {
                return redirect()->route('home'); 
            }
            else if($user->role === 'EMPLOYEE')
            {
                // return redirect()->route('');
            } 
            else 
            {
                return redirect()->route('login');
            }
        }

        // Code is invalid
        return back()->withErrors(['code' => 'Invalid two-factor authentication code.']);
    }


    public function regenerate()
    {
        $user = Auth::user();

        try 
        {
            $google2fa = new Google2FA();
            $secret = $google2fa->generateSecretKey(); // Generate a new secret 
            $getTimestamp = $google2fa->getTimestamp();
            
            $opt = $google2fa->oathTotp($secret, $getTimestamp);
            
            $user->two_factor_secret = $secret;
            $user->opt = $opt;
            $user->save();
    
            Mail::to($user->email)->send(new TwoFactorCodeMail($user, $opt));

            return redirect()->back()->with(['success' => 'New opt has being sent to your email']);
        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

}