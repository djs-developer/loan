<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\users;
use App\Models\userrole;
use App\Models\userrolemapping;
use DB;

class userrolemappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $mapping = DB::table('userrolemapping')
            ->join('userrole', 'userrole.id', '=', 'userrolemapping.role_id')// joining the contacts table , where user_id and contact_user_id are same
            ->join('users', 'users.id', '=', 'userrolemapping.user_id')
            ->select('userrolemapping.*', 'userrole.role','users.name')
            ->get();
        return view('rolemapping.viewmapping', ['mapping' => $mapping]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $userrolemapping = new userrolemapping;
        $userrolemapping->role_id = $request->role_id;
        $userrolemapping->user_id = $request->user_id;
        $userrolemapping->save();
       
        return redirect('/viewmapping');
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
        $mapping = DB::table('userrolemapping')
            ->join('userrole', 'userrole.id', '=', 'userrolemapping.role_id')// joining the contacts table , where user_id and contact_user_id are same
            ->join('users', 'users.id', '=', 'userrolemapping.user_id')
            ->select('userrolemapping.*', 'userrole.role','users.name')
            ->get();
        $role = DB::table('userrole')->get();
        $user = DB::table('users')->get();
        $mapping = DB::select('select * from userrolemapping where id=?',[$id]);
        return view('rolemapping.editmapping',['mapping'=>$mapping,'role'=>$role,'user'=>$user]);
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
        $mapping = userrolemapping::findOrFail($id);
        $mapping->role_id = $request->role_id;
        $mapping->user_id = $request->user_id;
        $mapping->save();
        
        return  redirect('/viewmapping');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::table('userrolemapping')->delete($id);
        return redirect('/viewmapping');
    }
}
