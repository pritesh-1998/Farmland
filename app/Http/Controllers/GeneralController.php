<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getWeather(Request $request){
        return view("weather");
    }

    public function getSchems(Request $request){
        
        $allSchemes = DB::table('schemes')->get();
        return view('scheme',compact('allSchemes'));
    }
}
