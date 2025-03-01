<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class store extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'bhagataryan75@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'avatar' => 'https://i.pravatar.cc/150?img=2',
            'phone' => '1234567890',
            'address' => 'Dhaka, Bangladesh',
            'settings' => [
                'locale' => 'en',
                'timezone' => 'Asia/Kolkata',
                'currency' => 'USD',
                'currency_symbol' => '$',
                'currency_position' => 'left',
                'brand_name' => 'Laravel',
                'brand_description' => 'Laravel is the best PHP framework',
                'brand_logo' => 'https://i.pravatar.cc/150?img=2',
                'brand_favicon' => 'https://i.pravatar.cc/150?img=2',
                'brand_email' => 'bhagataryan75@gmail',
                'brand_phone' => '1234567890',
                'brand_address' => 'Dhaka, Bangladesh',
                'tax_id' => '1234567890',
            ],
            'last_login_at' => now(),
            'last_login_ip' => '127.0.0.1',
            'blocked_at' => null,
            'blocked_reason' => 'Blocked by admin',
        ]);
    }
}
