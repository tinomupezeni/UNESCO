<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\View\View;

class ProgrammeController extends Controller
{
    public function index(): View
    {
        $programmes = Programme::latest()->get();

        return view('programmes.index', compact('programmes'));
    }

    public function show(string $slug): View
    {
        $programme = Programme::where('slug', $slug)->firstOrFail();

        // Fetch latest 3 published articles (news/stories) related/general
        $relatedNews = \App\Models\Article::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('programmes.show', compact('programme', 'relatedNews'));
    }
}
