<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function about()
    {
        return view('about');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(ArticleRequest  $request)
    {
        $data = $request->validated();

        $article = new Article();
        $article->fill($data);
        $article->save();

        Session::flash('status', 'Статья успешно создана!');

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validate();

        $article->fill($data);
        $article->save();

        Session::flash('status', 'Статья успешно обновлена!');

        return redirect()
            ->route('articles.index');
    }

    public function destroy(int $id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }

        return redirect()->route('articles.index')->with('message', 'Статья удалена');
    }
}
