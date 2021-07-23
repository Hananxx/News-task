<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = new Category;
        $categoryID = [];
        for ($i = 0; $i < $category->count(); $i++) {
            $categoryID[] = $category->get('id')[$i]->id;
        }
        $articles = [];
        foreach ($categoryID as $key => $value) {
            $articles[] = Article::where('category_id',$value)->count();
        }
        return view('dashboard')
            ->with('categoryID',json_encode($categoryID,JSON_NUMERIC_CHECK))
            ->with('articles',json_encode($articles,JSON_NUMERIC_CHECK))
            ->with('categories',Category::all())
            ->with('articlesCount', Article::all()->count());
    }
}
