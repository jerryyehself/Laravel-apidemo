<?php

use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\ContactListController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\TokenController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//login
Route::post('/token', [TokenController::class, 'store']);

//protected
Route::group(['middleware' => ['auth:sanctum']], function () {
    //auth
    Route::resource('/contactlists', ContactListController::class);
    Route::resource('/companies', CompanyController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/departments', DepartmentController::class);

    //logout
    Route::delete('/token', [TokenController::class, 'destroy']);
});
