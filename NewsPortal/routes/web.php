<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
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
    return view('Dashboard.dashboard-articles')->with('articles', Article::all());
})->middleware(['auth']);

Route::get('/dashboard/inbox', [DashboardController::class, 'inbox'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

Route::get('categories/{category}',function (Category $category){
    return view('articles.index')
        ->with('articles',$category->articles)
        ->with('categories', Category::all());
});
require __DIR__.'/auth.php';

Route::resource('articles', ArticlesController::class);
Route::post('articles/store', [ArticlesController::class,'store']);

Route::get('contact/create', function(){
    return view('contact.create');
});
Route::post('contact/store', [ContactController::class,'store']);
Route::get('contact/', function(){
    return Message::latest();
});
Route::get('about/', function(){
    return view('about');
});

Route::post('comments/store/{id}', [CommentsController::class, 'store']);
Route::put('comments/toggleVisibility/{id}', [CommentsController::class, 'toggleVisibility']);
Route::get('dashboard/comments', [CommentsController::class, 'index'])->middleware(['auth']);

Route::delete('comments/{comment}', [CommentsController::class, 'destroy'])->middleware(['auth']);
Route::put('comments/{comment}', [CommentsController::class, 'update'])->middleware(['auth']);
