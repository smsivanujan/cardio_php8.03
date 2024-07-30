<?php

use App\Http\Controllers\AccessModelController;
use App\Http\Controllers\AccessPointController;
use App\Http\Controllers\CardioThoraricController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SurgeryTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'token'])->name('user.token');
Route::get('/admin', [UserController::class, 'token'])->name('user.tokenx');
Route::get('/admin/login', [UserController::class, 'token']);

Route::post('/admin/login', [UserController::class, 'login'])->name('login');
Route::get('/admin/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () { //'CheckAccess'

    // Route::get('/activity-log', [ActivityLogController::class, 'view'])->name('activity-log.view');

    // ----------- Create user -----
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/admin/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    // ------------- Create Access Model-------------
    Route::get('/admin/accessModel', [AccessModelController::class, 'index'])->name('access_model.index');
    Route::post('/admin/accessModel/store', [AccessModelController::class, 'store'])->name('access_model.store');
    // Route::post('/admin/accessModel/destroy', [AcesssModelController::class, 'destroy'])->name('access_model.destroy');
    // Route::POST('/admin/accessModel/update', [AcesssModelController::class, 'update'])->name('access_model.update');
    // ----------------- end ----------------

    //--------------- Create Access Point ---------
    Route::get('/admin/accessPoint/{id}', [AccessPointController::class, 'index'])->name('access_point.index');
    Route::post('/admin/accessPoint/store', [AccessPointController::class, 'store'])->name('access_point.store');
    // Route::post('/admin/accessPoint/destroy', [AcesssPointController::class, 'destroy'])->name('access_point.destroy');
    // Route::POST('/admin/accessPoint/update', [AcesssPointController::class, 'update'])->name('access_point.update');
    // -------------- end -------------

    // -------------- Create PermisionController ----------
    // Route::get('/p', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/admin/permission/{id}', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/admin/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    //  -------------------------- end ------------------------

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('index.dashboard');

    //role
    Route::get('role/show', [RoleController::class, 'index'])->name('role.index');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');

     //role
     Route::get('surgeryType/show', [SurgeryTypeController::class, 'index'])->name('surgeryType.index');
     Route::post('surgeryType/store', [SurgeryTypeController::class, 'save'])->name('surgeryType.store');

    // Route::get('surgery/show', [SurgeryController::class, 'index'])->name('surgery.index');

    Route::get('/cardio', [CardioThoraricController::class, 'index'])->name('cardio.index');
    Route::get('/search', [CardioThoraricController::class, 'search'])->name('patient.search');
    Route::post('cardio/save', [CardioThoraricController::class, 'save'])->name('cardio.save');
});
