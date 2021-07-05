<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request, Comment $comment)
  {
    $comment->body = $request->body;
    $comment->image = $request->image;
    $comment->user_id = $request->user()->id;
    $comment->article_id = $request->article()->id;
    $article->save();

    return redirect()->route('articles/{article_id}');
}
