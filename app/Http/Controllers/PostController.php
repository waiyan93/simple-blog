<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog post in it
        $posts = Post::orderBy('id','desc')->paginate(5);
        //return view and pass the data in the above variable
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required'
        ));
        //store the data
        $post_id = Post::create($request->all())->id;
        //ouput a message
        Session::flash('success', 'The blog post was successfully save!');
        //redirect to another page
        return redirect()->route('posts.show', $post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post and save in a variable
        $post = Post::findOrFail($id);
        //return  the view and pass the data into the variable
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the request data
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        //save the data into database
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        //set flash data with success message
        Session::flash('success', 'This post was successfully updated.');
        //redirect with flash data to show page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
