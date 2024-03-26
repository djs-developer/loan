<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\userdetails;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use DB;


class userdetailsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {

        $details = userdetails::all();

        if($request->get('status') == 'archived') {
            $details = userdetails::onlyTrashed()->get();
        }

        return view('userdetails.viewdetails', compact('details'));

        // $details = userdetails::all();
        // return view('userdetails.viewdetails', compact('details'));

        //return view('rolemapping.viewmapping', compact('mapping'));
       // $details = DB::table('userdetails')->get();
        //return view('userdetails.viewdetails', ['details' => $details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $userdetails = new userdetails;
        $date = $request->input('date');
        $mobile = $request->input('mobile');
        $address = $request->input('address');
    // DB::table('userdetails')->insert([
    //     'name' => 'Date',
    //     'value' => $date,
    //     'user_id' => 1,
    // ]);
    // $data = [
    //     // An array of data for multiple records
    //     ['name' => 'date', 'value' => $date,'user_id' =>1],
    //     ['name' => 'mobile', 'value' => $mobile,'user_id' =>1],
    //     ['name' => 'address', 'value' => $address,'user_id' =>1],
    // ];
    // DB::table('userdetails')->insert($data);
    $userdetails = new userdetails;
    $userdetails->name = "date";
    $userdetails->value = $date;
    $userdetails->user_id = 5;
    $userdetails->save();
    $userdetails = new userdetails;
    $userdetails->name = "mobile";
    $userdetails->value = $mobile;
    $userdetails->user_id = 5;
    $userdetails->save();
    $userdetails = new userdetails;
    $userdetails->name = "address";
    $userdetails->value = $address;
    $userdetails->user_id = 5;
    $userdetails->save();
        return redirect('/viewuserdetails');
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
  
    public function edit($id,request $request)
    {
        $details = userdetails::select()
        ->where('user_id',$id)
        ->get();
        $date = userdetails::select()
        ->where('name','=','date')
        ->where('user_id',$id)
        ->get();
        $mobile = userdetails::select()
        ->where('name','=','mobile')
        ->where('user_id',$id)
        ->get();
        $address = userdetails::select()
        ->where('name','=','address')
        ->where('user_id',$id)
        ->get();
       $user = DB::table('users')->get();
        //return view('rolemapping.editmapping', ['mapping'=>$mapping,'role'=>$role,'user'=>$user]);
        return view('userdetails.editdetails',['details'=>$details,'user'=>$user,'date'=>$date,'mobile'=>$mobile,'address'=>$address]);

       
        // $date = DB::table('userdetails')
        //         ->where('name', '=', 'date')
        //         ->where ('user_id', '=', $id)
        //         ->get();

        // $mobile = DB::table('userdetails')
        //         ->where('name', '=', 'mobile')
        //         ->where ('user_id', '=', $id)
        //         ->get();  
        
        // $address = DB::table('userdetails')
        //         ->where('name', '=', 'address')
        //         ->where ('user_id', '=', $id)
        //         ->get(); 

        // $details = DB::select('select * from userdetails where user_id=?',[$id]);
        // return view('userdetails.editdetails',['details'=>$details,'attributes'=>$attributes,'date'=>$date,'mobile'=>$mobile,'address'=>$address]);
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

        $details = userdetails::findOrFail($id);
        
        $date = $request->input('date');
        $mobile = $request->input('mobile');
        $address = $request->input('address');

        $date = DB::table('userdetails')
              ->where('user_id', $id)
              ->where('name','date')
              ->update(['value' => $date]);
       
        $mobile = DB::table('userdetails')
        ->where('user_id', $id)
        ->where('name','mobile')
        ->update(['value' => $mobile]);

        $date = DB::table('userdetails')
              ->where('user_id', $id)
              ->where('name','address')
              ->update(['value' => $address]);

        return redirect('/viewuserdetails');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleted=userdetails::find($id);
        $deleted->delete();
        return redirect('/viewuserdetails');

        // $deleted = DB::table('userdetails')->delete($id);
        // return redirect('/viewuserdetails');
    }
    public function restore($id) 
    {
        $userdetails = userdetails::where('id',$id)->withTrashed()->restore();
        
       return redirect('/viewuserdetails');       
    }
    public function forceDelete($id) 
    {
       $userdetails =  userdetails::where('id', $id)->withTrashed()->forceDelete();

       return redirect('/viewuserdetails');
    }
    public function restoreAll() 
    {
       $userdetails =  userdetails::onlyTrashed()->restore();
        return redirect('/viewuserdetails');
    }
}
