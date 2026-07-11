<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\View\View;

class PublicationController extends Controller
{
    public function index(): View
    {
        $publications = Publication::latest('publication_date')->get();

        return view('publications.index', compact('publications'));
    }

    public function show(string $slug): View
    {
        $publication = Publication::where('slug', $slug)->firstOrFail();

        return view('publications.show', compact('publication'));
    }
}
