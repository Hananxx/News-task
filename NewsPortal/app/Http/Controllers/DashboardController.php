<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Message;
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
        //articles last week
        $days = ['22','23','24','25','26','27'];

        $NumberOfarticles = [];
        foreach ($days as $key => $value) {
            $NumberOfarticles[] = Article::where(\DB::raw("DATE_FORMAT(created_at, '%d')"),$value)->count();
        }
        return view('Dashboard.dashboard')
            ->with('categoryID',json_encode($categoryID,JSON_NUMERIC_CHECK))
            ->with('articles',json_encode($articles,JSON_NUMERIC_CHECK))
            ->with('NumberOfarticles',json_encode($NumberOfarticles,JSON_NUMERIC_CHECK))
            ->with('days',json_encode($days,JSON_NUMERIC_CHECK))
            ->with('categories',Category::all())
            ->with('articlesCount', Article::all()->count());
    }
    public function inbox()
    {
        return view('Dashboard.dashboard-inbox')->with('messages', Message::all());
    }
    public function comments()
    {
        return view('Dashboard.dashboard-comments')->with('articles', Article::all());
    }
}
