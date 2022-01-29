<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;



class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|integer|unique:customers,dni',
            'email' => 'required|string|unique:customers,email',
            'name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        return Customer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        return Customer::find($dni);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dni)
    {
        //doesn't need it?
        $customer = Customer::find($dni);
        $customer->update($request->all());
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        return Customer::destroy($dni);
    }

    /**
     * Search for a dni / by dni
     *
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function searchByDni($dni)
    {
        return Customer::where('dni', 'like', '%'.$dni.'%')->get();
    }

    /**
     * Search for a email / by email
     *
     * @param  str  $email
     * @return \Illuminate\Http\Response
     */
    public function searchByEmail($email)
    {
        return Customer::where('email', '=', $email)->get();
    }//probably w like method is better

    /**
     * Test controller 
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        $email = "tst@tst.com";
        $dni = 22448801;
        $random_num = rand(200,500);
        $custom_token = sha1($email.$dni.$random_num);
        return $custom_token;
    }
}
