<?php 
/* 
* Admin routes and middleware
*/
use App\Http\Controllers\admin\AdminCareerController;
use App\Http\Controllers\admin\AdminCustomerController;
use App\Http\Controllers\admin\AdminServiceController;
use App\Http\Controllers\admin\ArchiveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\docs\admin\AdminAdvancedDirectiveController;
use App\Http\Controllers\docs\admin\AdminAuthorizationAgreementController;
use App\Http\Controllers\docs\admin\AdminAuthorizationForUseController;
use App\Http\Controllers\docs\admin\AdminChargesForServicesController;
use App\Http\Controllers\docs\admin\AdminConsentForServices;
use App\Http\Controllers\docs\admin\AdminConsumerBillOfRightController;
use App\Http\Controllers\docs\admin\AdminConsumerEmergencyController;
use App\Http\Controllers\docs\admin\AdminDiscriminationByeLawsController;
use App\Http\Controllers\docs\admin\AdminHipaaController;
use App\Http\Controllers\docs\admin\AdminListOfServicesController;
use App\Http\Controllers\docs\admin\AdminPolicyForInvestigatingController;
use App\Http\Controllers\docs\admin\AdminReportingPatientAbuse;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', '2fa', 'verified','admin']], function(){
    Route::get('/account/admin', [AdminController::class, 'index'])->name('admin')->middleware(['auth', 'admin']);
    Route::get('/account/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customer');
    Route::get('/account/admin/customers/{id}', [AdminCustomerController::class, 'view'])->name('view.admin.customer');

    Route::get('/account/admin/customers/{id}/documents', [AdminCustomerController::class, 'showDocs'])->name('view.admin.customer.docs');

    Route::get('/account/admin/customers/{id}/documents/advance-directive-acknowledgement-hippa-home-care-privacy-rights/{docID}', 
    [AdminAdvancedDirectiveController::class, 'index'])->name('admin.customer.advance.directive');

    Route::get('/account/admin/customers/{id}/documents/authorization-agreement-and-acknowledgement/{docID}', [
        AdminAuthorizationAgreementController::class, 'index'])->name('admin.customer.authorization.agreement');

    Route::get('/account/admin/customers/{id}/documents/authorization-for-use-and-disclosure-of-protected-health-information/{docID}', [
        AdminAuthorizationForUseController::class, 'index'])->name('admin.customer.authorization.for.use');

    Route::get('/account/admin/customers/{id}/documents/charges-for-services/{docID}', [
        AdminChargesForServicesController::class, 'index'])->name('admin.customer.charges.for.services');

    Route::get('/account/admin/customers/{id}/documents/consent-for-services-and-financial-agreement/{docID}', [
        AdminConsentForServices::class, 'index'])->name('admin.customer.consent.for.services');

    Route::get('/account/admin/customers/{id}/documents/consumer-bill-of-rights/{docID}', [
        AdminConsumerBillOfRightController::class, 'index'])->name('admin.customer.consumer.bill');

    Route::get('/account/admin/customers/{id}/documents/consumer-emergency-and-contact-information/{docID}', [
        AdminConsumerEmergencyController::class, 'index'])->name('admin.customer.consumer.emergency');

    Route::get('/account/admin/customers/{id}/documents/hipaa/{docID}', [
        AdminHipaaController::class, 'index'])->name('admin.customer.hipaa');

    Route::get('/account/admin/customers/{id}/documents/list-of-services-provided/{docID}', [
        AdminListOfServicesController::class, 'index'])->name('admin.customer.list.of.service');

    Route::get('/account/admin/customers/{id}/documents/policy-for-investigating-any-grievances-by-a-client-or-designated-representative/{docID}', [
        AdminPolicyForInvestigatingController::class, 'index'])->name('admin.customer.policy.for.investigating');

    Route::get('/account/admin/customers/{id}/documents/reporting-patient-abuse-and-neglect/{docID}', [
        AdminReportingPatientAbuse::class, 'index'])->name('admin.customer.reporting.patient.abuse');

    // Route::get('/account/admin/customers/{id}/documents/consumer-emergency-and-contact-information/{docID}', [
        // AdminDiscriminationByeLawsController::class, 'index'])->name('admin.customer.discrimination.bye.laws');

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
