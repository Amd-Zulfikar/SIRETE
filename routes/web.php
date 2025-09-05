<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;

// Redirect otomatis jika sudah login
Route::middleware('redirect.role')->get('/', fn()=>view('auth.login'));

Route::middleware(['auth', 'auth.session'])->group(function () {
    
// Admin role
Route::controller(RoleController::class)->group(function () {
        // route for view controller user
        Route::get('/admin/role', 'index')->name('index.role');
        Route::get('/admin/role/add', 'role_add')->name('add.role');
        Route::get('/admin/role/edit/{id},', [RoleController::class, 'role_edit'])->name('edit.role');
        // Route::get('/role/search', 'search')->name('role.search');
        // route for function controller role
        Route::post('/admin/role/store', 'store')->name('store.role');
        Route::post('/role/update/{id}', 'update')->name('update.role');
        // Route::get('/role/delete/{id}', 'delete_role')->name('delete.role');
    });
});

// Admin employee
Route::controller(EmployeeController::class)->group(function () {
        // route for view controller user
        Route::get('/admin/employee', 'index')->name('index.employee');
        Route::get('/admin/employee/add', 'employee_add')->name('add.employee');
        Route::get('/admin/employee/edit/{id},', [EmployeeController::class, 'employee_edit'])->name('edit.employee');
        // Route::get('/role/search', 'search')->name('role.search');
        // route for function controller role
        Route::post('/admin/employee/store', 'store')->name('store.employee');
        Route::post('/admin//employee/update/{id}', 'update')->name('update.employee');
        // Route::get('/role/delete/{id}', 'delete_role')->name('delete.role');
    });

Route::controller(DashboardController::class)->group(function () {
    // route for view controller user
        Route::get('/admin/Dashboard', 'index')->name('admin.dashboard');
        });

// Drafter
Route::middleware(['auth','role:drafter'])->prefix('drafter')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('drafter.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Generic named route 'dashboard' — mengarahkan ke dashboard per role
Route::get('/dashboard', function () {
    if (! Auth::check()) {
        return redirect()->route('login');
    }

    $role = Auth::user()->role;

    switch ($role) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'drafter':
            return redirect()->route('drafter.dashboard');
        case 'checker':
            return redirect()->route('checker.dashboard');
        default:
            return redirect()->route('login');
    }
    })->name('dashboard')->middleware('auth');

require __DIR__.'/auth.php';
