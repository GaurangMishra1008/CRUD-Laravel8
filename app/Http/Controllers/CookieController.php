<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller {
   public function setCookie(Request $request) {
      $minutes = 1;
      $response = new Response('this is cookie');
      $response->withCookie(cookie('mishra', 'virat', $minutes));
      return $response;
   }
   public function getCookie(Request $request) {
      $value = $request->cookie('mishra');
      echo $value;
      return $value;
   }
}