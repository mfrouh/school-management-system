<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/lang/{lang}', function ($lang) {
    if(auth()->check()){
    auth()->user()->lang=$lang;
    auth()->user()->save();
    return back();
    }
    else
    {
        if(session()->get('lang'))
        {
            session()->put('lang',$lang);
            return back();
        }
    }
});

Route::group(['middleware' => 'lang'], function () {

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('group', 'GroupController');
Route::resource('sub_group', 'SubGroupController');
Route::resource('subject', 'SubjectController');
Route::resource('student', 'studentController');
Route::resource('teacher', 'teacherController');
Route::resource('studentclass', 'StudentclassController');
Route::resource('content', 'ContentController');
Route::resource('exam', 'ExamController');
Route::resource('question', 'QuestionController');
Route::get('/createquestion/{id}', 'ExamController@createquestion');
Route::get('/doexam/{id}', 'actionstudentController@doexam');
Route::post('/exam/storeexam', 'actionstudentController@storeexam');
Route::get('/resultexam/{id}', 'actionstudentController@resultexam')->name('resultexam');
Route::get('/results', 'actionstudentController@exams');
Route::get('/result/{id}', 'actionteacherController@resultexam');
Route::get('/resultexams', 'actionteacherController@exams');
Route::get('/details/{examid}/{userid}', 'actionteacherController@details');
Route::get('/myinformation', 'publicController@myinformation');
Route::put('/information', 'publicController@information');
Route::put('/changepassword', 'publicController@changepassword');
Route::get('/exams', 'actionstudentController@myexams');
Route::get('/mytable', 'actionstudentController@mytable');
Route::get('/mysubjectcontent/{id}', 'actionstudentController@mysubjectcontent');
Route::get('/table/{id}', 'adminController@table');
Route::post('/savetable', 'adminController@savetable');
Route::post('/sessionexam', 'actionstudentController@sessionexam');
Route::get('/register', function(){
    return abort('404');
});
Route::get('/mysubjecttable','actionteacherController@mytable');

Route::get('/home', 'HomeController@index')->name('home');
});
