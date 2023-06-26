<?php

use App\Http\Controllers\Api\ProjectController;
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

Route::get('/route-api', function(){

    $data = [
        'stated_one' => 'one thing',
        'stated_two' => 'two things',
    ];

    return response()->json($data);
});

Route::namespace('Api')
        ->prefix('projects')
        ->group(function(){
            Route::get('/', [ProjectController::class, 'index']);
        });
