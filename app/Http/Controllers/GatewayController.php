<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GatewayController extends Controller
{
    public function index (){
        return view('admin.gateway');
    }
}
