<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\userdetails;
use App\Http\Controllers\Controller;
use DB;

class userdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = DB::table('userdetails')->get();
        return view('userdetails.viewdetails', ['details' => $details]);
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
    //    $date = DB::insert("insert into userdetails (name,value,user_id) values(?,?,?)",['date',$date,'1']);
    //    $date =  DB::insert("insert into userdetails (name,value,user_id) values(?,?,?)",['mobile',$mobile,'1']);
    //    $date = DB::insert("insert into userdetails (name,value,user_id) values(?,?,?)",['address',$address,'1']);
    // DB::table('userdetails')->insert([
    //     'name' => 'Date',
    //     'value' => $date,
    //     'user_id' => 1,
    // ]);
    // DB::table('userdetails')->insert([
    //     'name' => 'Mobile',
    //     'value' => $mobile,
    //     'user_id' => 1,
    // ]);
    // DB::table('userdetails')->insert([
    //     'name' => 'Address',
    //     'value' => $address,
    //     'user_id' => 1,
    // ]);
    $data = [
        // An array of data for multiple records
        ['name' => 'Date', 'value' => $date,'user_id' =>1],
        ['name' => 'Mobile', 'value' => $mobile,'user_id' =>1],
        ['name' => 'Address', 'value' => $address,'user_id' =>1],
    ];
    DB::table('userdetails')->insert($data);

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
        $deleted = DB::table('userdetails')->delete($id);
        return redirect('/viewuserdetails');
    }
}
