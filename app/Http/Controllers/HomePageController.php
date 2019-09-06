<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where('status', 'published')->paginate(10);
        return view('welcome', compact('posts'));
    }

    public function show(Request $request, Post $post)
    {
        return view('details', compact('post'));
    }
}
