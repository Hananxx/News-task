<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
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
        //articles last 7 days
        $days = ['23','24','25','26','27', '28'];
        $NumberOfarticles = [];
        foreach ($days as $key => $value) {
            $NumberOfarticles[] = Article::where(\DB::raw("DATE_FORMAT(created_at, '%d')"),$value)->count();
        }
        $flags = [true, false];
        $commentsFlagCount = [];
        foreach ($flags as $key => $value) {
            $commentsFlagCount[] = Comment::where('isHidden',$value)->count();
        }
        return view('Dashboard.dashboard')
            ->with('categoryID',json_encode($categoryID,JSON_NUMERIC_CHECK))
            ->with('articles',json_encode($articles,JSON_NUMERIC_CHECK))
            ->with('NumberOfarticles',json_encode($NumberOfarticles,JSON_NUMERIC_CHECK))
            ->with('categories',Category::all())
            ->with('articlesCount', Article::all()->count())
            ->with('commentChartData', json_encode($commentsFlagCount,JSON_NUMERIC_CHECK));
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
