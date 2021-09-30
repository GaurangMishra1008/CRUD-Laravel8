<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Student;

class TeacherController extends Controller
{
    public function create()
    {
        return view('Teacher.View');
    }

    public function store(Request $data)
    {
        // $validatedData = $data->validate([
        //     'name' => 'required',
        //     'subject' => 'required',
        //     'Description' => 'required'
        // ]);
        $teacher = new Teacher;
        $teacher->Teacher_name = $data->Teacher_name;
        $teacher->stream = $data->stream;
        $teacher->save();
        // $show=teacher::create($validatedData);
        return $this->show()->with(session()->flash('alert-success', 'data saved successful added!'));
    }
    public function setCookie($data) {
        return "hello";
        // $minutes = 1;
        // $response = new Response('this is cookie');
        // $response->withCookie(cookie('Gaurang', 'virat', $minutes));
     }
    public static function show()
    {
        $data = Teacher::get();
        return view('Teacher.View', ['data' => $data]);

    }
    public function destroy($id)
    {
        $data = Teacher::find($id);

        $data->delete();
        return redirect('ViewTeacher');
        // return show();
    }
    public function showdata($id)
    {
        $data = Teacher::find($id);
        return view('Teacher.Update', ['data' => $data]);
    }
    public function update(Request $update)
    {
        $data = Teacher::find($update->id);
        $data->Teacher_name = $update->Teacher_name;
        $data->stream = $update->stream;
        $data->save();
        return redirect('ViewTeacher');
    }
    public static function showStudent()
    {
        $data = Teacher::join('students','students.subject', '=', 'teachers.stream')->get(['teachers.Teacher_name', 'students.id', 'students.name','students.description','students.subject']);
        return view('Student.ViewStudent', ['data' => $data]);
        // $users = User::join('posts','posts.user_id', '=', 'users.id')
        //     ->where('users.status', 'active')
        //     ->where('posts.status','active')
        //     ->get(['users.*', 'posts.descrption'])
    }
}
