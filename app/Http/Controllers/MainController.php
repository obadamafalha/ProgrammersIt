<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = [];

        if (isset($request->search)) {
            $data = Http::get('https://www.googleapis.com/books/v1/volumes', [
                'q' => $request->search
            ]);
            $books =  json_decode($data->getBody(), true);
        }
        return view('user.dashboard', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($book_id)
    {
        $data = Http::get('https://www.googleapis.com/books/v1/volumes/' . $book_id);
        $book =  json_decode($data->getBody(), true);
        $reviews = ReviewsForBook($book_id);
        
        return view('user.detail', ['book' => $book,'reviews'=>$reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
