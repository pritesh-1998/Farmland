<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getWeather(Request $request){
        return view("weather");
    }

    public function getSchems(Request $request){
        return view("scheme");
    }
}
