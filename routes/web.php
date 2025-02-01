<?php

use App\Http\Controllers\AccountDetailsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\admin\AdminCareerController;
use App\Http\Controllers\admin\AdminCustomerController;
use App\Http\Controllers\admin\AdminServiceController;
use App\Http\Controllers\admin\ArchiveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyServicesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TwoFactorController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\docs\customer\DocsController;

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

// Customer Routes and Middleware
Route::group(['middleware' => ['auth', '2fa','verified', 'customer']], function() {
    Route::get('/account/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/account/dashboard/account-details', [AccountDetailsController::class, 'index'])->name('account.details');
    Route::post('/account/dashboard/account-details/update', [AccountDetailsController::class, 'update'])->name('update.account.details');
    Route::get('/account/dashboard/my-address', [AddressController::class, 'index'])->name('my.address');
    Route::post('/account/dashboard/my-address/save', [AddressController::class, 'save'])->name('save.my.address');
    Route::post('/account/dashboard/my-address/update', [AddressController::class, 'update'])->name('update.my.address');
    Route::get('/account/dashboard/service', [ServiceController::class, 'index'])->name('view.service');
    Route::post('/account/dashboard/service/', [ServiceController::class, 'myCustomService'])->name('myCustomService.save');
    Route::get('/account/dashboard/my-services', [MyServicesController::class, 'index'])->name('my.services'); 
    Route::post('/account/dashboard/my-services/subscribe', [MyServicesController::class, 'subscribe'])->name('subscribe');
    Route::delete('/account/dashboard/my-services/unsubscribe', [MyServicesController::class, 'unsubscribe'])->name('unsubscribe');
    Route::delete('/account/dashboard/my-services/custom-unsubscribed', [MyServicesController::class, 'customUnsubscribe'])->name('customUnsubscribe');

    /*
    * docs signing routes
    */
    Route::get('/account/dashboard/documents', [DocsController::class, 'index'])->name('account.docs');


});


Route::group(['middleware' => ['auth']], function(){
    // Route to show the 2FA setup page
    Route::get('/2fa/setup', [TwoFactorController::class, 'showSetupForm'])->name('2fa.setup'); 
    // Route to verify the 2FA code
    Route::post('/2fa/verify', [TwoFactorController::class, 'verify'])->name('2fa.verify');
    // Route to regenerate new 2FA code
    Route::post('/2fa/regenerate-opt', [TwoFactorController::class, 'regenerate'])->name('2fa.regenerate');
});


/* 
* Admin routes and middleware
*/
Route::group(['middleware' => ['auth', '2fa', 'verified','admin']], function(){
    Route::get('/account/admin', [AdminController::class, 'index'])->name('admin')->middleware(['auth', 'admin']);
    Route::get('/account/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customer');
    Route::get('/account/admin/customers/{id}', [AdminCustomerController::class, 'view'])->name('view.admin.customer');
    Route::get('/account/admin/services/', [AdminServiceController::class, 'index'])->name('admin.service');
    Route::get('/account/admin/services/add', [AdminServiceController::class, 'add'])->name('admin.add.service');
    Route::post('/account/admin/services/save', [AdminServiceController::class, 'save'])->name('admin.save.service');
    Route::get('/account/admin/services/edit/{id}', [AdminServiceController::class, 'edit'])->name('admin.edit.service');
    Route::post('/account/admin/services/update/{id}', [AdminServiceController::class, 'update'])->name('admin.update.service');
    Route::delete('/account/admin/services/delete/{id}', [AdminServiceController::class, 'destroy'])->name('admin.delete.service');
    Route::get('/account/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/account/admin/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('/account/admin/career', [AdminCareerController::class, 'index'])->name('admin.career');
    Route::get('/account/admin/career/{id}', [AdminCareerController::class, 'view'])->name('career.single');
    Route::delete('/account/admin/career/delete/{id}', [AdminCareerController::class, 'destroy'])->name('career.delete');
    Route::get('/account/admin/archive', [ArchiveController::class, 'index'])->name('admin.archive');
    Route::patch('/account/admin/archive', [ArchiveController::class, 'patch'])->name('career.archive');
    Route::patch('/account/admin/archive/restore',[ArchiveController::class, 'restore'])->name('career.restore');
    Route::post('/account/admin/customers/search', [AdminCustomerController::class, 'search'])->name('search');

    Route::delete('/account/admin/customers/delete/{id}', [AdminCustomerController::class, 'deleteCustomer'])->name('delete.customer');
});

/*
* Employee routes and middleware
*/
Route::group(['middleware' => ['auth', '2fa', 'employee']], function(){
    
});
