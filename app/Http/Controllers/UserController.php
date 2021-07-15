<?php

namespace App\Http\Controllers;

use App\User;
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

  public function likes(string $name)
  {
    $user = User::where('name', $name)->first();

    $articles = $user->articles->sortByDesc('created_at');

    return view('users.likes', [
      'user' => $user,
      'articles' => $articles,
    ]);
  }

  public function edit(string $name)
  {
    $user = User::where('name', $name)->first();

    return view('users.edit', ['user' => $user]);
  }

  public function update(Request $request, User $user)
  {
    $user->fill($request->all())->save();
    #$user->name = $request->name;
    #$user->introduction = $request->introduction;
    #$user->save;

    return redirect()->route('articles.index');
  }
}
