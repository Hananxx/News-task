<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use \App\Models\Article;
use \App\Models\Category;
use \App\Http\Controllers\DashboardController;
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

Route::get('/dashboard/inbox', [DashboardController::class, 'inbox'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

Route::get('categories/{id}',function (Category $category){
    return Article::where('category_id',$category->id)->get();
});
require __DIR__.'/auth.php';

Route::resource('articles', ArticlesController::class);
Route::post('articles/store', [ArticlesController::class,'store']);

Route::get('contact/create', function(){
    return view('contact.create');
});
Route::post('contact/store', [ContactController::class,'store']);
Route::get('contact/', function(){
    return Message::all();
});
Route::get('about/', function(){
    return view('about');
});
