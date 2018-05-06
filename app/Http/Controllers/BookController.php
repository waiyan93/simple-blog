<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BookRequest;

use App\Book;

use App\Author;

use App\Publisher;

use Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
       if ($request->hasFile('cover_image'))
       {
            $image_name = snake_case($request->cover_image->getClientOriginalName());
            $request->cover_image->move('uploads', $image_name);
       }
        $author_id = Author::create(['name' => $request->author])->id;
        $publisher_id = Publisher::create(['name' => $request->publisher])->id;
        $book = Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'author_id' => $author_id,
            'publisher_id' => $publisher_id,
            'cover_image' => $image_name
        ]);

        Session::flash('success', 'The book was successfully saved!');
        return redirect()->route('books.show', $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
