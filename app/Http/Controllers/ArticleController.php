<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $article = new Article();
        $article->fill($data);
        $article->save();

        Session::flash('status', 'Статья успешно создана!');

        return redirect()->route('articles.index');
    }

    public function show(string $article)
    {
        $article = Article::findOrFail($article);
        return view('article.show', compact('article'));
    }

    public function edit(string $article)
    {
        $article = Article::findOrFail($article);
        return view('article.edit', compact('article'));
    }

    public function update(ArticleRequest $request, string $article)
    {

        $article = Article::findOrFail($article);
        
        $data = $request->validated();
        $article->fill($data);

        Session::flash('status', 'Статья успешно обновлена');

        return redirect()->route('articles.index');
    }


    public function destroy(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
        }

        Session::flash('status', 'Статья успешно удалена!');

        return redirect()->route('articles.index');
    }

    public function about()
    {
        return view('about');
    }
}
