<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Services extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'store_id' => 1,
                'name' => 'Jeans',
                'image' => asset('assets/images/others/shorts.png'),
                'services_ids' => json_encode([
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8)
                ]),
                'status' => Service::ACTIVE_STATUS
            ],
            [
                'store_id' => 1,
                'name' => 'Trousers',
                'image' => asset('assets/images/others/shorts.png'),
                'services_ids' => json_encode([
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8)
                ]),
                'status' => Service::ACTIVE_STATUS
            ],
            [
                'store_id' => 1,
                'name' => 'T-Shirts',
                'image' => asset('assets/images/others/tshirt.png'),
                'services_ids' => json_encode([
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8),
                    rand(1, 8)
                ]),
                'status' => Service::ACTIVE_STATUS
            ]
        ]);
    }
}
