<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Programme;
use App\Models\Publication;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // 1. Fetch latest 3 published articles (news, stories, press releases)
        $latestArticles = Article::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        // 2. Fetch latest 4 active programmes
        $programmes = Programme::active()
            ->latest()
            ->limit(4)
            ->get();

        // 3. Fetch latest 3 publications
        $latestPublications = Publication::latest('publication_date')
            ->limit(3)
            ->get();

        return view('home', compact('latestArticles', 'programmes', 'latestPublications'));
    }
}
