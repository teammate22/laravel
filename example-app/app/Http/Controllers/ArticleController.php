<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->latest()
            ->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::published()->findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
