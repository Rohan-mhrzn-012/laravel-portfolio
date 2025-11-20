<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CatVote;

class CatVoteController extends Controller
{
    // Fetch random cat images
    public function images()
    {
        $response = Http::withoutVerifying()->withHeaders([
            'x-api-key' => env('CAT_API_KEY') // put your API key in .env
        ])->get('https://api.thecatapi.com/v1/votes');

        return $response->json();
    }

    // Vote on a cat image
    public function vote(Request $request)
    {
        $request->validate([
            'image_id' => 'required|string',
            'value' => 'required|integer',
            'sub_id' => 'sometimes|string',
        ]);

        // Store locally
        $vote = CatVote::create([
            'image_id' => $request->image_id,
            'sub_id' => $request->sub_id ?? null,
            'value' => $request->value,
        ]);

        // Send vote to TheCatAPI
        $response = Http::withHeaders([
            'x-api-key' => env('CAT_API_KEY')
        ])->post('https://api.thecatapi.com/v1/votes', [
            'image_id' => $request->image_id,
            'sub_id' => $request->sub_id ?? null,
            'value' => $request->value,
        ]);

        return response()->json([
            'local_vote' => $vote,
            'api_response' => $response->json()
        ]);
    }

    // Get all votes from TheCatAPI
    public function getVotes()
    {
        $response = Http::withoutVerifying()->withHeaders([
            'x-api-key' => env('CAT_API_KEY')
        ])->get('https://api.thecatapi.com/v1/votes?limit=10&order=DESC');

        return $response->json();
    }
}
