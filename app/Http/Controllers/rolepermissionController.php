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
    public function index(request $request)
    {
        $view = rolepermission::all();

        if($request->get('status') == 'archived') {
            $view = rolepermission::onlyTrashed()->get();
        }

        return view('rolepermission.viewrolepermission', compact('view'));

        // $view = rolepermission::all();
        // return view('rolepermission.viewrolepermission', compact('view'));
        // $rolepermission = DB::table('rolepermission')
        // ->join('userrolemapping', 'userrolemapping.id', '=', 'rolepermission.mapping_id')// joining the contacts table , where user_id and contact_user_id are same
        // ->join('permission', 'permission.id', '=', 'rolepermission.permission_id')
        // ->join('userrole', 'userrole.id', '=', 'userrolemapping.role_id')
        // ->join('users', 'users.id', '=', 'userrolemapping.user_id')
        // ->select('rolepermission.*', 'permission.permission','userrole.role','users.name')
        // ->get();
        // return view('rolepermission.viewrolepermission', ['rolepermission' => $rolepermission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $rolepermission = new rolepermission;
        $rolepermission->role_id = $request->role_id;
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
        $rolepermission = rolepermission::select()
        ->where('id',$id)
        ->get();
        $role = DB::table('userrole')->get();
        $permission = DB::table('permission')->get();
        return view('rolepermission.editrolepermission',['rolepermission'=> $rolepermission,'permission'=>$permission,'role'=>$role]);
     
        // $rrolepermission = DB::table('rolepermission')
        // ->join('userrolemapping', 'userrolemapping.id', '=', 'rolepermission.mapping_id')// joining the contacts table , where user_id and contact_user_id are same
        // ->join('permission', 'permission.id', '=', 'rolepermission.permission_id')
        // // ->join('userrole', 'userrole.id', '=', 'userrolemapping.role_id')
        // // ->join('users', 'users.id', '=', 'userrolemapping.user_id')
        // ->select('rolepermission.*', 'permission.permission')
        // ->get();
        // $permission = DB::table('permission')->get();
        // $rolemapping = DB::table('userrolemapping')->get();
        // $rrolepermission = DB::select('select * from rolepermission where id=?',[$id]);
        // return view('rolepermission.editrolepermission',['rolepermission'=> $rrolepermission,'permission'=>$permission,'rolemapping'=>$rolemapping]);
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
        $rolepermission->role_id = $request->role_id;
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
        $deleted=rolepermission::find($id);
        $deleted->delete();
        //$deleted = DB::table('rolepermission')->delete($id);
        return redirect('/viewrolepermission');
    }
    public function restore($id) 
    {
        $rolepermission = rolepermission::where('id',$id)->withTrashed()->restore();
        
       return redirect('/viewrolepermission');
            
    }

    public function forceDelete($id) 
    {
        $rolepermission =  rolepermission::where('id', $id)->withTrashed()->forceDelete();

        return redirect('/viewrolepermission');
           
    }
    
    public function restoreAll() 
    {
        $rolepermission =  rolepermission::onlyTrashed()->restore();
        return redirect('/viewrolepermission');
    }
}
