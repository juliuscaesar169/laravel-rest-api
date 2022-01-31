<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Commune;
use App\Models\Region;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     *  Store a new customer in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $response = [
            'customer' => $customer,
            'commune' => $commune['description'],
            'region' => $region['description'],
        ];

        return response($response, 201);
    }

    /**
     * Display a specific customer by dni or email.
     *
     * @param  str  $data
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        if (str_contains($data, '@')) {
            $customer = Customer::where('email', 'like', '%'.$data.'%')->get()[0];
        } else {
            $customer = Customer::where('dni', 'like', '%'.$data.'%')->get()[0];
        }
        return $customer['status'] !== ('trash') ? $customer : 'Registro no existe';
    }

    /**
     * Soft delete.
     *
     * @param  str  $dni
     * @return \Illuminate\Http\Response
     */
    public function delete($dni)
    {
        $customer = Customer::where('dni', '=', $dni)->get()[0];

        if ($customer->status === 'trash') {
            return response('Registro no existe');
        }

        // $customer->softDeletes();
        $customer->status = 'trash';
        $customer->save();
        
        return $customer;   
    }    
}
