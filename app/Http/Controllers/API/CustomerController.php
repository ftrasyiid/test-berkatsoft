<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    private $customer;
    public function __construct(Customer $customer) {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer->getCustomers();
        return CustomerResource::collection($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Halo';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerData = $this->validate($request, [
            'name' => ['required', 'string'],
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'birthdate' => ['required', 'date'],
            'address' => ['nullable', 'string']
        ]);

        return $this->customer->setCustomer($customerData);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $customerData = $this->validate($request, [
            'name' => ['required', 'string'],
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'birthdate' => ['required', 'date'],
            'address' => ['nullable', 'string']
        ]);

        return $this->customer->updateCustomer($id, $customerData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->customer->deleteCustomer($id);

        return response(null, 204);
    }
}
