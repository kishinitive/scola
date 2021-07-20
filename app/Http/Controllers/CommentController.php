<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use Illuminate\Support\Facades\Route;

class CommentController extends Controller
{
  public function store(Request $request, Article $article, Comment $comment)
  {
    $comment->body = $request->body;
    $comment->user_id = $request->user()->id;
    $comment->article_id = $article->id;

    $image = $request->file('image');
    if($request->hasfile('image')){
      $path = $image->store('', 'public');
    } else {
      $path = null;
    }
    $comment->image = is_null($path)? null : $path;

    $comment->save();

    return redirect()->route('articles.index');
  }

}
