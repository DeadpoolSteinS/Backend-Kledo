<?php

use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\OvertimeController;
use App\Http\Controllers\API\SettingController;
use Illuminate\Http\Request;
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

Route::get('employees', [EmployeeController::class, 'index']);
Route::post('employees', [EmployeeController::class, 'store']);

Route::patch('settings', [SettingController::class, 'update']);

Route::get('overtime-pays/calculate/{month}', [OvertimeController::class, 'show']);
Route::post('overtimes', [OvertimeController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
