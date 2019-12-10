<?php

namespace App\Http\Controllers;

use App\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
        return view('admin.subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
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
            'user_id'=>'required',
          ]);
          $subject            =  new subject();
          $subject->name_ar   =  $request->name_ar;
          $subject->name_en   =  $request->name_en;
          $subject->studentclass_id  =  $request->group_id;
          $subject->user_id   =  $request->user_id;
          $subject->save();
          return redirect('/subject');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
    {
        return view('admin.subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subject $subject)
    {
        $this->validate($request,[
            'name_ar'=>'required',
            'name_en'=> 'required',
            'group_id'=> 'required',
            'user_id'=>'required',
          ]);
          $subject->name_ar   =  $request->name_ar;
          $subject->name_en   =  $request->name_en;
          $subject->group_id  =  $request->group_id;
          $subject->studentclass_id   =  $request->user_id;
          $subject->save();
          return redirect('/subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(subject $subject)
    {
        $subject->delete();
        return back();
    }
}
