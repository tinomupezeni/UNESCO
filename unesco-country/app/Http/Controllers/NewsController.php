<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $query = Article::published()->latest('published_at');

        // Optional category filtering
        if ($category = request()->query('category')) {
            if (in_array($category, ['news', 'story', 'press_release'])) {
                $query->where('category', $category);
            }
        }

        // Paginate results (12 per page)
        $articles = $query->paginate(12)->withQueryString();

        return view('news.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        // Fetch article by slug
        $article = Article::published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Fetch up to 3 related articles in the same category (excluding this one)
        $relatedArticles = Article::published()
            ->where('category', $article->category)
            ->where('id', '!=', $article->id)
            ->limit(3)
            ->get();

        return view('news.show', compact('article', 'relatedArticles'));
    }
}
