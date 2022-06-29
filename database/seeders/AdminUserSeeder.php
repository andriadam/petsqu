<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => '$2y$10$mMXF38XVGYmmFCnp2mhejuBaPHuwjyPk1pNw3KaL2F0MqQ.OsIvYm', // 'password'
            'name' => 'admin',
            'address' => 'JL. Kenangan',
            'phone' => '089602748612',
            'role' => 'admin'
            // 'email' => 'admin@gmail.com',
            // 'email_verified_at' => date('Y-m-d H:i:s', time()),
        ]);
        User::create([
            'username' => 'user',
            'password' => '$2y$10$m6spNcop7OJXM7VaXwQsQerIDDt/UwjyL58nMIRIHg1IBgu7IOmI6', // 'password'
            'name' => 'user',
            'address' => 'JL. Kenangan',
            'phone' => '089602748612',
            'role' => 'user'
            // 'email' => 'user@gmail.com',
            // 'email_verified_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}
