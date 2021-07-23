<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function show(string $name)
  {
    $user = User::where('name',$name)->first();

    $articles = $user->articles->sortByDesc('created_at');

    return view('users.show',[
      'user' => $user,
      'articles' => $articles,
    ]);
  }

  public function comments(string $name)
  {
    $user = User::where('name', $name)->first();

    $comment = $user->comments->pluck('article_id')->unique();

    $articles = Article::find($comment);

    return view('users.comments', [
      'user' => $user,
      'articles' => $articles,
    ]);


    #$user = User::where('name', $name)->first();

    #$articles = $user->articles->sortByDesc('created_at');

    #return view('users.likes', [
    #  'user' => $user,
    #  'articles' => $articles,
    #]);


  }

  public function edit(string $name)
  {
    $user = User::where('name', $name)->first();

    return view('users.edit', ['user' => $user]);
  }

  public function update(Request $request, User $user, string $name)
  {
    $user = User::where('name',$name)->first();
    $user->fill($request->all())->save();

    return redirect()->route('users.show', ['name' => $name,]);
  }
}
