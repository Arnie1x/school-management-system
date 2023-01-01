<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentActivityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RegisteredUnitsController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UnitActivityController;
use App\Http\Controllers\UnitController;
use App\Models\Department;
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
Route::get('/', [UnitController::class, 'index']);

// Unit Routes + Unit Activity Routes
Route::post('/units/create', [UnitController::class, 'store']);

Route::get('/units/create', [UnitController::class, 'create']);

Route::get('/units/register', [RegisteredUnitsController::class, 'index']);

Route::get('/units/register/{id}', [RegisteredUnitsController::class, 'register']);

Route::get('/units/{id}', [UnitController::class, 'show']);

Route::get('/units/{id}/create', [UnitActivityController::class, 'create']);

Route::post('/units/{id}/create', [UnitActivityController::class, 'store']);

Route::get('/units/{id}/{activity_id}', [UnitActivityController::class, 'showFromUnit']);

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
