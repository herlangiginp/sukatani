<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersTable::class);
        \App\Models\User::factory(10)->create();
        \App\Models\category::factory(5)->create();
        \App\Models\product::factory(15)->create();
        // \App\Models\order::factory(15)->create();

   
    }
}
