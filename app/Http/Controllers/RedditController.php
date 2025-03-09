<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class RedditController extends Controller
{
    public function index()
    {
        // Define the subreddit URL
        $subredditUrl = 'https://www.reddit.com/r/technology/new.json'; 

        // Send GET request with custom headers
        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
        ])->get($subredditUrl);

        // Check if the response is successful
        if ($response->successful()) {
            $posts = $response->json()['data']['children'];
        } else {
            $posts = []; // Handle errors
        }

        return view('reddit.index', compact('posts'));
    }
}
