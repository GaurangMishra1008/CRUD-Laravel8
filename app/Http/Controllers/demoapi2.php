<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class demoapi2 extends Controller
{
    public function api(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return "Please Enter All feilds";
        } else {
            $result = DB::table('login')->where('username','=',$req->username,'and')->where('password','=',$req->password)->get();
            if($result->isEmpty())
            return "Not a Valid Credentials";
            else
            return "Valid";

        }
    }
}
