<?php

namespace App\Http\Controllers;

use App\content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware(['checkrole:2']);
    }
    public function index()
    {
        return view('teacher.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.content.create');
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
            'title'=>'required',
            'content'=> 'required',
            'subject_id'=> 'required',
          ]);
          $content = new content();
          $content->title       =  $request->title;
          $content->content     =  $request->content;
          $content->subject_id  =  $request->subject_id;
          $content->save();
          return redirect('/content');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(content $content)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(content $content)
    {
        return view('teacher.content.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, content $content)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=> 'required',
            'subject_id'=> 'required',
          ]);
          $content->title       =  $request->title;
          $content->content     =  $request->content;
          $content->subject_id  =  $request->subject_id;
          $content->save();
          return redirect('/content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(content $content)
    {
        $content->delete();
        return back();
    }
}
