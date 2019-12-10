<?php

namespace App\Http\Controllers;
use App\User;
use App\student_details;
use Illuminate\Http\Request;

class studentController extends Controller
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
        return view('admin.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
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
            'name'=>'required',
             'email'=> 'required|email|unique:users',
            'group_id'=> 'required|numeric',
            'password'=>'required|confirmed|min:8',
            'phone_number'=>"required|min:11|max:11",
            'data_of_birth'=>'date',
          ]);
          $user= new User();
          $user->name=$request->name;
          $user->email=$request->email;
          $user->role_id=1;
          $user->password= bcrypt($request->password);
          $user->save();
          $student_details=new student_details();
          $student_details->phone_number=$request->phone_number;
          $student_details->date_of_birth=$request->date_of_birth;
          $student_details->address=$request->address;
          $student_details->gender=$request->gender;
          $student_details->user_id=$user->id;
          $student_details->studentclass_id=$request->group_id;
          $student_details->save();
          return redirect('/student');

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
        $student=student_details::findorfail($id);
        return view('admin.student.edit',compact('student'));
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
        $this->validate($request,[
            'name'=>'required',
            'email'=> 'required|email',
            'group_id'=> 'required|numeric',
            'phone_number'=>"required|min:11|max:11",
            'data_of_birth'=>'date',
          ]);

          $student_details=student_details::find($id);
          $student_details->phone_number=$request->phone_number;
          $student_details->date_of_birth=$request->date_of_birth;
          $student_details->address=$request->address;
          $student_details->gender=$request->gender;
          $student_details->studentclass_id=$request->group_id;
          $student_details->save();
          $user= User::find($student_details->user_id);
          $user->name=$request->name;
          $user->email=$request->email;
          $user->role_id=1;
          $user->save();
          return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $student_details=student_details::find($user->student_details->id);
        $student_details->delete();
        $user->delete();
        return back();
    }
}
