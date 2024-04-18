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

    public function loadSchemePage(Request $request){
        return view('addSchemes');
    }
    public function addSchemes(Request $request){
        $rules =  [
            'name'        			    => 'required',
            'launched_date'  			=> 'required',
            'yt'        			    => 'required',
            'website'  				    => 'required',
            'description'  				=> 'required',
            'eligibility'  				=> 'required',
            'state'  				    => 'required',
        ];

        $customized_error_msg = [
            'name.required'      			 => "Scheme Name is required.",
            'description.required'           => "description is required.",
            'launched_date.required' 		 => "launched_date is required.",
            'yt.required'      			     => "youtube Link is required.",
            'website.required' 				 => "Website is required.",
            'eligibility.required' 			 => "Eligibility is required.",
            'state.required' 			     => "State is required.",
        ];

        $validator = Validator::make($request->all(),$rules,$customized_error_msg);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name 		    = isset($request->name) ? $request->name : '';
        $description 	= isset($request->description) ? $request->description : '';
        $launched_date 	= isset($request->launched_date) ? $request->launched_date : '';
        $yt             = isset($request->yt) ? $request->yt : '';
        $website        = isset($request->website) ? $request->website : '';
        $eligibility 	= isset($request->eligibility) ? $request->eligibility : '';
        $state      	= isset($request->state) ? $request->state : '';

        $details = [
            'name'           => $name,
            'description' 	 => $description,
            'launched_date'  => $launched_date,
            'youtube'        => $yt,            
            'website' 	     => $website,
            'eligibility'    => $eligibility,
            'state'          => $state,

        ];

        $queryState = DB::table("schemes")->insert($details);
        if($queryState) {
            return redirect()->back()->banner('Scheme added Successfully');
        } else {
            return redirect()->back()->dangerBanner('Something Went Wrong');
        }
    }
}
