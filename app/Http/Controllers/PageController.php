<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.index', ['posts' => $posts]);
    }
}
