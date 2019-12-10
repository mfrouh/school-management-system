<?php

namespace App\Http\Controllers;
use App\User;
use App\teacher_details;
use Illuminate\Http\Request;

class teacherController extends Controller
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
        return view('admin.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
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
            'password'=>'required|confirmed|min:8',
            'phone_number'=>"required|min:11|max:11",
            'data_of_birth'=>'date',
          ]);
          $user= new User();
          $user->name=$request->name;
          $user->email=$request->email;
          $user->role_id=2;
          $user->password= bcrypt($request->password);
          $user->save();
          $teacher_details=new teacher_details();
          $teacher_details->phone_number=$request->phone_number;
          $teacher_details->date_of_birth=$request->date_of_birth;
          $teacher_details->address=$request->address;
          $teacher_details->gender=$request->gender;
          $teacher_details->user_id=$user->id;
          $teacher_details->save();
          return redirect('/teacher');

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
        $teacher=teacher_details::find($id);
        return view('admin.teacher.edit',compact('teacher'));
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
            'phone_number'=>"required|min:11|max:11",
            'data_of_birth'=>'date',
          ]);

          $teacher_details=teacher_details::find($id);
          $teacher_details->phone_number=$request->phone_number;
          $teacher_details->date_of_birth=$request->date_of_birth;
          $teacher_details->address=$request->address;
          $teacher_details->gender=$request->gender;
          $teacher_details->save();
          $user= User::find($teacher_details->user_id);
          $user->name=$request->name;
          $user->email=$request->email;
          $user->role_id=2;
          $user->save();
          return redirect('/teacher');
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
        $teacher_details=teacher_details::find($user->teacher_details->id);
        $teacher_details->delete();
        $user->delete();
        return back();
    }
}
