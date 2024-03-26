<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\state;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class stateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {   
        $state = state::all();

        if($request->get('status') == 'archived') {
            $state = state::onlyTrashed()->get();
        }

        return view('state.viewstate', compact('state'));
        // $stateview = state::all();
        // //$state = DB::table('state')->get();
        // return view('state.viewstate', ['state' => $stateview]);
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
       return redirect('/viewstate');
        
    //     $deleted=state::find($id);
    //     $deleted->delete();
    //    // $deleted = DB::table('state')->delete($id);
    //     return redirect('/viewstate');
    }

    public function restore($id) 
    {
        $state = state::where('id',$id)->withTrashed()->restore();
        
       return redirect('/viewstate');
            
    }

    public function forceDelete($id) 
    {
        $state =  state::where('id', $id)->withTrashed()->forceDelete();

        return redirect('/viewstate');
           
    }
    
    public function restoreAll() 
    {
        $state =  state::onlyTrashed()->restore();
        return redirect('/viewstate');
       // return redirect()->route('documenttype.viewdocument')->withSuccess(__('All users restored successfully.'));
    }
   
}
