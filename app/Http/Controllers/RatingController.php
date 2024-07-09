<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function getReview()
    {
        $ratings = Rating::orderBy('created_at', 'desc')->take(5)->get();

        return response()->json(['status' => true, 'ratings' => $ratings], 200);
    }
    public function submitReview(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'review' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'product_id' => 'nullable|integer',
            'vendor_id' => 'required|exists:vendors,id',
        ]);

        try {
            Rating::create($validatedData);
            return response()->json(['success' => true, 'message' => 'Rating added successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
