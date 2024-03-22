<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\documenttype;
use App\Http\Controllers\Controller;
use DB;

class documenttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {

        $view = documenttype::all();
           // //$doctype = DB::table('documenttype')->get();
        return view('documenttype.viewdocumenttype', ['doctype' => $view]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request):RedirectResponse
    {
        $documenttype = new documenttype;
        $documenttype->docname = $request->docname;
        $documenttype->save();
        return redirect('/viewdocument');
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
        $edit = documenttype::where('id', $id)->get();
       // $doctype = DB::select('select * from documenttype where id=?',[$id]);
        return view('documenttype.editdocumenttype',['doctype'=>$edit]);
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
        $doctype = documenttype::findOrFail($id);
        $doctype->docname = $request->docname;
        $doctype->save();
    return  redirect('/viewdocument');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(documenttype $users)
    {
            $users = documenttype::latest();
            //$users=documenttype::find($id);
            $users->delete();
         return redirect('/viewdocument')
            ->withSuccess(__('User deleted successfully.'));

    //     $deleted=documenttype::find($id);
    //     $deleted->delete();
    //     //$deleted = DB::table('documenttype')->delete($id);
    //    return redirect('/viewdocument');
    }

    public function restore($id) 
    {
        
        $user  = documenttype::where('id', $id)->withTrashed()->restore();

        return redirect()->route('/viewdocument', ['status' => 'archived'])
            ->withSuccess(__('User restored successfully.'));
        
    }

    public function forceDelete($id) 
    {
       $user =  documenttype::where('id', $id)->withTrashed()->forceDelete();

        return redirect()->route('/viewdocument', ['status' => 'archived'])
            ->withSuccess(__('User force deleted successfully.'));
    }
    
    public function restoreAll() 
    {
       $user =  documenttype::onlyTrashed()->restore();
        return redirect('/viewdocument');
       // return redirect()->route('documenttype.viewdocument')->withSuccess(__('All users restored successfully.'));
    }
}
