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
     *  Store a new customer in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = now()->toDateString();

        $request->validate([
            'dni' => 'required|string|unique:cusomers,dni',
            'email' => 'required|string|unique:customers,email',
            'name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        return Customer::create($request->all());
    }

    /**
     * Display a specific customer by dni.
     *
     * @param  str  $dni
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
     * @param  str  $dni
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
     * @param  str  $dni
     * @return \Illuminate\Http\Response
     */
    public function delete($dni)
    {
        $customer = Customer::find($dni);

        if($customer->status !== 'A' || 'I'){
            return response("Registro no existe");
        }

        $customer->softDeletes();
        $customer->status = 'trash';
        $customer->save();
        
        return response($customer);        
    }

    /**
     * Search for a name / by name
     *
     * @param  str  $dni
     * @return \Illuminate\Http\Response
     */
    public function searchByName($dni)
    {
        return Customer::where('name', 'like', '%'.$dni.'%')->get();
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
        // Token generator
        // $email = "tst@tst.com";
        // $dni = 22448801;
        // $random_num = (rand(200,500));
        // $token = sha1($str + $email + $dni + $random_num);
        // return token;

        // get coustomer w commune
        $customer = Customer::with('communes')->first();

        return $customer->toArray();

    }
}
