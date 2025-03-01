<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Service;
use App\Models\Services_type;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $types = Services_type::where('store_id', auth()->user()->id)->where('status', Services_type::ACTIVE_STATUS)->orderBy('id', 'desc')->get();
        $services = Service::where('store_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('services.index', compact('types', 'services'));
    }

    public function type()
    {
        $types = Services_type::where('store_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('services.types', compact('types'));
    }

    public function addons()
    {
        $addons = Addon::where('store_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('services.addons', compact('addons'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'services' => 'required|array',
            'status' => 'required|in:0,1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);

        // Full image url
        $imageUrl = url('uploads/' . $imageName);


        Service::create([
            'store_id' => auth()->user()->id,
            'name' => $request->name,
            'image' => $imageUrl,
            'services_ids' => $request->services,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Service created successfully');
    }

    public function delete_it(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        Service::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Service deleted successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:1',
            'status' => 'required|in:0,1',
        ]);

        Services_type::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->rate,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Service updated successfully');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        Services_type::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Service deleted successfully');
    }

    public function addons_create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:0,1',
        ]);

        Addon::create([
            'store_id' => auth()->user()->id,
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Addon created successfully');
    }

    public function addons_update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:0,1',
        ]);

        Addon::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Addon updated successfully');
    }

    public function addons_destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        Addon::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Addon deleted successfully');
    }
}
