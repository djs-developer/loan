<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\state;
use DB;

class stateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $stateview = state::all();
        //$state = DB::table('state')->get();
        return view('state.viewstate', ['state' => $stateview]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $state = new state;
        $state->statename = $request->statename;
        $state->save();
        return redirect('/viewstate');
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
        $stateedit = state::where('id', $id)->get();
        //$state = DB::select('select * from state where id=?',[$id]);
        return view('state.editstate',['state'=>$stateedit]);
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
        $state = state::findOrFail($id);
        $state->statename = $request->statename;
        $state->save();
        return  redirect('/viewstate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $deleted=state::find($id);
        $deleted->delete();
       // $deleted = DB::table('state')->delete($id);
        return redirect('/viewstate');
    }
}
