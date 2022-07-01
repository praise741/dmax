<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class miscallenous extends Controller
{
public function data(Request $request)


{

validator($request->all(), [
   'network_id' => ['required','integer','min:0|max:8'],
   'url' => ['required'],
   'phone_no'  => ['required',],
   'plan_id'   => ['required','integer'],

])->validate();

$id = rand(0, 99999);

$user = ['url' => $request->url, 'request_id' => $id ];

session(['data' => $user]);

$response = Http::asForm()->post('https://www.datamaxs.com/datamaxs/datamaxscopy/0/Airtimenew', [
    'network_id'=> $request->network_id,
    'url' => 'https://purple-feather-larr3wss3s.ploi.link/data',
    'phone_no' => $request->phone_no,
    'plan_id' => $request->plan_id,
    'ported_number' => 'true',
    'call_back_url' => $request->url,
    'request_id' => $id



]);


return response()->json([

"request_id" => $id,
'response' => $response->json(),
'request' => $request->network_id,



]);




   }
public function callback(Request $request){
    $response = Http::withHeaders([
        'id' => $request->id,

    ])->post($request -> url, [
        $request

    ]);

}


   public function cable(Request $request)
   {
    validator($request->all(), [
        'cable_name' =>['required'],
        'cable_plan' => ['required'],
        'url' => ['required','url'],
        'smart_card_number' => ['required','integer','min:0|max:8'],



    ])->validate();
    $id = rand(0, 99999);
    $response = Http::asForm()->post('https://www.datamaxs.com/datamaxs/datamaxscopy/0/Airtimenew', [
        'cable_name'=> $request->cable_name,
        'url' => 'https://purple-feather-larr3wss3s.ploi.link/data',
        'cable_plan' => $request->cable_plan,
        'smart_card_number' => $request->smart_card_number,

        'call_back_url' => $request->url,
        'request_id' => $id



    ]);

    return response()->json([
    "request_id" => $id,
    'response' => $response->json(),
    'request' => $request->network_id,
        ]);

   }





   public function meter(Request $request)
   {
    validator($request->all(), [
       'amount' => ['required','integer'],
        'meter_no' => ['required','integer','min:8'],
         'meter_type' => ['required','integer','between:1,2'],
         'url' => ['required','url'],


    ])->validate();
    $id = rand(0, 99999);
    $response = Http::asForm()->post('https://www.datamaxs.com/datamaxs/datamaxscopy/0/Airtimenew', [
        'amount'=> $request->amount,
        'url' => 'https://purple-feather-larr3wss3s.ploi.link/data',
        'meter_no' => $request->meter_no,
        'meter_type' => $request->meter_type,

        'call_back_url' => $request->url,
        'request_id' => $id



    ]);
    return response()->json([
        "request_id" => $id,
        'response' => $response->json(),
        'request' => $request->network_id,
            ]);


   }
   public function airtime (Request $request){

    validator($request->all(), [
        'network_id' => ['required','integer','min:0|max:8'],

        'phone_no'  => ['required'],
        'amount'   => ['required','integer'],

     ])->validate();

     $id = rand(0, 99999);
     $response = Http::asForm()->post('http://www.datamaxs.com/datamaxspro/datamaxscopy/0/Airtimenew', [
        'amount'=> $request->amount,
        'api_key' =>  $request->header('Authorization'),
        'network_id' => $request->network_id,
        'phone_no'  => $request->phone_no,
        'ported_number' =>  true,


        'request_id' => $id



    ]);



     return response()->json([
        "request_id" => $id,
        'response' => $response->json(),
        'request' => $request->network_id,
            ]);



   }

}

