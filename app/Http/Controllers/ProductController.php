<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getCropData(Request $request){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070?api-key=579b464db66ec23bdd000001cdc3b564546246a772a26393094f5645&limit=all&format=json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = [];
        $store_path = storage_path('app/public')."/govtCropData.json";
        file_put_contents($store_path, ($response));

    }

    public function getCrops(Request $request){
        if($request->ajax()){
            $store_path = storage_path('app/public')."/govtCropData.json";
            $cropData = file_get_contents($store_path);
            $data = json_decode($cropData, true);
            $records = collect($data["records"]);
            $take10stateData = $records->groupBy('state')->map(function ($stateRecords) {
                $firstTenRecords = $stateRecords->slice(0, 10);
                return $firstTenRecords->values();
            })->values();
    
            $datatable_data = [];
            foreach ($take10stateData as $recordkey => $recordvalue) {
                foreach ($recordvalue as $singlleStatekey => $singlleStatevalue) {
                    $datatable_data[] = [
                        'state' => $singlleStatevalue['state'],
                        'district' => $singlleStatevalue['district'],
                        'market' => $singlleStatevalue['market'],
                        'commodity' => $singlleStatevalue['commodity'],
                        'variety' => $singlleStatevalue['variety'],
                        'arrival_date' => $singlleStatevalue['arrival_date'],
                        'min_price' => $singlleStatevalue['min_price'],
                        'max_price' => $singlleStatevalue['max_price'],
                        'modal_price' => $singlleStatevalue['modal_price']
                    ];
                }
            }
    
            shuffle($datatable_data);
            $response = [
                'data' => $datatable_data
            ];
    
            return ($response);
        }
        return view("cropData");
    }
}
