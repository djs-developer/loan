<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\loantype;
use App\Http\Controllers\Controller;
use DB;

class loantypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = loantype::all();
        //$loan = DB::table('loantype')->get();
        return view('loantype.viewloan', ['loan' => $view]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $loantype = new loantype;
        $loantype->loanname = $request->loanname;
        $loantype->save();
        return redirect('/viewloan');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = loantype::where('id', $id)->get();
        //$loan = DB::select('select * from loantype where id=?',[$id]);
        return view('loantype.editloan',['loan'=>$edit]);
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
        $loantype = loantype::findOrFail($id);
        $loantype->loanname = $request->loanname;
        $loantype->save();
    return  redirect('/viewloan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted=loantype::find($id);
        $deleted->delete();
      // $deleted = DB::table('loantype')->delete($id);
       return redirect('/viewloan');
       
    }
}
