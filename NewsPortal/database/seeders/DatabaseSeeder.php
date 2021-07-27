<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
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
         User::create([
             'name'=>'hanan',
             'password'=>'hi123123',
             'email'=>'hi@example.com'
         ]);
        Category::create([
            'name'=>'World',
        ]);
        Category::create([
        'name'=>'Health',
        ]);
        Category::create([
        'name'=>'Politics',
        ]);
        Category::create([
            'name'=>'Business',
        ]);
        Category::create([
            'name'=>'Entertainment',
        ]);
        Category::create([
            'name'=>'Tech',
        ]);
        Category::create([
            'name'=>'Style',
        ]);
        Category::create([
            'name'=>'Travel',
        ]);
        Category::create([
            'name'=>'Sports',
        ]);
        Category::create([
            'name'=>'Weather',
        ]);
        Category::create([
            'name'=>'Others',
        ]);
    }
}
