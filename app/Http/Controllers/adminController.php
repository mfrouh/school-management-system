<?php

namespace App\Http\Controllers;
use App\table;
use Illuminate\Http\Request;

class adminController extends Controller
{
 public function __construct()
 {
     return $this->middleware(['checkrole:3']);
 }
 public function table($id)
 {
    return view('admin.table.mytable',compact('id'));
 }
 public function savetable(Request $request)
 {
  $table=table::where('studentclass_id',$request->classid)->where('row_id',$request->row_id)->first();
  $table[$request->row]=$request->value;
  $table->save();
  return response()->json(['sucess'=>'data add']);
 }
}
