<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use \App\Models\Article;
use \App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')->with('articles', Article::latest()->paginate(10))
        ->with('categories', Category::all());
});

Route::get('/dashboard/articles', function (){
    return view('dashboard-articles')->with('articles', Article::all());
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('articles', ArticlesController::class);
Route::post('articles/store', [ArticlesController::class,'store']);
