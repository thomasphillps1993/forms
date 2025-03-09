<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class RedditController extends Controller
{
    public function index()
    {
        // Reddit API credentials
        $clientId = 'HJh0DqgJHR8QUtRWEDy3Iw';
        $clientSecret = 'QjOirpGRby9LldXubxBO-qTXIEqzdg';
    
        // Get access token
        $tokenResponse = Http::asForm()->withHeaders([
            'User-Agent' => 'MyLaravelRedditApp/1.0'
        ])->withBasicAuth($clientId, $clientSecret)
          ->post('https://www.reddit.com/api/v1/access_token', [
              'grant_type' => 'client_credentials',
          ]);
    
        if (!$tokenResponse->successful()) {
            return response()->json(['error' => 'Failed to authenticate'], 500);
        }
    
        $accessToken = $tokenResponse->json()['access_token'];
    
        // Fetch subreddit posts with authentication
        $response = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
            'User-Agent' => 'MyLaravelRedditApp/1.0'
        ])->get('https://oauth.reddit.com/r/technology/new');
    
        if ($response->successful()) {
            $posts = $response->json()['data']['children'];
        } else {
            $posts = [];
        }
    
        return view('reddit.index', compact('posts'));
    }
}
    