<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;
use Nette\Utils\Paginator;

class StudentController extends Controller
{
    public function create()
    {
        return view('Student.View');
    }
    public function store(Request $data)
    {
        $validatedData = $data->validate([
            'name' => 'required',
            'subject' => 'required',
            'description' => 'required'
        ]);
        $student = new Student;
        $student->name = $data->name;
        $student->subject = $data->subject;
        $student->description = $data->description;
        $student->save();
        // $show=Student::create($validatedData);
        // $request->session()->flash('alert-success', 'User was successful added!');
        // return $this->show()->with('success', 'successfully saved');;
        $this->setCookie();
        return $this->show()->with(session()->flash('alert-success', 'data saved successful added!'))->with($this->setCookie($data));
        // return $this->show();
    }
    public function setCookie() {
        $minutes = 1;
        $response = new Response();
        $response->withCookie(cookie('Mishssra', 'virat', $minutes));
        // return $response;
     }
    public static function show()
    {
        $data = Student::Paginate(5);
        return view('Student.View', ['data' => $data]);
    }
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect('View');
        // return show();
    }
    public static function showdata($id)
    {
        $id=base64_decode($id);
        $data = Student::find($id);
        return view('Student.Update',  ['data' => $data]);
    }
    function update(Request $update)
    {
        $data = Student::find($update->id);
        $data->name=$update->name;
        $data->subject=$update->subject;
        $data->Description=$update->Description;
        $data->save();
        return redirect('View');
    }
}
