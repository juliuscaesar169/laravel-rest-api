<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'dni' => 'required|string|unique:cusomers,dni',
            'email' => 'required|string|unique:customers,email',
            'name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        $customer = User::create([
            'dni' => $data['dni'],
            'email' => $data['email'],
            'name' => $data['password'],
            'last_name' => $data['last_name']
        ]);

        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            // 'token' => $token
        ];

        return response($response, 201);
    }
}
