<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentActivityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\RegisteredUnitsController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UnitActivityController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Root Route
Route::get('/', [UnitController::class, 'index'])->middleware('auth');

// Authentication Routes

Route::get('/login', function() {
    return view('authentication/login');
});

Route::get('/register', [UserController::class, 'create']);

Route::get('/register/student', [StudentController::class, 'create']);

Route::get('/register/lecturer', [LecturerController::class, 'create']);

Route::get('/register/staff', [StaffController::class, 'create']);

Route::post('/register/student', [StudentController::class, 'store']);

Route::post('/register/lecturer', [LecturerController::class, 'store']);

Route::post('/register/staff', [StaffController::class, 'store']);

Route::get('/registered', function() {
    return view('authentication/registered');
});

Route::post('/users', [UserController::class, 'store']);

Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('login');

Route::post('/logout', [UserController::class, 'logout']);

// Unit Routes + Unit Activity Routes
Route::post('/units/create', [UnitController::class, 'store']);

Route::get('/units/create', [UnitController::class, 'create']);

Route::get('/units/register', [RegisteredUnitsController::class, 'index']);

Route::get('/units/register/{id}', [RegisteredUnitsController::class, 'register']);

Route::get('/units/{id}', [UnitController::class, 'show']);

Route::get('/units/{id}/create', [UnitActivityController::class, 'create']);

Route::post('/units/{id}/create', [UnitActivityController::class, 'store']);

Route::get('/units/{id}/delete', [UnitController::class, 'delete']);

Route::get('/units/{id}/{activity_id}', [UnitActivityController::class, 'showFromUnit']);

Route::get('/units/{id}/{activity_id}/delete', [UnitActivityController::class, 'delete']);

// Course Routes
Route::post('/courses/create', [CourseController::class, 'store']);

Route::get('/courses/create', [CourseController::class, 'create']);

// School Routes
Route::post('/schools/create', [SchoolController::class, 'store']);

Route::get('/schools/create', [SchoolController::class, 'create']);

//Department Routes + Department Activity Routes
Route::post('/departments/create', [DepartmentController::class, 'store']);

Route::get('/departments/create', [DepartmentController::class, 'create']);

Route::get('/departments/{id}', [DepartmentController::class, 'show']);

Route::get('/departments/{id}/create', [DepartmentActivityController::class, 'create']);

Route::post('/departments/{id}/create', [DepartmentActivityController::class, 'store']);

Route::get('/departments/{id}/delete', [DepartmentController::class, 'delete']);

Route::get('/departments/{id}/{activity_id}/delete', [DepartmentActivityController::class, 'delete']);

// Admin Routes

Route::get('/admin', function() {
    return view('admin/admin');
});

// Application Routes
Route::get('/applications/student', [ApplicationController::class, 'student']);

Route::get('/applications/lecturer', [ApplicationController::class, 'lecturer']);

Route::get('/applications/staff', [ApplicationController::class, 'staff']);

Route::get('/applications/{id}/accept', [ApplicationController::class, 'accept']);

Route::get('/applications/{id}/reject', [ApplicationController::class, 'reject']);