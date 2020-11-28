<?php
namespace App\Http\Controllers;

use App\Movie;
use App\MovieComment;


use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment =new MovieComment();
        // $comment = new Comment();

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $movie = Movie::find($request->movie_id);

        $movie->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new MovieComment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');
        // dd($reply->parent_id);

        $movie = Movie::find($request->get('movie_id'));

        $movie->comments()->save($reply);

        return back();

    }
}
