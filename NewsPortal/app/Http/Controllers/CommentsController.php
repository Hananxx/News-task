<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index()
    {
        return view("dashboard.dashboard-comments")->with('comments', Comment::all()->where('isApproved', false));
    }
    //store
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'sender_name'=> 'required',
            'content'=> 'required'
        ]);
        $comment = new Comment();
        $comment->sender_name = $request->input('sender_name');
        $comment->content = $request->input('content');
        $comment->article_id = $id;
        $comment->save();
        return redirect()->action('App\Http\Controllers\ArticlesController@show', [Article::find($id)])
            ->with('success','Comment sent');
    }
    //update
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->isApproved = true;
        $comment->save();
        return redirect('/dashboard/comments')->with('success','Comment Approved');
    }
    //destroy
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->with('success','Comment removed');
    }
}
