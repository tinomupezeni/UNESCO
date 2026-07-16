<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\View\View;

class PublicationController extends Controller
{
    public function index(): View
    {
        $query = Publication::latest('publication_date');

        // Search support
        if ($search = request()->query('search')) {
            $query->where(function($q) use ($search) {
                // Since Spatie Translatable stores JSON, we can do a JSON search or like search on title
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($category = request()->query('category')) {
            if (in_array($category, ['report', 'newsletter', 'handbook', 'policy'])) {
                $query->where('category', $category);
            }
        }

        $publications = $query->paginate(12)->withQueryString();

        return view('publications.index', compact('publications'));
    }

    public function show(string $slug): View
    {
        $publication = Publication::where('slug', $slug)->firstOrFail();

        // Fetch other publications as related
        $relatedPublications = Publication::where('id', '!=', $publication->id)
            ->latest('publication_date')
            ->limit(3)
            ->get();

        return view('publications.show', compact('publication', 'relatedPublications'));
    }
}
