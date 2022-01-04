<?php

use App\Models\Post;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('generate:feed', function () {
    $this->info('Generating RSS feed');

    $posts = Post::where('status', true)->latest()->limit(50)->get();

    $site = [
        'name' => 'Blog | Amar Ghandour',
        'description' => 'The personal website for Amar Ghandour, a software developer.',
        'url' => asset('storage/rss.xml'),
        'language' => 'YOUR SITE LANGUAGE', // eg. en, en-IN, jp
        'lastBuildDate' => $posts[0]->created_at->format(DateTime::RSS)
    ];

    $rssFeedContents = view('rss.feed', [
        'posts' => $posts,
        'site' => $site
    ]);
    \Illuminate\Support\Facades\Storage::disk('public')->put('rss.xml', $rssFeedContents);

    $this->info('Completed');
});
