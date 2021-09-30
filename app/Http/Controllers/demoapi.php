<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class demoapi extends Controller
{
    //


    public function api(Request $req){
return "hello";
         $result = Student::find($req->id);
        $data = Student::get();
        // $user = [ 
        //    'name'=>"Abhishek",
        //    'last name'=>'Khandelwal'
        // ];
        // return $user;
    }
}
