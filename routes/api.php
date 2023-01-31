<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TodoController;
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

Route::middleware('auth:sanctum')
    ->group(function() {

        Route::apiResource('projects', ProjectController::class)->only([
            'index', 'store'
        ]);

        Route::apiResource('todos', TodoController::class)
            ->except('update');

        Route::patch('todos/{todo}/done', [TodoController::class, 'marksAsDone']);

    });
