<?php

use App\Http\Controllers\CookieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\userAuth;
use App\Models\Teacher;
use App\Models\Student;

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

Route::get('/', function () {
    return view('Index');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/Index', function () {
    return view('Index');
});
Route::get('/Create', function () {
    if (session()->has('user'))
    {
        return view('Student.Create');
    }
    return view('Student.login');
});
Route::get('View', function () {
    if (session()->has('user'))
    {
        return StudentController::show();
    }
    return view('Student.Noaccess');
});
Route::get('/Update', function () {
    return view('Student.Update');
});
Route::get('/login', function () {
    if (session()->has('user'))
    {
        return redirect('Create');
    }

    return view('login');
    
});
Route::get('/logout', function () {
    if (session()->has('user'))
    {
        session()->pull('user');
    }
    return redirect('login');
    
});
Route::get('/CreateTeacher', function () {
    return view('Teacher.Create');
});
Route::get('ViewTeacher', function () {
        return TeacherController::show();
});
Route::get('ViewStudent',function()
{
    return TeacherController::showStudent();
});


Route::get('submit', [StudentController::class, 'create'])->name('submit.create');
Route::post('submit', [StudentController::class, 'store'])->name('submit.store');
// Route::get('View', [StudentController::class, 'show']);
Route::GET('/delete/{id}', [StudentController::class, 'destroy']);
Route::GET('/edit/{encrypted_id}', [StudentController::class, 'showdata']);
Route::POST('edit', [StudentController::class, 'update']);
Route::POST('user', [userAuth::class, 'login']);
Route::view('login','Student.login');
Route::get('/cookies',[CookieController::class, 'setCookie']);
Route::get('/get',[CookieController::class, 'getCookie']);
///ALL TEACHER CONTROLLERS

Route::get('/hemant',[StudentController::class , 'hello']);

Route::get('submitTeacher', [TeacherController::class, 'create']);
Route::post('submitTeacher', [TeacherController::class, 'store']);
Route::GET('/deleteTeacher/{id}', [TeacherController::class, 'destroy']);
Route::GET('/editTeacher/{id}', [TeacherController::class, 'showdata']);
Route::POST('editTeacher', [TeacherController::class, 'update']);

// Route::GET('/uploadfile', [UploadFileController::class, 'index']);
// Route::POST('uploadfile', [UploadFileController::class, 'showUploadFile']);


// Route::get('/uploadfile',[UploadFileController::class,'store']);
Route::post('/uploadfile',[UploadFileController::class,'store']);

Route::get('/formupload',function()
{
    return view('Upload');
});
// Route::get('/uploadfile','UploadFileController@index');
// Route::post('/uploadfile','UploadFileController@showUploadFile');
// Route::PATCH('/edit/{id}', [StudentController::class, 'update']);
// Route::GET('/Students/{id}/edit', [StudentController::class, 'update']);
// Route::resource('Students', StudentController::class);
// Route::patch('/Students/{id}/edit', 'StudentController@edit')->name('update-users');
// Route::GET('/delete/25', [StudentController::class, 'destroy']);
// Route :: get('/delete/{edit}/',[StudentController::class,'destroy']);