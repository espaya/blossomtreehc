<?php


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CareerController;

use App\Http\Controllers\TwoFactorController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\docs\customer\ConfidentialityPolicyController;
use App\Http\Controllers\docs\customer\ContractFormAmendedController;
use App\Http\Controllers\docs\customer\ContractorBioController;


// Guest Routes
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () { 
        $pageTitle = 'Sign In';  
        return view('auth.login', ['pageTitle' => $pageTitle]); 
    });
    Route::get('/account', function () {
        $pageTitle = 'Sign In';
        return view('auth.login', ['pageTitle' => $pageTitle]); 
    });
    Route::get('/account/password-reset', function(){ 
        $pageTitle = 'Password Reset';
        return view('auth.email', ['pageTitle' => $pageTitle]); 
    })->name('password.reset');

    // Auth routes
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::post('/account', [LoginController::class, 'login'])->name('login');
    Route::get('/account/register', function(){ return view('auth.register'); })->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->middleware('throttle:registration');
    Route::post('/account/logout', [LoginController::class, 'logout'])->name('logout');

    // career page route
    Route::get('/career', function(){
        $pageTitle = 'Career';
        return view('career.career', ['pageTitle' => $pageTitle]);
    });

    Route::post('/career', [CareerController::class, 'save'])->name('career.save');  
});

// Email Verification Routes
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () { return view('auth.verify'); })->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/account/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent to your email!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');




Route::group(['middleware' => ['auth']], function(){
    // Route to show the 2FA setup page
    Route::get('/2fa/setup', [TwoFactorController::class, 'showSetupForm'])->name('2fa.setup'); 
    // Route to verify the 2FA code
    Route::post('/2fa/verify', [TwoFactorController::class, 'verify'])->name('2fa.verify');
    // Route to regenerate new 2FA code
    Route::post('/2fa/regenerate-opt', [TwoFactorController::class, 'regenerate'])->name('2fa.regenerate');
});

/**
 * Contractor Route
 * **/
Route::group(['middleware' => ['auth', '2fa', 'verified', 'contractor']], function(){
    Route::get('/account/dashboard/documents/contract-form-amended-{date}', [ContractFormAmendedController::class, 'index'])->name('account.contract.form-amended');
    Route::post('/account/dashboard/documents/contract-form-amended-{date}', [ContractFormAmendedController::class, 'save'])->name('account.contract.form-amended');
    Route::get('/account/dashboard/documents/contractor-bio-review', [ContractorBioController::class, 'index'])->name('account.contractor.bio-review');
    Route::post('/account/dashboard/documents/contractor-bio-review', [ContractorBioController::class, 'save'])->name('account.contractor.bio-review');
    Route::get('/account/dashboard/documents/confidentiality-policy', [ConfidentialityPolicyController::class, 'index'])->name('account.confidentiality.policy');
    Route::post('/account/dashboard/documents/confidentiality-policy', [ConfidentialityPolicyController::class, 'save'])->name('account.confidentiality.policy');

});



/*
* Employee routes and middleware
*/
Route::group(['middleware' => ['auth', '2fa', 'employee']], function(){
    
});

// admin routes
require('admin.php');
// customer routes
require('customer.php');
