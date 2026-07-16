<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    // Show all published articles
    public function index()
    {
        $articles = Article::published()
                          ->orderBy('published_at', 'desc')
                          ->paginate(12);
        
        $featuredArticles = Article::published()
                                  ->where('is_featured', true)
                                  ->limit(3)
                                  ->get();
        
        return view('website.articles.index', compact('articles', 'featuredArticles'));
    }

    // Show single article
    public function show($slug)
    {
        $article = Article::published()
                         ->where('slug', $slug)
                         ->firstOrFail();
        
        // Get related articles (same category)
        $relatedArticles = Article::published()
                                 ->where('category', $article->category)
                                 ->where('id', '!=', $article->id)
                                 ->limit(3)
                                 ->get();
        
        return view('website.articles.show', compact('article', 'relatedArticles'));
    }

    // Filter by category
    public function category($category)
    {
        $articles = Article::published()
                          ->where('category', $category)
                          ->orderBy('published_at', 'desc')
                          ->paginate(12);
        
        return view('website.articles.category', compact('articles', 'category'));
    }
}