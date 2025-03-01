<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupon::where('store_id', auth()->user()->id)->get();
        return view('coupons', compact('coupons'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'coupon_title' => 'required|string|max:255',
            'coupon_code' => 'required|string|max:255',
            'min_order_amount' => 'required|numeric|min:10',
            'max_order_amount' => 'required|numeric|min:10',
            'discount_amount' => 'required|numeric|min:1',
            'discount_type' => 'required|in:percentage,fixed',
            'user_limit' => 'required|string|in:one_time,multiple',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Coupon::create([
            'name' => $request->coupon_title,
            'code' => $request->coupon_code,
            'discount' => $request->discount_amount,
            'status' => Coupon::STATUS_ACTIVE,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'), 
            'end_date' => Carbon::parse($request->end_date)->format('Y-m-d H:i:s'), 
            'store_id' => auth()->user()->id,
            'min_order' => $request->min_order_amount ?? 0,
            'max_use' => $request->max_order_amount ?? null,
            'coupon_type' => Coupon::getCouponTypeValue($request->discount_type), 
            'user_usage_limit' => $request->user_limit == 'one_time' ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Coupon created successfully');
    }

    public function destroy(Request $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->update(['status' => Coupon::STATUS_INACTIVE]);
        return redirect()->back()->with('success', 'Coupon deleted successfully');
    }
}
