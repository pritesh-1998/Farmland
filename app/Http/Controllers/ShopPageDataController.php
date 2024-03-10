<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShopPageDataController extends Controller
{
    public function get_crops_ajax(Request $request)
    {
        $filteredStates = DB::table('warehouse')->select("product")->distinct()->get(); // Assuming your state model has a 'name' attribute
        return response()->json(["results" => $filteredStates]);
    }

    public function get_quantity_location_ajax(Request $request){
        $cropType= isset($request->cropType) ? $request->cropType :[];
        $filteredData = [];
        if(!empty($cropType)){
            $filteredData = DB::table('warehouse')->select("quantity" ,"location")->where("product" ,$cropType)->get(); // Assuming your state model has a 'name' attribute
        }
        return $filteredData;
        
    }
}
