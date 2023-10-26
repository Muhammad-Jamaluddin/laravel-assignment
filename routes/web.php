<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::prefix('auth')->group(function () {

        Route::controller(AuthController::class)->group(function(){
            Route::get('login','login');
            Route::get('register','register');
            Route::get('logout','logout');
            Route::post('store','store');
            Route::post('loginstore','loginstore');    
        });
    });


    Route::middleware(['owner'])->group(function () {
    
        //Admin//
        Route::controller(AdminController::class)->group(function(){
            Route::get('/','dashboard');
          
        });
      
        Route::prefix('category')->group(function () {

            //Category Routes//
            Route::controller(CategoryController::class)->group(function(){
                Route::get('add','add');
                Route::get('edit/{id}','edit');
                Route::get('delete/{id}','destroy');
                Route::post('store','store');
                Route::post('update/{id}','update');
                Route::get('show','show');

            });
        });

        Route::prefix('task')->group(function () {

            //Task Routes//
            Route::controller(TaskController::class)->group(function(){
                Route::get('add','add');
                Route::post('store','store');
                Route::post('update/{id}','update');
                Route::get('edit/{id}','edit');
                Route::get('delete/{id}','destroy');
                Route::get('show','show');
            });
        });


     

    });