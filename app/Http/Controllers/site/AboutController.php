<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $numbers = [3,4,5,90,20,10];
        $name = "Ram";
        return view('about',compact('numbers','name'));
    }
}
