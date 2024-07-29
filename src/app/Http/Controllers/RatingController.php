<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function store(RatingRequest $request)
    {
        dd($request);
        $rating = $request->input('rating');
        $reviewData = [
            'rating' => $rating,
        ];
        Rating::create($reviewData);

        return redirect()->route('test');
    }
}
