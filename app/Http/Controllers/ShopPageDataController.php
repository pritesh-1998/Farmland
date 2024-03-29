<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShopPageDataController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $validatedData = $request->validate([
                'crop' => 'nullable|string|required',
                'quantity' => 'nullable|string|required',
                'location' => 'nullable|string|required',
            ]);

            if ($request->filled('crop') && $request->filled('quantity') && $request->filled('location')) {
                $allProducts = DB::table('warehouse')->where("product", "=", $request->input('crop'))
                            ->where("location", "=", $request->input('location'))
                            ->where("quantity", "=", $request->input('quantity'))
                            ->get();
                return response()->json($allProducts);
            }
        }else{
            $allProducts = DB::table('warehouse')->select("*")->get();
            $allCrops = DB::table('warehouse')->select("product")->distinct()->get();
            $data=["allproducts" =>$allProducts,"allcrops" => $allCrops];
            return view('shop')->with('data', $data);
        }
    }

    public function get_crops_ajax(Request $request){
        $allProducts = DB::table('warehouse')->select("*")->get();
        $allCrops = DB::table('warehouse')->select("product")->distinct()->get(); // Assuming your state model has a 'name' attribute
        $data =[
            "products" =>$allProducts,
            "allCrops" =>$allCrops
        ];
        return response()->json($data);
    }

    public function fetchfamerproducts(Request $request){
        $productID     = isset($request->productID) ? $request->productID :"";
        $farmerid      = isset($request->farmerid) ? $request->farmerid : "";
        $filteredData = DB::table("suppliers")
                        ->join("warehouse", function($join){
                            $join->on("suppliers.id", "=", "warehouse.farmerid");
                        })
                        ->where("suppliers.id", "=", $farmerid)
                        ->where("warehouse.id", "=", $productID)
                        ->first();
        // dd($filteredData);
        return response()->json($filteredData);
    }

    public function get_quantity_ajax(Request $request){
        $cropType      = isset($request->cropType) ? $request->cropType : "";
        $cropLocation  = isset($request->Location) ? $request->Location : "";
        $filteredData = DB::table('warehouse')->select("quantity")->where("product" ,$cropType)->where("location" ,$cropLocation)->get(); // Assuming your state model has a 'name' attribute
        return $filteredData;
    }

    public function get_location_ajax(Request $request){
       
        $cropType= isset($request->cropType) ? $request->cropType :"";
        $filteredData = [];
        if(!empty($cropType)){
            $filteredData = DB::table('warehouse')->select("location")->where("product" ,$cropType)->get(); // Assuming your state model has a 'name' attribute
        }
        return $filteredData;
        
    }

}
