<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();
        if(request('search')){
            $articles = Article::where('title', 'LIKE', '%'.\request('search').'%')
                ->orWhere('content', 'like','%'.request('search').'%') ->get();
        }
        return view("articles.index")->with('articles', $articles)->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'category'=> 'required',
            'author'=> 'required',
            'content'=> 'required'
        ]);
        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author_name = $request->input('author');
        $article->cover_img = $request->input('cover_img');
        $article->category_id = $request->input('category');
        $article->user_id = Auth::id();
        if(!$request->input('cover_img')){
            $article->cover_img = 'https://i.ibb.co/PQcZ3sm/Screen-Shot-1442-12-12-at-2-34-01-PM.png';
        }
        $article->save();
        return redirect('/dashboard')->with('success','Article created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article)
            ->with('relatedArticles', Article::where('category_id',$article->category->id)->paginate(3))
            ->with('categories', Category::all())
            ->with('comments', $article->comments->where('isApproved', true));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('articles.edit')->with('article',Article::find($id))->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'category'=> 'required',
            'author'=> 'required',
            'content'=> 'required'
        ]);

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author_name = $request->input('author');
        $article->cover_img = $request->input('cover_img');
        $article->category_id = $request->input('category');
        if(!$request->input('cover_img')){
        $article->cover_img = 'https://i.ibb.co/PQcZ3sm/Screen-Shot-1442-12-12-at-2-34-01-PM.png';
        }
        $article->save();
        return redirect('/dashboard')->with('success','Article updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('/dashboard')->with('success','Article removed');
    }
}
