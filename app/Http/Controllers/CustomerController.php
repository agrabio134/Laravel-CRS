<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
       //view all customers
       return view('customers.index', [
           'customers' => Customer::all()
       ]);
    }

    public function create()
{
    return view('customers.create' );
}


    public function store(Request $request)
    {
        $customer = Customer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        if ($customer) {
            return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        } else {
            return redirect()->route('customers.index')->with('error', 'Failed to create customer.');
        }
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');

        if ($customer->save()) {
            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        } else {
            return redirect()->route('customers.index')->with('error', 'Failed to update customer.');
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        if ($customer->delete()) {
            return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
        } else {
            return redirect()->route('customers.index')->with('error', 'Failed to delete customer.');
        }
    }
}
