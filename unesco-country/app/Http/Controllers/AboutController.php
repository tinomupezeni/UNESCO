<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Designation;
use App\Models\TeamMember;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $locale = app()->getLocale();

        $teamMembers = TeamMember::query()
            ->orderBy('name')
            ->get()
            ->map(fn ($member) => [
                'name' => $member->name,
                'title' => $member->getTranslation('title', $locale) ?? $member->getTranslation('title', 'en'),
                'bio' => $member->getTranslation('bio', $locale) ?? $member->getTranslation('bio', 'en'),
                'email' => $member->email,
                'social_links' => $member->social_links ?? [],
                'photo' => $member->getFirstMediaUrl('photo') ?: null,
            ]);

        $countries = Country::orderBy('name->' . $locale)->get()
            ->map(fn ($country) => [
                'name' => $country->getTranslation('name', $locale) ?? $country->getTranslation('name', 'en'),
                'code' => $country->code,
                'profile_url' => $country->profile_url,
            ]);

        $designations = Designation::with('country')->get();

        $designationCounts = [
            'world_heritage' => $designations->where('type', 'world_heritage')->count(),
            'biosphere_reserve' => $designations->where('type', 'biosphere_reserve')->count(),
            'creative_city' => $designations->where('type', 'creative_city')->count(),
            'intangible_heritage' => $designations->where('type', 'intangible_heritage')->count(),
        ];

        return view('about', compact('teamMembers', 'countries', 'designationCounts'));
    }
}
