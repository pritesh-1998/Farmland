<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function makeBid(Request $request){
        $singlebidProduct = DB::table('warehouse')->where("id",$request->product)->select("*")->first();
        return view("bid")->with('data', $singlebidProduct);
    }
    public function submitBid(Request $request){
        $singlebidProduct = DB::table('warehouse')->where("id",$request->product)->select("*")->first();
        $details = [
            'product_id'          => $request->product,
            'name'                => $request->name,
            'location' 	          => $request->location,
            'price' 	          => $request->price,            
            'Quantity'            => $request->quantity,
            'time'                => date("y-m-d"),

        ];
        $queryState = DB::table("bids")->insert($details);
        if($queryState) {
            return json_encode('Stock added in the warehouse Successfully');
        } else {
            return json_encode('Something Went Wrong');
        }
    }
}
