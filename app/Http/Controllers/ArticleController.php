<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $articles = Article::with(['user']);

        return view('artikelList', [
            'articles' => $articles->paginate(6)->withQueryString()
        ]);
    }

    public function show(Request $request)
    {
        $id = $request->get('id');
        $article = Article::with(['user'])->find($id);

        $totalArticle = Article::get('id')->count();

        $otherArticles = Article::where('id', '!=', $id)->get()->shuffle()->take(6);

        return view('artikelDetail', [
            'article' => $article,
            'otherArticles' => $otherArticles
        ]);
    }
}
