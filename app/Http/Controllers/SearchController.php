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

        $user = auth()->user();

        $books = Book::where('title', 'like', '%' . $request->get('search') . '%')
            ->whereHas('collections', fn ($q) => $q->where('public', true))
            ->with('genres')
            ->join('users as user', 'books.user_id', '=', 'user.id')
            ->where('user.id', '!=', $user->id)
            ->limit(50)
            ->get();

        $books = $books->sort(function ($a, $b) use ($user) {
            return $this->coordsHelper->getDistanceInMeters(
                $a->latitude,
                $a->longitude,
                $user->latitude,
                $user->longitude
            ) - $this->coordsHelper->getDistanceInMeters(
                $b->latitude,
                $b->longitude,
                $user->latitude,
                $user->longitude
            );
        });

        return count($books) > 0
            ? view('partials.search.books', ['books' => $books->take(25)])
            : view('partials.search.empty');
    }
}
