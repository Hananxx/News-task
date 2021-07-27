<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
         \App\Models\User::create([
             'name'=>'hanan',
             'password'=>'hi123123',
             'email'=>'hi@example.com'
         ]);
        \App\Models\Category::create([
            'name'=>'Tech',
        ]);
        \App\Models\Category::create([
        'name'=>'Health',
        ]);
        \App\Models\Category::create([
        'name'=>'Politics',
        ]);
        \App\Models\Category::create([
            'name'=>'Arts',
        ]);
        \App\Models\Category::create([
            'name'=>'Fashion',
        ]);
        \App\Models\Category::create([
            'name'=>'Sports',
        ]);
    }
}
