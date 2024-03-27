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
use App\Http\Controllers\addrolepermissionController;
use App\Models\state;
use App\Models\userrole;
use App\Models\userrolemapping;
use App\Models\userdetails;
use App\Models\permission;
use App\Http\Resources\userdetailsCollection;
//use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
    Route::delete('/delete/{id}','destroy')->name('userrole.deleterole');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
    Route::post('/restoreuserrole/{id}', 'restore')->name('userrole.restoreuserrole');
    Route::delete('/forcedeleteuserrole/{id}', 'forceDelete')->name('userrole.forcedeleteuserrole');
    Route::post('/restorealluserrole', 'restoreAll')->name('userrole.restorealluserrole');
});

Route::get('/addloan',function(){
    return view('loantype/addloan');
});

Route::controller(loantypeController::class)->group(function () {
    Route::post('/loanprocess', 'create');
    Route::get('/viewloan','index');
    Route::delete('/deleteloan/{id}','destroy')->name('loantype.deleteloan');
    Route::get('/editloan/{id}','edit');
    Route::post('/updateloan/{id}','update');
    Route::post('/restoreloan/{id}', 'restore')->name('loantype.restoreloan');
    Route::delete('/forcedeleteloan/{id}', 'forceDelete')->name('loantype.forcedeleteloan');
    Route::post('/restoreallloan', 'restoreAll')->name('loantype.restoreallloan');
});

Route::get('/addstate',function(){
    return view('state/addstate');
});


Route::controller(stateController::class)->group(function () {
    Route::post('/stateprocess', 'create');
    Route::get('/viewstate','index');
    Route::delete('/deletestate/{id}','destroy')->name('state.deletestate');
    Route::get('/editstate/{id}','edit');
    Route::post('/updatestate/{id}','update');
    Route::post('/restorestate/{id}', 'restore')->name('state.restorestate');
    Route::delete('/forcedeletestate/{id}', 'forceDelete')->name('state.forcedeletestate');
    Route::post('/restoreallstate', 'restoreAll')->name('state.restoreallstate');
   
});

Route::get('/addcity',function(){
            $show = DB::table('state')->get();
    return view('city/addcity',['show'=>$show]);
});

Route::controller(cityController::class)->group(function () {
    Route::post('/cityprocess', 'create');
    Route::get('/viewcity','index');
    Route::delete('/deletecity/{id}','destroy')->name('city.deletecity');
    Route::get('/editcity/{id}','edit');
    Route::post('/updatecity/{id}','update');
    Route::post('/restorerole/{id}', 'restore')->name('city.restorecity');
    Route::delete('/forcedeleterole/{id}', 'forceDelete')->name('city.forcedeletecity');
    Route::post('/restoreallrole', 'restoreAll')->name('city.restoreallcity');
});

Route::get('/adddocument',function(){
    return view('documenttype/adddocument');
});

Route::controller(documenttypeController::class)->group(function () {
    Route::post('/documentprocess', 'create');
    Route::get('/viewdocument','index');
    Route::delete('/deletedoctype/{id}','destroy')->name('documenttype.deletedoc');
    Route::get('/editdoctype/{id}','edit');
    Route::post('/updatdoctype/{id}','update');
    Route::post('/restoredoc/{id}', 'restore')->name('documenttype.restoredoc');
    Route::delete('/forcedeletedoc/{id}', 'forceDelete')->name('documenttype.forcedeletedoc');
    Route::post('/restorealldoc', 'restoreAll')->name('documenttype.restorealldoc');
});

Route::get('/adduser',function(){
    return view('user/adduser');
});

Route::controller(userController::class)->group(function () {
    Route::post('/userprocess', 'create');
    Route::get('/viewuser','index');
    Route::delete('/deleteuser/{id}','destroy')->name('user.deleteuser');
    Route::get('/edituser/{id}','edit');
    Route::post('/updateuser/{id}','update');
    Route::post('/restoreuser/{id}', 'restore')->name('user.restoreuser');
    Route::delete('/forcedeleteuser/{id}', 'forceDelete')->name('user.forcedeleteuser');
    Route::post('/restorealluser', 'restoreAll')->name('user.restorealluser');
});

