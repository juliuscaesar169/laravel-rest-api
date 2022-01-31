<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Commune;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $date = now()->toDateString(); // get current date

        $data = $request->validate([
            'dni' => 'required|integer|unique:customers,dni',
            'id_reg' => 'required|integer',
            'id_com' => 'required|integer',
            'email' => 'required|string|unique:customers,email',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'nullable|string',
        ]);
        
        // region and commune -> get and validate
        $region = Region::where('id_reg', '=', $data['id_reg'])->first();
        $commune = Commune::where('id_com', '=', $data['id_com'])->first();
        if (!($commune || $region)) return 'Invalid id';
        if ($commune['id_reg'] !== $region['id_reg']) return 'Invalid id';

        if($request->address === 'null') $request['address'] = null;

        $customer = Customer::create([
            'dni' => $data['dni'],
            'id_reg' => $data['id_reg'],
            'id_com' => $data['id_com'],
            'email' => $data['email'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'address' => $request['address'],
            'date_reg' => $date
        ]);

        //$customToken = sha1($data['dni'].$data['email'].rand(200,500));        
        $token = $customer->createToken('gdalabtoken')->plainTextToken;

        $response = [
            'customer' => $customer,
            'commune' => $commune['description'],
            'region' => $region['description'],
            'token' => $token,
            // 'customToken' => $customToken,
            'success' => true,
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|string',
        ]);

        $customer = Customer::where('email', $data['email'])->first();

        $token = $customer->createToken('gdalabtoken')->plainTextToken;

        $response = [
            'customer' => $customer,
            'token' => $token,
            'success' => true,
        ];

        return response($response);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Success true'
        ];
    }
}
