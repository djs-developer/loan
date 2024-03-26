<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\state;
use DB;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {   
        $city = city::has('state')->get();

        if($request->get('status') == 'archived') {
            $city = city::onlyTrashed()->get();
        }
        return view('city.viewcity', compact('city'));

        // $view = city::has('state')->get();
        // return view('city.viewcity', ['city' => $view]);

        //     $view = DB::table('city')
        //     ->join('state', 'state.id', '=', 'city.state_id')// joining the contacts table , where user_id and contact_user_id are same
        //     ->select('city.*', 'state.statename')
        //     ->get();
        // return view('city.viewcity', ['city' => $view]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
       
        $city = new city;
        $city->cityname = $request->cityname;
        $city->state_id = $request->state_id;
        $city->save();
       
        return redirect('/viewcity');
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
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $editcity = city::has('state')
        ->where('id',$id)
        ->get();
        $edit = state::all();
        return view('city.editcity',['city'=>$editcity,'edit'=>$edit]);

    //     $city = DB::table('city')
    //         ->join('state', 'state.id', '=', 'city.state_id')// joining the contacts table , where user_id and contact_user_id are same
    //         ->select('city.*', 'state.statename')
            
    //         ->get();
    //     $edit = DB::table('state')->get();
    //    // $city = DB::select('select * from city where id=?',[$id]);
    //     $users = city::where('id', $id)->get();
        //return view('city.editcity',['city'=>$city,'edit'=>$edit]);
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
        $city = city::findOrFail($id);
        $city->cityname = $request->cityname;
        $city->state_id = $request->state_id;
        $city->save();
       
        return  redirect('/viewcity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted=city::find($id);
        $deleted->delete();
        //$deleted = DB::table('city')->delete($id);
        return redirect('/viewcity');
    }
    public function restore($id) 
    {
        $city = city::where('id',$id)->withTrashed()->restore();
        
       return redirect('/viewcity');       
    }
    public function forceDelete($id) 
    {
       $city =  city::where('id', $id)->withTrashed()->forceDelete();

       return redirect('/viewcity');
    }
    public function restoreAll() 
    {
       $city =  city::onlyTrashed()->restore();
        return redirect('/viewcity');
    }
}
