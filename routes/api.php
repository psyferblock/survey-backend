<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\UserController;


Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::post('/login', [JWTController::class, 'login']);
        Route::post('/register', [JWTController::class, 'register']);
        Route::group(['middleware' => 'api'], function($router) {
            
            
            Route::post('/logout', [JWTController::class, 'logout']);
            Route::post('/refresh', [JWTController::class, 'refresh']);
            Route::post('/profile', [JWTController::class, 'profile']);

            Route::group(['prefix' => 'survey_setup'], function($router) {
                
                // route to fix questions in the survey
                // route to add answers in the survey
                // route to register the survey
            });
            
        });

    });
    Route::group(['prefix' => 'user'], function() {
        // route submit name and email to take survey
        Route::post('/add_user', [UserController::class, 'store']);

        // route to fill questions of the survey/submit answers.
        Route::post('/add_answers', [AnswerController::class, 'store']);
        

        


    });
    

    

});