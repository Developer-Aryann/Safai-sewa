<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        return view('orders');
    }

    public function show($id)
    {
        return view('orders_details', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Order updated successfully');
    }
}
