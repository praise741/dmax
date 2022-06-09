<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class index extends Controller
{
   public function index()
   {
       return response()->json(Auth::user());
   }
   public function topup()
   {
       return response([
'account number' => '232434343433',
'account name' => 'ola',
'bank' => 'wema',




       ]);
   }
   public function data(Request $request)
   {
       $request->validate([
'plan_id' => ['required','integer'],
'network_id' => ['required','integer'],
'mobilenumber' =>['required','integer'],
'amount'   => ['required', 'integer']

       ]);
   }
}
