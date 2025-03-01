<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Service;
use App\Models\Services_type;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $services = Service::where('status', Service::ACTIVE_STATUS)
            ->get(['id', 'name', 'image', 'services_ids']);


        $services_type = Services_type::where('store_id', auth()->user()->id)->get();

        $services = $services->map(function ($service) use ($services_type) {
            return [
                'id' => $service->id,
                'name' => $service->name,
                'image' => $service->image,
                'addons' => collect($service->services_ids)
                    ->map(function ($id) use ($services_type) {
                        return $services_type->get($id);
                    })
                    ->filter()
                    ->values(),
            ];
        });

        $addons = Addon::where('store_id', auth()->user()->id)->get();

        $customers = Customer::where('store_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get(['id', 'name', 'email']);

        $data = [
            'services' => $services,
            'customers' => $customers,
            'addons' => $addons,
            'payment_methods' => Orders::PAYMENT_TYPE,
        ];

        return view('pos', compact('data'));
    }

    public function save()
    {
        return view('layout.print');
    }
}
