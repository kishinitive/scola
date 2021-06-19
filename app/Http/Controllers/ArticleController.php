<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
  public function index()
  {
    $articles = [
      (object) [
        'id' => 1,
        'title' => 'タイトル',
        'body' => '本文1',
        'created_at' => now(),
        'user' => (object) [
          'id' => 1,
          'name' => 'ユーザー名1',
        ],
      ],
      (object) [
        'id' => 2,
        'title' => 'タイトル2',
        'body' => '本文2',
        'created_at' =>now(),
        'user' => (object) [
          'id' => 2,
          'name' => 'ユーザー名2',
        ],
      ],
      (object) [
        'id' => 3,
        'title' => 'タイトル3',
        'body' => '本文3',
        'created_at' => now(),
        'user' => (object) [
          'id' => 3,
          'name' => 'ユーザー名3'
        ],
      ],
            (object) [
        'id' => 4,
        'title' => 'タイトル4',
        'body' => '本文4',
        'created_at' => now(),
        'user' => (object) [
          'id' => 4,
          'name' => 'ユーザー名4',
        ],
      ],
      (object) [
        'id' => 5,
        'title' => 'タイトル5',
        'body' => '本文5',
        'created_at' =>now(),
        'user' => (object) [
          'id' => 5,
          'name' => 'ユーザー名5',
        ],
      ],
    ];

    return view('articles.index', ['articles' => $articles]);
  }
}
