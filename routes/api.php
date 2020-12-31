<?php

use App\Http\Controllers\AntiquesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DynastysController;
use App\Models\Antique;
use App\Models\Dynasty;
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

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('dynastys', [DynastysController::class, 'api_dynastys']);
    Route::patch('dynastys', [DynastysController::class, 'api_update']);
    Route::delete('dynastys', [DynastysController::class, 'api_delete']);

    Route::get('antiques', [AntiquesController::class, 'api_antiques']);
    Route::patch('antiques', [AntiquesController::class, 'api_update']);
    Route::delete('antiques', [AntiquesController::class, 'api_delete']);

});

