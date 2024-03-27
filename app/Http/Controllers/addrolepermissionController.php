<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userrole;
use App\Models\permission;
use App\models\rolepermission;
use DB;

class addrolepermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
//dd($addrole);
        //this is work when you have same filed name with lots of filed
 //       foreach($request->input('permission') as $key => $value) {
//          permission::create([
//              'permission' => $request->input('permission')[$key],
                // etc
//            ]);
 //       }

        //don't konw working or not but for same name with different filed 
        // $models->transpose()->map(function($model) {

        //     permission::insert([
        //         'permission' => $model['permission']
        //     ]);
        // });
       // $permission = $request->input('permissions');

       //@isset($addrole);
       
      
      
        
        $permission = $request->input('permission');
       
    
        foreach ($request->input('permission') as $key => $value) {
            rolepermission::create([
                'role_id' => $addrole->id,
                'permission_id' =>$request->permission[$key],
                 
            ]);
        }
        // $addpermission = permission::create([
        //     'permission' =>implode(',', request('permission')),
        //    // 'permission' => json_encode(request('permission')), // implode(',', request('hobbies'))
        // ]);

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
        //
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
