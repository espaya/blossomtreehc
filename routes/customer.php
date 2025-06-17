<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\docs\customer\DescriminationByeLawsController;
use App\Http\Controllers\docs\customer\DocsController;
use App\Http\Controllers\docs\customer\HippaController;
use App\Http\Controllers\docs\customer\ListOfServicesController;
use App\Http\Controllers\docs\customer\PolicyForInvestigatingController;
use App\Http\Controllers\docs\customer\ReportingPatientAbuseController;
use App\Http\Controllers\docs\customer\ConsentForServicesController;
use App\Http\Controllers\docs\customer\ConsumerBillOfRightController;
use App\Http\Controllers\docs\customer\ConsumerEmergencyController;
use App\Http\Controllers\docs\customer\AdvancedDirectiveController;
use App\Http\Controllers\docs\customer\AuthorizationAgreementController;
use App\Http\Controllers\docs\customer\AuthorizationForUseController;
use App\Http\Controllers\docs\customer\ChargesForServicesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyServicesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AccountDetailsController;
use App\Http\Controllers\AddressController;

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

    Route::get('/account/dashboard/documents/advanced-directive-acknowledgement-hippa-home-care-privacy-rights', [AdvancedDirectiveController::class, 'index'])->name('account.advanced.directive');
    Route::post('/account/dashboard/documents/advanced-directive-acknowledgement-hippa-home-care-privacy-rights', [AdvancedDirectiveController::class, 'save'])->name('account.advanced.directive');

    Route::get('/account/dashboard/documents/authorization-agreement-and-acknowledgement', [AuthorizationAgreementController::class, 'index'])->name('account.authorization.agreement');
    Route::post('/account/dashboard/documents/authorization-agreement-and-acknowledgement', [AuthorizationAgreementController::class, 'save'])->name('account.authorization.agreement');

    Route::get('/account/dashboard/documents/authorization-for-use-and-disclosure-of-protected-health-information', [AuthorizationForUseController::class, 'index'])->name('account.authorization.for.use');

    Route::post('/account/dashboard/documents/authorization-for-use-and-disclosure-of-protected-health-information', [AuthorizationForUseController::class, 'save'])->name('account.authorization.for.use');

    Route::get('/account/dashboard/documents/charges-for-services', [ChargesForServicesController::class, 'index'])->name('account.charges.for.services');

    Route::post('/account/dashboard/documents/charges-for-services', [ChargesForServicesController::class, 'save'])->name('account.charges.for.services');

    Route::get('/account/dashboard/documents/consent-for-services-and-financial-agreement', [ConsentForServicesController::class, 'index'])->name('account.consent.for.services');
    Route::post('/account/dashboard/documents/consent-for-services-and-financial-agreement', [ConsentForServicesController::class, 'save'])->name('account.consent.for.services');

    Route::get('/account/dashboard/documents/consumer-bill-of-rights', [ConsumerBillOfRightController::class, 'index'])->name('account.consumer.bill.of.right');
    Route::post('/account/dashboard/documents/consumer-bill-of-rights', [ConsumerBillOfRightController::class, 'save'])->name('account.consumer.bill.of.right');

    Route::get('/account/dashboard/documents/consumer-emergency-and-contact-information', [ConsumerEmergencyController::class, 'index'])->name('account.consumer.emergency');
    Route::post('/account/dashboard/documents/consumer-emergency-and-contact-information', [ConsumerEmergencyController::class, 'save'])->name('account.consumer.emergency');

    Route::get('/account/dashboard/documents/discrimination-bye-laws', [DescriminationByeLawsController::class, 'index'])->name('account.discrimination.bye-laws');

    Route::get('/account/dashboard/documents/hippa', [HippaController::class, 'index'])->name('account.hippa');
    Route::post('/account/dashboard/documents/hippa', [HippaController::class, 'save'])->name('account.hippa');

    Route::get('/account/dashboard/documents/list-of-services-provided', [ListOfServicesController::class, 'index'])->name('account.list.of.services');
    Route::post('/account/dashboard/documents/list-of-services-provided', [ListOfServicesController::class, 'save'])->name('account.list.of.services');

    Route::get('/account/dashboard/documents/policy-for-investigating-any-grievances-by-a-client-or-designated-representative', [PolicyForInvestigatingController::class, 'index'])->name('account.policy.for.investigating');
    Route::post('/account/dashboard/documents/policy-for-investigating-any-grievances-by-a-client-or-designated-representative', [PolicyForInvestigatingController::class, 'save'])->name('account.policy.for.investigating');

    Route::get('/account/dashboard/documents/reporting-patient-abuse-and-neglect', [ReportingPatientAbuseController::class, 'index'])->name('account.reporting.patient');
    Route::post('/account/dashboard/documents/reporting-patient-abuse-and-neglect', [ReportingPatientAbuseController::class, 'save'])->name('account.reporting.patient');
});