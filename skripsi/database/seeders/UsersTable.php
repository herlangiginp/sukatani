<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;


class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'no_hp' => '0123456789012',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],

             [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'no_hp' => '0123456789013',
                'password' => Hash::make('12345678'),
                'role' => 'user',
             ]
        
             ]);
    }
}
