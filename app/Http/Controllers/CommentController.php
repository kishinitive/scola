<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
  public function store(Request $request, Article $article, Comment $comment)
  {
    $comment->body = $request->body;
    $comment->user_id = $request->user()->id;
    $comment->article_id = $article->id;

    $image = $request->file('image');
    if($request->hasfile('image')){
      $path = Storage::disk('s3')->putFile('/', $image, 'public');
    } else {
      $path = null;
    }

    $comment->image = is_null($path)? null : Storage::disk('s3')->url($path);

    $comment->save();

    return redirect()->route('articles.index');
  }

}
