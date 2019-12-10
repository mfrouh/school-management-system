<?php

namespace App\Http\Controllers;

use App\sub_group;
use Illuminate\Http\Request;

class SubGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.sub_group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.sub_group.create');

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
          $sub_group=new sub_group();
          $sub_group->name_ar=$request->name_ar;
          $sub_group->name_en=$request->name_en;
          $sub_group->group_id=$request->group_id;
          $sub_group->save();
          return redirect('/sub_group');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sub_group  $sub_group
     * @return \Illuminate\Http\Response
     */
    public function show(sub_group $sub_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sub_group  $sub_group
     * @return \Illuminate\Http\Response
     */
    public function edit(sub_group $sub_group)
    {
        return view('admin.sub_group.edit',compact('sub_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sub_group  $sub_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sub_group $sub_group)
    {
        $this->validate($request,[
            'name_ar'=>'required',
            'name_en'=> 'required',
            'group_id'=> 'required',
          ]);
          $sub_group->name_ar=$request->name_ar;
          $sub_group->name_en=$request->name_en;
          $sub_group->group_id=$request->group_id;
          $sub_group->save();
          return redirect('/sub_group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sub_group  $sub_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(sub_group $sub_group)
    {
        $sub_group->delete();
        return back();
    }
}
