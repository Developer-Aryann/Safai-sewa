<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Services_type as Services;

class Services_type extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Services::insert([
            [
                'store_id' => 1,
                'name' => 'Iron Press',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],
            [
                'store_id' => 1,
                'name' => 'Dry Clean',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],
            [
                'store_id' => 1,
                'name' => 'Wash & Fold',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],
            [
                'store_id' => 1,
                'name' => 'Wash & Iron',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],
            [
                'store_id' => 1,
                'name' => 'Dry Clean',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],
            [
                'store_id' => 1,
                'name' => 'Dry Wash',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],
            [
                'store_id' => 1,
                'name' => 'Dry Cleaning & Wash',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],
            [
                'store_id' => 1,
                'name' => 'Iron',
                'price' => 100,
                'status' => Services::ACTIVE_STATUS,
            ],

        ]);
    }
}
