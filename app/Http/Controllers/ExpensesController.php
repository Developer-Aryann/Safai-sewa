<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Expenses_category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpensesController extends Controller
{
    public function index()
    {
        $cateogries = Expenses_category::where('store_id', auth()->user()->id)->get();
        $expenses = Expenses::where('store_id', auth()->user()->id)->get();
        return view('expenses.expenses_lists', compact('expenses', 'cateogries'));
    }

    public function cateogry()
    {
        $cateogries = Expenses_category::where('store_id', auth()->user()->id)->get();
        return view('expenses.cateogary', compact('cateogries'));
    }

    public function create_expense(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'towards' => 'required|integer',
            'payment_mode' => 'required|in:cash,online',
            'tax_included' => 'required|in:yes,no',
        ]);

        Expenses::create([
            'store_id' => auth()->user()->id,
            'category_id' => $request->towards,
            'amount' => $request->amount,
            'description' => $request->description ?? null,
            'date' => Carbon::parse($request->date)->format('Y-m-d H:i:s'),
            'tax' => $request->tax_included == 'yes' ? 1 : 0,
            'tax_amount' => $request->tax_included == 'yes' ? $request->amount * 0.18 : 0,
        ]);

        return back()->with('success', 'Expense created successfully');
    }

    public function destroy_expense(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        Expenses::where('id', $request->id)
            ->where('store_id', auth()->user()->id)
            ->delete();

        return back()->with('success', 'Expense deleted successfully');
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
        ]);

        Expenses_category::create([
            'store_id' => auth()->user()->id,
            'name' => $request->category_name,
        ]);

        return back()->with('success', 'Category created successfully');
    }

    public function destroy(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer', // Use 'id' instead of '_id'
        ]);

        // Delete the category
        Expenses_category::where('id', $request->id)
            ->where('store_id', auth()->user()->id)
            ->delete();

        // Redirect back with a success message
        return back()->with('success', 'Category deleted successfully');
    }
}
