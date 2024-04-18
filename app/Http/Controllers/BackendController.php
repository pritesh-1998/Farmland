<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;


class BackendController extends Controller
{
    public function index(Request $request){
        $allFarmers = DB::table('suppliers')->select("SupplierName","id")->distinct()->get();
        return view('dashboard',compact('allFarmers'));
    }

    public function createstock(Request $request){

        $rules =  [
            'product'        			=> 'required',
            'price'  				    => 'required',
            'farmerid'        			=> 'required',
            'location'  				=> 'required',
            'description'  				=> 'required',
            'quantity'  				=> 'required',
        ];

        $customized_error_msg = [
            'product.required'      			 => "Product Name is required.",
            'price.required'                     => "Price is required.",
            'farmerid.required'      			 => "Farmer Id is required.",
            'location.required' 				 => "Location is required.",
            'description.required' 				 => "Description is required.",
            'quantity.required' 				 => "Quantity is required.",
        ];

        $validator = Validator::make($request->all(),$rules,$customized_error_msg);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product 		= isset($request->product) ? $request->product : '';
        $price 			= isset($request->price) ? $request->price : '';
        $farmerid       = isset($request->farmerid) ? $request->farmerid : '';
        $location       = isset($request->location) ? $request->location : '';
        $description 	= isset($request->description) ? $request->description : '';
        $quantity 	    = isset($request->quantity) ? $request->quantity : '';

        $details = [
            'product'             => $product,
            'price' 	          => $price,
            'farmerid'            => $farmerid,            
            'location' 	          => $location,
            'description'         => $description,
            'quantity'            => $quantity,
            'status'              => "1",

        ];

        $queryState = DB::table("warehouse")->insert($details);
        if($queryState) {
            return redirect()->back()->banner('Stock added in the warehouse Successfully');
        } else {
            return redirect()->back()->dangerBanner('Something Went Wrong');
        }
    }

}
