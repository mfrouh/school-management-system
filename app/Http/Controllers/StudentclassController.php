<?php

namespace App\Http\Controllers;

use App\studentclass;
use App\table;
use Illuminate\Http\Request;

class StudentclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware(['checkrole:3']);
    }
    public function index()
    {
        return view('admin.class.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar'=>'required',
            'name_en'=> 'required',
            'group_id'=> 'required',
          ]);
          $class=new studentclass();
          $class->name_ar=$request->name_ar;
          $class->name_en=$request->name_en;
          $class->group_id=$request->group_id;
          $class->save();
                for ($j=1; $j <=5 ; $j++)
                {
                  $table =new table();
                  $table->row_id=$j;
                  $table->studentclass_id=$class->id;
                  $table->save();
                }
          return redirect('/studentclass');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function show(studentclass $studentclass)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function edit(studentclass $studentclass)
    {
        return view('admin.class.edit',compact('studentclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentclass $studentclass)
    {
        $this->validate($request,[
            'name_ar'=>'required',
            'name_en'=> 'required',
            'group_id'=> 'required',
          ]);
          $studentclass->name_ar=$request->name_ar;
          $studentclass->name_en=$request->name_en;
          $studentclass->group_id=$request->group_id;
          $studentclass->save();
          return redirect('/studentclass');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(studentclass $studentclass)
    {
        $studentclass->delete();
        return back();
    }

}
