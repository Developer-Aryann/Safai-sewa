<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::where('store_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('customers', compact('customers'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'number' => 'nullable|numeric|digits:10',
            'address' => 'nullable|string|max:255',
            'taxnumber' => 'nullable|string|max:25',
        ]);

        Customer::create([
            'store_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->number,
            'address' => $request->address,
            'other' => '',
        ]);

        return redirect()->route('customers')->with('success', 'Customer created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            '_userid' => 'required|numeric',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'number' => 'nullable|numeric|digits:10',
            'address' => 'nullable|string|max:255',
            'taxnumber' => 'nullable|string|max:25',
        ]);

        Customer::where('id', $request->_userid)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->number,
                'address' => $request->address,
                'other' => '',
            ]);

        return redirect()->route('customers')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Request $request)
    {
        Customer::where('id', $request->_userid)->delete();
        return redirect()->route('customers')->with('success', 'Customer deleted successfully.');
    }
}
