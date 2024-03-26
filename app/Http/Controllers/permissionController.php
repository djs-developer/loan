<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\permission;
use App\Http\Controllers\Controller;
use DB;


class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $permission = permission::all();

        if($request->get('status') == 'archived') {
            $permission = permission::onlyTrashed()->get();
        }

        return view('permission.viewpermission', compact('permission'));

        // $view = permission::all();
        // $permission = DB::table('permission')->get();
        // return view('permission.viewpermission', ['permission' => $view]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $permission = new permission;
        $permission->permission = $request->permission;
        $permission->save();
        return redirect('/viewpermission');
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
        $edit = permission::where('id', $id)->get();
       // $permission = DB::select('select * from permission where id=?',[$id]);
        return view('permission.editpermission',['permission'=>$edit]);
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
        $permission = permission::findOrFail($id);
        $permission->permission = $request->permission;
        $permission->save();
        return  redirect('/viewpermission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted=permission::find($id);
        $deleted->delete();
        //$deleted = DB::table('permission')->delete($id);
       return redirect('/viewpermission');
    }
    public function restore($id) 
    {
        $permission = permission::where('id',$id)->withTrashed()->restore();
        
       return redirect('/viewpermission');
            
    }

    public function forceDelete($id) 
    {
        $permission =  permission::where('id', $id)->withTrashed()->forceDelete();

        return redirect('/viewpermission');
           
    }
    
    public function restoreAll() 
    {
        $permission =  permission::onlyTrashed()->restore();
        return redirect('/viewpermission');
    }
}
