<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\userdetails;
use App\Models\CustomAttribute;
use App\Http\Controllers\Controller;
use App\Models\Value;
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
        ['name' => 'date', 'value' => $date,'user_id' =>1],
        ['name' => 'mobile', 'value' => $mobile,'user_id' =>1],
        ['name' => 'address', 'value' => $address,'user_id' =>1],
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
  
    public function edit($id,request $request)
    {
   
        /** @var Collection<CustomAttribute> $attributes */
        $attributes = userdetails::all();

        $selects = [];
        // Build the select list: the header of the query result will have
        // the list of fields (ids) and the values will be located at the same level.
        // as result we will have in one row all the values of the person.
        foreach ($attributes as $attribute) {
            // Select the value for the associate field and the current record (current record in the context of the query)
            $selects[] = "(SELECT {$attribute->date_value} FROM values where custom_attribute_id = {$attribute->id} and values.user_id = users.id) as {$attribute->date}";
            $selects[] = "(SELECT {$attribute->integer_value} FROM values where custom_attribute_id = {$attribute->id} and values.user_id = users.id) as {$attribute->mobile}";
            $selects[] = "(SELECT {$attribute->string_value} FROM values where custom_attribute_id = {$attribute->id} and values.user_id = users.id) as {$attribute->address}";
        }
       
        $selects = implode(',', $selects);
       // $query->selectRaw("{$selects}");
        //$query->select(DB::raw("{$selects}"));
        //$query->select(DB::raw("$selects,date_value"));

        $date = DB::table('userdetails')
                ->where('name', '=', 'date')
                ->where ('user_id', '=', $id)
                ->get();

        $mobile = DB::table('userdetails')
                ->where('name', '=', 'mobile')
                ->where ('user_id', '=', $id)
                ->get();  
        
        $address = DB::table('userdetails')
                ->where('name', '=', 'address')
                ->where ('user_id', '=', $id)
                ->get(); 

        $details = DB::select('select * from userdetails where user_id=?',[$id]);
        return view('userdetails.editdetails',['details'=>$details,'attributes'=>$attributes,'date'=>$date,'mobile'=>$mobile,'address'=>$address]);
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
        // //$eav = Eav::where('entity_type', 'product')->where('entity_id', 1)->where('attribute_name', 'name')->first();
        //     $eav->attribute_value = 'My Updated Product';
        //     $eav->save();
        // SET foreign_key_checks = 0;
        // UPDATE languages SET id='xyz' WHERE id='abc';
        // UPDATE categories_languages SET language_id='xyz' WHERE language_id='abc';
        // SET foreign_key_checks = 1;
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