Route::get('/adduserdetails',function(){
    return view('userdetails/adddetails');
});

Route::controller(userdetailsController::class)->group(function () {
    Route::post('/userdprocess', 'create');
    Route::get('/viewuserdetails','index');
    Route::delete('/deletedetails/{id}','destroy')->name('userdetails.deletedetails');
    Route::get('/edituserdetails/{id}','edit');
    Route::post('/updateuserdetalis/{id}','update');
    Route::post('/restoredetails/{id}', 'restore')->name('userdetails.restoredetails');
    Route::delete('/forcedeletedetails/{id}', 'forceDelete')->name('userdetails.forcedeletedetails');
    Route::post('/restorealldetails', 'restoreAll')->name('userdetails.restorealldetails');
});

Route::get('/addmaping',function(){
    $role = DB::table('userrole')->get();
    $users = DB::table('users')->get();
return view('rolemapping/addmapping',['role'=>$role,'users'=>$users]);
});

Route::controller(userrolemappingController::class)->group(function () {
    Route::post('/mappingprocess', 'create');
    Route::get('/viewmapping','index');
    Route::delete('/deletemapping/{id}','destroy')->name('mapping.deletemapping');
    Route::get('/editmapping/{id}','edit');
    Route::post('/updatemapping/{id}','update');
    Route::post('/restoremapping/{id}', 'restore')->name('mapping.restoremapping');
    Route::delete('/forcedeletemapping/{id}', 'forceDelete')->name('mapping.forcedeletemapping');
    Route::post('/restoreallmapping', 'restoreAll')->name('mapping.restoreallmapping');
});

Route::get('/addpermission',function(){
return view('permission/addpermission');
});

Route::controller(permissionController::class)->group(function () {
    Route::post('/permissionprocess', 'create');
    Route::get('/viewpermission','index');
    Route::delete('/deletepermission/{id}','destroy')->name('permission.deletepermission');
    Route::get('/editpermission/{id}','edit');
    Route::post('/updatepermission/{id}','update');
    Route::post('/restorepermission/{id}', 'restore')->name('permission.restorepermission');
    Route::delete('/forcedeletepermission/{id}', 'forceDelete')->name('permission.forcedeletepermission');
    Route::post('/restoreallpermission', 'restoreAll')->name('permission.restoreallpermission');
});

Route::get('/addrolepermission',function(){
    $userrole = userrole::all();
    $permission = permission::all();
    return view('rolepermission/addrolepermission',['userrole'=>$userrole,'permission'=>$permission]);
});

Route::controller(rolepermissionController::class)->group(function () {
    Route::post('/rolepermissionprocess', 'create');
    Route::get('/viewrolepermission','index');
    Route::delete('/deleterolepermission/{id}','destroy')->name('rolepermission.deleterolepermission');
    Route::get('/editrolepermission/{id}','edit');
    Route::post('/updaterolepermission/{id}','update');
    Route::post('/restorerolepermission/{id}', 'restore')->name('rolepermission.restorerolepermission');
    Route::delete('s/forcedeleterolepermission/{id}', 'forceDelete')->name('rolepermission.forcedeleterolepermission');
    Route::post('/restoreallrolepermission', 'restoreAll')->name('rolepermission.restoreallrolepermission');
});

Route::get('/addform',function(){
    
    $show  = permission::select('permission','id')
    ->orderBy('permission')
    ->get();
    // echo $show;
 $destination = permission::select('permission','id')->where('permission','like','user%')->get();
 $final =  $destination->groupBy('permission','id');
 echo $final;
 echo "<br>";
 foreach($final->chunk(2) as $chunk)
 echo $chunk;

    // $userloan = Arr::pluck($show, 'permission.user');
    // echo $userloan;
    

   // dd(Arr::flatten($view));
    return view('rolepermissionform/add',['user'=>$show]);
});

Route::controller(addrolepermissionController::class)->group(function () {
    Route::post('/addrolepermissionform', 'create');
    // Route::get('/viewrolepermission','index');
    // Route::delete('/deleterolepermission/{id}','destroy');
    // Route::get('/editrolepermission/{id}','edit');
    // Route::post('/updaterolepermission/{id}','update');
});