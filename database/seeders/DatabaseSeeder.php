<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        \App\Models\User::create([
            'name' => 'Admin Donatin',
            'email' => 'admin@donatin.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Customer
        $customer = \App\Models\User::create([
            'name' => 'Dinda Kirana',
            'email' => 'dinda.manis@email.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'phone_number' => '081234567890',
            'address' => 'Jl. Mawar Melati Blok B No. 12',
            'bio' => 'Pecinta donat garis keras!',
        ]);

        $customer2 = \App\Models\User::create([
            'name' => 'Bima',
            'email' => 'bima@email.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'phone_number' => '089876543210',
        ]);

        // Menus
        $menu1 = \App\Models\Menu::create([
            'name' => 'Unicorn Sprinkle',
            'description' => 'Glaze pink manis wangi strawberry ditambah taburan sprinkle.',
            'base_price' => 25000,
            'extra_price' => 5000,
            'image_path' => '🦄',
        ]);
        
        $menu2 = \App\Models\Menu::create([
            'name' => 'Goldbite Choco',
            'description' => 'Dark chocolate lumer dengan serpihan emas elegan.',
            'base_price' => 30000,
            'extra_price' => 6000,
            'image_path' => '🍫',
        ]);
        
        $menu3 = \App\Models\Menu::create([
            'name' => 'Berry Wonderland',
            'description' => 'Cream cheese dengan potongan strawberry asli segar.',
            'base_price' => 25000,
            'extra_price' => 5000,
            'image_path' => '🍓',
        ]);
        
        $menu4 = \App\Models\Menu::create([
            'name' => 'Matcha Magic',
            'description' => 'Rasa matcha pekat ala cafe Jepang, tidak terlalu manis.',
            'base_price' => 25000,
            'extra_price' => 5000,
            'image_path' => '🍵',
        ]);

        // Orders
        \App\Models\Order::create([
            'invoice_id' => 'INV-001',
            'user_id' => $customer->id,
            'menu_id' => $menu1->id,
            'quantity' => 2,
            'size' => 5,
            'total_price' => 50000,
            'service_type' => 'Delivery',
            'notes' => 'Kartu: Happy Birthday anakku sayang!',
            'status' => 'Selesai',
        ]);

        \App\Models\Order::create([
            'invoice_id' => 'INV-002',
            'user_id' => $customer2->id,
            'menu_id' => $menu2->id,
            'quantity' => 1,
            'size' => 7,
            'total_price' => 42000,
            'service_type' => 'Take Away',
            'notes' => '-',
            'status' => 'Perjalanan',
        ]);
    }
}
