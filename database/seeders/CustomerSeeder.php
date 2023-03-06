<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        DB::table('customers')->insert([
            [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@email.com',
            'password' => 'password',
            'phone' => '1234567890',
            'address' => '123 Main St, Anytown, USA',
            ],
            [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'janedoe@email.com',
            'password' => 'password',
            'phone' => '0987654321',
            'address' => '123 Main St, Anytown, USA',
            ]
        ]);

    }
}
