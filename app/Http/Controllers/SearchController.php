<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class SearchController
{
    public function __invoke(Request $request)
    {
        $term = $request->input('term');

        $results = Book::query()
            ->withCount('comments')
            ->when($term, fn ($query) => $query->where('title', 'like', "%{$term}%"))
            ->paginate(10);

        $results = Post::query()
            ->withCount('comments')
            ->when($term, fn ($query) => $query->where('title', 'like', "%{$term}%"))
            ->paginate(10);

        $results = Video::query()
            ->withCount('comments')
            ->when($term, fn ($query) => $query->where('name', 'like', "%{$term}%"))
            ->paginate(10);

        return view('search', [
            'results' => $results,
            'term'    => $term,
        ]);
    }
}
