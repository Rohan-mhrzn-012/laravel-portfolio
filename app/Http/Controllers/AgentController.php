<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AgentController extends Controller
{
    public function index()
    {
      $response = Http::withoutVerifying()->get('https://valorant-api.com/v1/agents');

        if ($response->successful()) {
            $agents = $response->json()['data']; 
            return view('agents', compact('agents'));
        }

        return response()->json(['error' => 'Failed to fetch agents'], 500);
    }
}
