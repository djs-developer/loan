<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\userrole;
use DB;

class userroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $users = Userrole::all();

        if($request->get('status') == 'archived') {
            $users = Userrole::onlyTrashed()->get();
        }

        return view('userrole.viewrole', compact('users'));

        // $view = Userrole::all();
        // //$users = DB::table('userrole')->get();
        // return view('userrole.viewrole', ['users' => $view]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $userrole = new userrole;
        $userrole->role = $request->role;
        $userrole->save();
        return redirect('/viewrole');
       
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
       $users = Userrole::where('id', $id)->get();
       //$user = DB::select('select * from userrole where id=?',[$id]);
        return view('userrole.editrole',['user'=>$users]);
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
      
        // $role = $request->input('role');
        //  DB::update('update userrole set role=? where id=?',[$role,$id]);
        $project = userrole::findOrFail($id);
        $project->role = $request->role;
        $project->save();
        return  redirect('/viewrole');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deleted=Userrole::find($id);
        $deleted->delete();
       //$deleted = DB::table('userrole')->delete($id);
         return redirect('/viewrole');
    }
    public function restore($id) 
    {
        $userrole = userrole::where('id',$id)->withTrashed()->restore();
        
       return redirect('/viewrole');       
    }
    public function forceDelete($id) 
    {
       $userrole =  userrole::where('id', $id)->withTrashed()->forceDelete();

       return redirect('/viewrole');
    }
    public function restoreAll() 
    {
       $userrole =  userrole::onlyTrashed()->restore();
        return redirect('/viewrole');
    }
}
