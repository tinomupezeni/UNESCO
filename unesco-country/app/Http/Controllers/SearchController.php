<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Programme;
use App\Models\Event;
use App\Models\Publication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q', '');

        $articles = collect();
        $programmes = collect();
        $events = collect();
        $publications = collect();

        if (strlen($query) >= 2) {
            $articles = Article::search($query)->take(5)->get()
                ->filter(fn ($a) => $a->status === 'published');
            $programmes = Programme::search($query)->take(5)->get()
                ->filter(fn ($p) => $p->status === 'active');
            $events = Event::search($query)->take(5)->get()
                ->filter(fn ($e) => $e->status === 'published');
            $publications = Publication::search($query)->take(5)->get();
        }

        $results = $articles->concat($programmes)->concat($events)->concat($publications);

        return view('search', [
            'query' => $query,
            'articles' => $articles,
            'programmes' => $programmes,
            'events' => $events,
            'publications' => $publications,
            'totalResults' => $results->count(),
        ]);
    }
}
