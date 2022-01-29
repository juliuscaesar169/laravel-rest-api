<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;//toHashPw
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $date = now()->toDateString();

        $data = $request->validate([
            'dni' => 'required|integer|unique:customers,dni',
            'email' => 'required|string|unique:customers,email',
            'name' => 'required|string|',
            'last_name' => 'required|string',
        ]);

        // $id_reg = Customer::where

        $customer = Customer::create([
            'dni' => $data['dni'],
            // 'id_reg' => 1,
            // 'id_com' => 1,
            'email' => $data['email'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'date_reg' => $date
        ]);

        //$customToken = sha1($data['dni'].$data['email'].rand(200,500));        
        $token = $customer->createToken('myapptoken')->plainTextToken;

        $response = [
            'customer' => $customer,
            'token' => $token,
            // 'customToken' => $customToken
        ];

        return response($response, 201);
    }
}
