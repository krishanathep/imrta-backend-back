<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ConcepDevelopmentController;
use App\Http\Controllers\ProposalDevelopmentController;
use App\Http\Controllers\PsubmissionController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\general\PrefixController;
use App\Http\Controllers\general\DepartmentController;
use App\Http\Controllers\general\BudgetController;
use App\Http\Controllers\general\ResearchController;
use App\Http\Controllers\general\StatusController;

use App\Http\Controllers\settings\AboutUsController;
use App\Http\Controllers\settings\BannerController;
use App\Http\Controllers\settings\AdminUserController;
use App\Http\Controllers\settings\NewsController;

use App\Http\Controllers\old\ProjectBController;
use App\Http\Controllers\old\ProjectAController;


use App\Http\Controllers\ShoppingListsMainController;
use App\Http\Controllers\ShoppingListsSecondaryController;
use App\Http\Controllers\ShoppingListsAdditionalController;

use App\Http\Controllers\ConceptsDevelopmentController;
use App\Http\Controllers\ProposalsDevelopmentController;
use App\Http\Controllers\ProposalsSubmissionController;


Route::get('/', function () {
	return view('auth.login');
});

Route::get('admin', AdminDashboardController::class);

Route::resource('products', ProductController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function(){

	Route::resource('/admin', AdminController::class);
	Route::resource('admin-members', MemberController::class);
	Route::resource('admin-shoppinglist', ShoppingListController::class);
	Route::resource('admin-shoppinglist-categorys', CategorysController::class);
	Route::resource('admin-shoppinglist-additional', AdditionalController::class);
	Route::resource('admin-shoppinglist-branch', BranchController::class);

	Route::resource('admin-shoppinglists-main', ShoppingListsMainController::class);
	Route::resource('admin-shoppinglists-secondary', ShoppingListsSecondaryController::class);
	Route::resource('admin-shoppinglists-additional', ShoppingListsAdditionalController::class);

	Route::resource('admin-concept-development', ConceptsDevelopmentController::class);
	Route::resource('admin-proposal-development', ProposalsDevelopmentController::class);
	Route::resource('admin-proposal-submission', ProposalsSubmissionController::class);

	Route::resource('admin-concepdevelopment', ConcepDevelopmentController::class);
	Route::resource('admin-proposaldevelopment', ProposalDevelopmentController::class);
	Route::resource('admin-psubmission', PsubmissionController::class);
	Route::resource('admin-progress', ProgressController::class);
	Route::resource('admin-report', ReportController::class);
	Route::resource('admin-progressreport', ProgressReportController::class);
	Route::resource('admin-settings', SettingsController::class);

	Route::resource('admin-general-prefix', PrefixController::class);
	Route::resource('admin-general-department', DepartmentController::class);
	Route::resource('admin-general-budget', BudgetController::class);
	Route::resource('admin-general-research', ResearchController::class);
	Route::resource('admin-general-status', StatusController::class);

	Route::resource('admin-setting-aboutus', AboutUsController::class);
	Route::resource('admin-setting-banner', BannerController::class);
	Route::resource('admin-setting-admin', AdminUserController::class);
	Route::resource('admin-setting-news', NewsController::class);
	Route::post('admin-setting-news/status/{id}', [NewsController::class, 'status_update']);

	Route::resource('admin-old-projectbudget', ProjectBController::class);
	Route::resource('admin-old-projectapprove', ProjectAController::class);

});

Auth::routes();
