<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userrole;
use App\Models\permission;
use App\models\rolepermission;
use App\models\addrolepermission;
use DB;
use Illuminate\Support\Arr;
class addrolepermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = rolepermission::all();

        // if($request->get('status') == 'archived') {
        //     $view = rolepermission::onlyTrashed()->get();
        // }

        return view('rolepermissionform.show', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $addrole = userrole::create([
           "role"=>$request->role,
        ]);

    
        $permission = $request->input('permission');
      
        foreach ($request->input('permission') as $key => $value) {
            rolepermission::create([
                'role_id' => $addrole->id,
                'permission_id' =>$request->permission[$key],
                 
            ]);
        }
     
        return "done";
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
        $rolepermission = rolepermission::select('permission_id','role_id')
        ->where('role_id',$id)
        ->pluck('permission_id');
        //->get();
        $userrole = userrole::select()
        ->where('id',$id)
        ->get();
        $permission =permission::all();
        $rolepermission = rolepermission::select()->where('role_id',$id)->pluck('permission_id')->toArray();
        

        $rolePermissions = rolepermission::select()->where('role_id',$id)->get();
    
        $all =  $rolePermissions->pluck('role_id', 'permission_id')->toArray();
       return view('rolepermissionform.edit',['rolepermissions'=> $rolePermissions,'rolepermission'=> $rolepermission,'allpermission'=>$permission,'rolename'=>$userrole]);
       
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
