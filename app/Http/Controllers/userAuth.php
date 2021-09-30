<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class userAuth extends Controller
{
    public function login(Request $req)
    {
           $data= $req->input();
           $req->session()->put('user',$data['user']);
           return redirect('Create');
    }
}
