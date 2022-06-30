<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class AdminOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
                'user_id' => 2,
                'product_id' => 1,
                'date' => '2022-06-30',
                'quantity' => 3,
                'price' => 80000,
                'total' => 240000,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'date' => '2022-06-30',
                'quantity' => 2,
                'price' => 45000,
                'total' => 90000,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'user_id' => 2,
                'product_id' => 3,
                'date' => '2022-06-30',
                'quantity' => 1,
                'price' => 20000,
                'total' => 20000,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ]
        ];
        Order::insert($order);
    }
}
