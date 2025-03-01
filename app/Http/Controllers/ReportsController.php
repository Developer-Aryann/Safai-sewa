<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function daily()
    {
        $data = self::data(now());
        $response = [
            'orders' => $data['orders'] == 0 ? 1 : $data['orders'],
            'orders_delivered' => $data['orders_delivered'],
            'total_sales' => $data['total_sales'] == 0 ? 1 : $data['total_sales'],
            'total_payment' => $data['total_payment'] == 0 ? 0 : $data['total_payment'],
            'total_expense' => $data['total_expense'] == 0 ? 150 : $data['total_expense'],
        ];
        return view('reports.daily', compact('response'));
    }

    public function order()
    {
        return view('reports.daily');
    }

    public function daily_api($request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        return response()->json([
            'success' => true,
            'data' => self::data($request->date),
        ]);
    }

    private function data($date)
    {
        $user = auth()->user();
        $orders = Orders::where('store_id', $user->id)
            ->whereDate('created_at', $date)
            ->get();

        $data = [
            'orders' => $orders->count(),
            'orders_delivered' => $orders->where('status', Orders::COMPLETED)->count(),
            'total_sales' => $orders->sum('total'),
            'total_payment' => $orders->sum('grand_total'),
            'total_expense' => $orders->sum('expense'),
        ];

        return ($data);
    }
}
