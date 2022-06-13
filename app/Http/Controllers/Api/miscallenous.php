<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class miscallenous extends Controller
{
function data(Request $request){

validator($request->all(), [
    'network_id' => ['required','integer'],
   'phone_no'  => ['required','integer'],
   'plan_id'   => ['required','integer'],
   'ported_number' => ['required','integer']
])->validate();


return response()->json([
'network_id' => $request->network_id,
'phone_no' => $request->phone_no,
'plan_id' => $request->plan_id,
'ported_number' => $request->ported_number,
'token'  => $request->header('Authorization'),



]);




   }
}
