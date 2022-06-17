<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class miscallenous extends Controller
{
public function data(Request $request)


{

validator($request->all(), [
   'network_id' => ['required','integer','min:0|max:8'],
   'url' => ['required','url'],
   'phone_no'  => ['required',],
   'plan_id'   => ['required','integer'],
   'ported_number' => ['required']
])->validate();

$id = rand(0, 99999);

$user = ['url' => $request->url, 'request_id' => $id ];

session(['data' => $user]);

return response()->json([
"status" => "pending",
"message" => "await response on your call back url",
"call_back url" =>   session('request'),
"request_id" => $id,



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
$user = ['url' => $request->url, 'request_id' => $id ];
    session(['cable' => $user]);
    return response()->json([
        "status" => "pending",
        "message" => "await response on your call back url",
        "call_back url" =>   session('cable'),
        'request_id' => $id



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
   $user = ['url' => $request->url, 'request_id' => $id ];
    session(['meter' => $user]);
    return response()->json([
        "status" => "pending",
        "message" => "await response on your call back url",
        "call_back url" =>   session('meter'),
        "request_id" => $id,



        ]);
   }
   public function airtime (Request $request){

    validator($request->all(), [
        'network_id' => ['required','integer','min:0|max:8'],
        'url' => ['required','url'],
        'phone_no'  => ['required'],
        'amount'   => ['required','integer'],
        'airtime_type' => ['required']
     ])->validate();

     $id = rand(0, 99999);

     $user = ['url' => $request->url, 'request_id' => $id ];

     

     return response()->json([
     "status" => "pending",
     "message" => "await response on your call back url",
     "call_back url" =>   session('request'),
     "request_id" => $id,



     ]);



   }
}
