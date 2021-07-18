<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Route;

class CommentController extends Controller
{
  public function store(Request $request, Comment $comment, string $article)
  {
    $comment->body = $request->body;
#    $comment->image = $request->image;
    $comment->user_id = $request->user()->id;
    $comment->article_id = $request->article()->id;
    $comment->save();

    return redirect()->route('articles.index');
  }

}
