<?php

use App\Http\Controllers\DepartmentController;
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

Route::get('/', [UnitController::class, 'index']);

Route::get('/units/{id}', [UnitController::class, 'show']);

Route::get('/units/{id}/{activity_id}', [UnitActivityController::class, 'showFromUnit']);