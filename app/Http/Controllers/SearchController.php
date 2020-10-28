<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController
{
    public function __invoke(Request $request)
    {
        $term = $request->query('term');

        $results = Search::add(Video::published()->withCount('comments'), 'name', 'published_at')
            ->add(Post::published()->withCount('comments'), 'title', 'published_at')
            ->add(Book::withCount('comments'), ['title', 'description'], 'released_at')
            ->orderByDesc()
            ->paginate(10)
            ->startWithWildcard()
            ->get($term);

        return view('search', [
            'results' => $results,
            'term'    => $term,
        ]);
    }
}
