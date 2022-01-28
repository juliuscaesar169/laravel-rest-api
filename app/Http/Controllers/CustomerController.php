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
            'dni' => 'required  ',
            'email' => 'required|string',
            'name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        return Customer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //doesn't need it?
        $customer = Customer::find($id);
        $customer->update($request->all());
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Customer::destroy($id);
    }

    /**
     * Search for a name / by name
     *
     * @param  int  $dni
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
        $email = "tst@tst.com";
        $dni = 22448801;
        $random_num = (rand(200,500));
        $token = sha1($str + $email + $dni + $random_num);
        return token;
    }
}
