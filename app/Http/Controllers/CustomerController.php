<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index', ['customers' => Customer::getCustomersIndex()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create', [
            'country' => Country::select('name', 'id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());
        return redirect(RouteServiceProvider::CUSTOMERS);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', [
            'customer' => $customer,
            'country' => Country::find($customer->country_id),
            'tasks' => Customer::getTaskOfCustomer($customer->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $phone = explode('-', $customer->phone);
        $customer->phone = end($phone);
        return view('customers.edit', [
            'customer' => $customer,
            'country' => Country::select('name', 'id')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->fill($request->validated());
        $customer->save();

        $referer = $request->headers->get('referer');
        return $referer  == route('customers.show', [$customer]) ? redirect(RouteServiceProvider::CUSTOMERS . '/' . $customer->id) : redirect(RouteServiceProvider::CUSTOMERS);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        return redirect(RouteServiceProvider::CUSTOMERS);
    }
}
