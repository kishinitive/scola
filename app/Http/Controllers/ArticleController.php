<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Comment;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

  public function __construct()
  {
    $this->authorizeResource(Article::class,'article');
  }

  public function index(Request $request)
  {
    $queryText = $request->queryText;

    $query = Article::query();

    if($queryText !== null)
      $query->where('title', 'LIKE', "%$queryText%")
        ->orWhere('body', 'LIKE', "%$queryText%") ;

    $articles = $query->get()->sortByDesc('created_at')->paginate(5);

    return view('articles.index', ['articles' => $articles]);
  }

  public function create()
  {
    $allTagNames = Tag::all()->map(function ($tag) {
      return ['text' => $tag->name];
    });
    return view('articles.create',[
      'allTagNames' => $allTagNames,
    ]);
  }

  public function store(ArticleRequest $request, Article $article)
  {
    $article->fill($request->all());
    $article->user_id = $request->user()->id;
    $image = $request->file('image');
    if($request->hasfile('image')){
      $path = Storage::disk('s3')->putFile('/', $image, 'public');
    }else{
      $path = null;
    }
    if (is_null($path)){
      $article->image = null;
    }else{
      $article->image = Storage::disk('s3')->url($path);
    }
    $article->save();

    $request->tags->each(function ($tagName) use ($article) {
      $tag = Tag::firstOrCreate(['name' => $tagName]);
      $article->tags()->attach($tag);
    });
    return redirect()->route('articles.index');


/*    $article->fill($request->all());
    //$requestに入っているデータを新規articleインスタンスに入れる
    $article->user_id = $request->user()->id;
    //$requestからuser情報を取り出しそのidをarticleインスタンスに入れる
    $image = $request->file('image');
    //変数$imageにアップロードした画像データを入れる
    if($request->hasfile('image')){
      //もし$requestにimage(画像データ)が入っていたら
      $path = $image->store('', 'public');
      //変数$pathに
    }else{
      $path = null;
    }
    $article->image = is_null($path)? null : $path;
    $article->save();

    $request->tags->each(function ($tagName) use ($article) {
      $tag = Tag::firstOrCreate(['name' => $tagName]);
      $article->tags()->attach($tag);
    });
    return redirect()->route('articles.index');
*/
  }

  public function edit(Article $article)
  {
    $tagNames = $article->tags->map(function ($tag) {
      return['text' => $tag->name];
    });
    $allTagNames = Tag::all()->map(function ($tag) {
      return ['text' => $tag->name];
    });
    return view('articles.edit', [
      'article' => $article,
      'tagNames' => $tagNames,
      'allTagNames' => $allTagNames,
    ]);
  }

  public function update(ArticleRequest $request, Article $article)
  {
    $article->fill($request->all())->save();
    $article->tags()->detach();
    $request->tags->each(function ($tagName) use ($article) {
      $tag = Tag::firstOrCreate(['name' => $tagName]);
      $article->tags()->attach($tag);
    });
    return redirect()->route('articles.index');
  }

  public function destroy(Article $article)
  {
    $article->delete();
    return redirect()->route('articles.index');
  }

  public function show(Article $article)
  {
    $comments = $article->comments->sortBy('created_at');

    return view('articles.show',['article' => $article, 'comments' => $comments]);
  }

  public function like(Request $request, Article $article)
  {
      $article->likes()->detach($request->user()->id);
      $article->likes()->attach($request->user()->id);

      return [
          'id' => $article->id,
          'countLikes' => $article->count_likes,
      ];
  }

  public function unlike(Request $request, Article $article)
  {
      $article->likes()->detach($request->user()->id);

      return [
          'id' => $article->id,
          'countLikes' => $article->count_likes,
      ];
  }

  public function getresolved(Article $article)
  {
    $article->status = '解決済';
    $article->save();
    return redirect()->route('articles.index');
  }

  public function unsolved()
  {
    $query = Article::where('status', '未解決');
    $articles = $query->get()->sortByDesc('created')->paginate(5);
    return view('articles.unsolved', ['articles' => $articles]);
  }

  public function resolved()
  {
    $query = Article::where('status', '解決済');
    $articles = $query->get()->sortByDesc('created')->paginate(5);
    return view('articles.resolved', ['articles' => $articles]);
  }


}
