<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
             'password'=>Hash::make('hi123123'),
             'email'=>'hi@example.com'
         ]);
        $categories = [
            ['name'=>'World'],
            ['name'=>'Health'],
            ['name'=>'Politics'],
            ['name'=>'Business'],
            ['name'=>'Entertainment'],
            ['name'=>'Tech'],
            ['name'=>'Style'],
            ['name'=>'Travel'],
            ['name'=>'Sports'],
            ['name'=>'Weather'],
            ['name'=>'Others']
        ];
        Category::insert($categories);
        Article::factory(30)->create();
        Comment::factory(15)->create();
        Message::factory(5)->create();

    }
}
