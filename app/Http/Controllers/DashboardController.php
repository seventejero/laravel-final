<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $unpublishedPosts = Post::where('status', false)->count();
        $publishedPosts = Post::where('status', true)->count();

        return view('dashboard', compact('totalPosts', 'unpublishedPosts', 'publishedPosts'));
    }
}
