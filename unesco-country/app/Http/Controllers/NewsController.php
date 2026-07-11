<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $articles = Article::published()
            ->latest('published_at')
            ->get();

        return view('news.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        $article = Article::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('news.show', compact('article'));
    }
}
