<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\userrole;
use App\Models\rolepermission;
use DB;


class rolepermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rolepermission = DB::table('rolepermission')
        ->join('userrolemapping', 'userrolemapping.id', '=', 'rolepermission.mapping_id')// joining the contacts table , where user_id and contact_user_id are same
        ->join('permission', 'permission.id', '=', 'rolepermission.permission_id')
        ->join('userrole', 'userrole.id', '=', 'userrolemapping.role_id')
        ->join('users', 'users.id', '=', 'userrolemapping.user_id')
        ->select('rolepermission.*', 'permission.permission','userrole.role','users.name')
        ->get();
        return view('rolepermission.viewrolepermission', ['rolepermission' => $rolepermission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $rolepermission = new rolepermission;
        $rolepermission->mapping_id = $request->mapping_id;
        $rolepermission->permission_id = $request->permission_id;
        $rolepermission->save();
       
        return redirect('/viewrolepermission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $rrolepermission = DB::table('rolepermission')
        // ->join('userrolemapping', 'userrolemapping.id', '=', 'rolepermission.mapping_id')// joining the contacts table , where user_id and contact_user_id are same
        // ->join('permission', 'permission.id', '=', 'rolepermission.permission_id')
        // // ->join('userrole', 'userrole.id', '=', 'userrolemapping.role_id')
        // // ->join('users', 'users.id', '=', 'userrolemapping.user_id')
        // ->select('rolepermission.*', 'permission.permission')
        // ->get();
        $permission = DB::table('permission')->get();
        $rolemapping = DB::table('userrolemapping')->get();
        $rrolepermission = DB::select('select * from rolepermission where id=?',[$id]);
        return view('rolepermission.editrolepermission',['rolepermission'=> $rrolepermission,'permission'=>$permission,'rolemapping'=>$rolemapping]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rolepermission = rolepermission::findOrFail($id);
        $rolepermission->mapping_id = $request->mapping_id;
        $rolepermission->permission_id = $request->permission_id;
        $rolepermission->save();
        return redirect('/viewrolepermission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::table('rolepermission')->delete($id);
        return redirect('/viewrolepermission');
    }
}
