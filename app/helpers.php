<?php
use App\Models\Review;
use App\Models\User;

if (!function_exists('averageRatingForBook')) {
    function averageRatingForBook($bookId)
    {
        return Review::where('book_id', $bookId)->avg('rating');
    }
}

if (!function_exists('CountOfReviewsForBook')) {
    function CountOfReviewsForBook($bookId)
    {
        return Review::where('book_id', $bookId)->count();
    }
}

if (!function_exists('ReviewsForBook')) {
    function ReviewsForBook($bookId)
    {
        return Review::where('book_id', $bookId)->get();
    }
}

if (!function_exists('EmailOfUser')) {
    function EmailOfUser($user_id)
    {
        return User::find($user_id)->email;
    }
}