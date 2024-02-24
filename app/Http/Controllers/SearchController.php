<?php

namespace App\Http\Controllers;

use App\Helpers\CoordsHelper;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function __construct(
        private CoordsHelper $coordsHelper
    ) {
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required',
        ]);

        if ($validator->fails()) {
            return view('partials.search.empty');
        }

        $books = Book::has('genres')
            ->whereHas('collections', function ($q) {
                $q->where('public', true);
            })
            ->where('title', 'like', '%' . $request->get('search') . '%')
            ->join('users as user', 'books.user_id', '=', 'user.id')
            ->where('user.id', '!=', auth()->user()->id)
            ->limit(50)
            ->get();

        $books = $books->sort(function ($a, $b) {
            return $this->coordsHelper->getDistanceInMeters(
                $a->user->latitude,
                $a->user->longitude,
                auth()->user()->latitude,
                auth()->user()->longitude
            ) - $this->coordsHelper->getDistanceInMeters(
                $b->user->latitude,
                $b->user->longitude,
                auth()->user()->latitude,
                auth()->user()->longitude
            );
        });

        return count($books) > 0
            ? view('partials.search.books', ['books' => $books->take(25)])
            : view('partials.search.empty');
    }
}
