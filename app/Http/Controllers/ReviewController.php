<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create($book_id)
    {
        return view('user.review.create', ['book_id' => $book_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'review' => 'required|min:5',
            'rating' => 'required|min:1|max:5|integer',
            'book_id' => 'required',
            'user_id' => 'required'
        ]);

        Review::create($data);

        return redirect()->route('detail', ['book_id' => $request->book_id])
            ->with('success', 'Review added successfully!');
    }
}
