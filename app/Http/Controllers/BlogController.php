<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class BlogController extends Controller
{
    public function single($slug)
    {
        //select data from database
        $post = Post::where('slug', '=', $slug)->first();
        //return the view with the retrieved data
        return view('blog.single', ['post' => $post]);
    }
}
