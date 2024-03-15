<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userroleController;
use App\Http\Controllers\loantypeController;
//use DB;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addrole',function(){
    return view('userrole/addrole');
});

Route::controller(userroleController::class)->group(function () {
    Route::post('/processaddrole', 'create');
    Route::get('/viewrole','index');
    Route::get('/delete/{id}','destroy');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
});

Route::get('/addloan',function(){
    return view('loantype/addloan');
});

Route::controller(loantypeController::class)->group(function () {
    Route::post('/loanprocess', 'create');
    Route::get('/viewloan','index');
    // Route::get('/delete/{id}','destroy');
    // Route::get('/edit/{id}','edit');
    // Route::post('/update/{id}','update');
});