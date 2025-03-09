<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RedditController extends Controller
{
    public function index()
    {
        // Define the subreddit URL
        $subredditUrl = 'https://www.reddit.com/r/technology/new.json'; // You can replace 'technology' with any subreddit you want

        // Send GET request to Reddit API
        $response = Http::get($subredditUrl);

        // Check if the response is successful
        if ($response->successful()) {
            // Get posts data from the response
            $posts = $response->json()['data']['children'];
        } else {
            // Handle the error if the API request fails
            $posts = [];
        }

        // Return the view with the posts data
        return view('reddit.index', compact('posts'));
    }
}
