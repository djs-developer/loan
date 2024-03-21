<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userroleController;
use App\Http\Controllers\loantypeController;
use App\Http\Controllers\stateController;
use App\Http\Controllers\cityController;
use App\Http\Controllers\documenttypeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\userdetailsController;
use App\Http\Controllers\userrolemappingController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\rolepermissionController;
use App\Models\state;
use App\Models\userrole;
use App\Models\userrolemapping;
use App\Models\userdetails;
use App\Http\Resources\userdetailsCollection;
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
    Route::get('/deleteloan/{id}','destroy');
    Route::get('/editloan/{id}','edit');
    Route::post('/updateloan/{id}','update');
});

Route::get('/addstate',function(){
    return view('state/addstate');
});

Route::controller(stateController::class)->group(function () {
    Route::post('/stateprocess', 'create');
    Route::get('/viewstate','index');
    Route::get('/deletestate/{id}','destroy');
    Route::get('/editstate/{id}','edit');
    Route::post('/updatestate/{id}','update');
});

Route::get('/addcity',function(){
            $show = DB::table('state')->get();
    return view('city/addcity',['show'=>$show]);
});

Route::controller(cityController::class)->group(function () {
    Route::post('/cityprocess', 'create');
    Route::get('/viewcity','index');
    Route::get('/deletecity/{id}','destroy');
    Route::get('/editcity/{id}','edit');
    Route::post('/updatecity/{id}','update');
});

Route::get('/adddocument',function(){
    return view('documenttype/adddocument');
});

Route::controller(documenttypeController::class)->group(function () {
    Route::post('/documentprocess', 'create');
    Route::get('/viewdocument','index');
    Route::get('/deletedoctype/{id}','destroy');
    Route::get('/editdoctype/{id}','edit');
    Route::post('/updatdoctype/{id}','update');
});

Route::get('/adduser',function(){
    return view('user/adduser');
});

Route::controller(userController::class)->group(function () {
    Route::post('/userprocess', 'create');
    Route::get('/viewuser','index');
    Route::get('/deleteuser/{id}','destroy');
    Route::get('/edituser/{id}','edit');
    Route::post('/updateuser/{id}','update');
});

Route::get('/adduserdetails',function(){
    return view('userdetails/adddetails');
});

Route::controller(userdetailsController::class)->group(function () {
    Route::post('/userdprocess', 'create');
    Route::get('/viewuserdetails','index');
    Route::get('/deletedetails/{id}','destroy');
    Route::get('/edituserdetails/{id}','edit');
    Route::post('/updateuserdetalis/{id}','update');
});

Route::get('/addmaping',function(){
    $role = DB::table('userrole')->get();
    $users = DB::table('users')->get();
return view('rolemapping/addmapping',['role'=>$role,'users'=>$users]);
});

Route::controller(userrolemappingController::class)->group(function () {
Route::post('/mappingprocess', 'create');
Route::get('/viewmapping','index');
Route::get('/deletemapping/{id}','destroy');
Route::get('/editmapping/{id}','edit');
Route::post('/updatemapping/{id}','update');
});

Route::get('/addpermission',function(){
return view('permission/addpermission');
});

Route::controller(permissionController::class)->group(function () {
    Route::post('/permissionprocess', 'create');
    Route::get('/viewpermission','index');
    Route::get('/deletepermission/{id}','destroy');
    Route::get('/editpermission/{id}','edit');
    Route::post('/updatepermission/{id}','update');
});

Route::get('/addrolepermission',function(){
    $rolemapping = DB::table('userrolemapping')->get();
    $permission = DB::table('permission')->get();
    return view('rolepermission/addrolepermission',['rolemapping'=>$rolemapping,'permission'=>$permission]);
});

Route::controller(rolepermissionController::class)->group(function () {
    Route::post('/rolepermissionprocess', 'create');
    Route::get('/viewrolepermission','index');
    Route::get('/deleterolepermission/{id}','destroy');
    Route::get('/editrolepermission/{id}','edit');
    Route::post('/updaterolepermission/{id}','update');
});