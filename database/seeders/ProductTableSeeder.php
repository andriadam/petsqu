<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'product_name' => 'Seafood Makanan Kucing 500 g',  
                'product_description' => 'Makanan kucing anggora',
                'price' => 80000,
            ],
            [
                'product_name' => 'Seafood Makanan Kucing 1.2 kg',  
                'product_description' => 'Makanan kucing anggora',
                'price' => 45000,
            ],
            [
                'product_name' => 'Seafood Makanan Kucing 2 kg',  
                'product_description' => 'Makanan kucing anggora',
                'price' => 20000,
            ],
            [
                'product_name' => 'Seafood Makanan Kucing 5 kg',  
                'product_description' => 'Makanan kucing anggora',
                'price' => 140000,
            ]
        ]
    );
    }
}
