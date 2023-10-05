<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\functionDetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/state-details', [functionDetailsController::class, 'stateDetails']);
Route::get('/counrty-details', [functionDetailsController::class, 'countryDetails']);
Route::get('/district-details/{id}', [functionDetailsController::class, 'districtDetails']);

Route::post('/create-new-function', [functionDetailsController::class, 'createFunctionAppointment']);
Route::get('/function-appoinment-details', [functionDetailsController::class, 'getFunctionAppointmentDetails']);
Route::get('/specific-FA-Details/{id?}', [functionDetailsController::class, 'getSpecificFunctionAppointmentDetails']);


Route::post('/add-Gift-Descriptions', [functionDetailsController::class, 'addGiftDesciptions']);
Route::get('/gift-Descriptions-Details/{id?}', [functionDetailsController::class, 'getGiftDesciptionsDetails']);

