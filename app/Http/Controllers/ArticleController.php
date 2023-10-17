<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();

        Session::flash('status', 'Статья успешно создана!');

        return redirect()->route('articles.index');
    }
}
