<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BookRequest;

use App\Book;

use App\Author;

use App\Publisher;

use Session;

use Carbon\Carbon;

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
            $image_name = $this->renameFile();
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
        $book = Book::findOrFail($id);
        $author = $book->author->name;
        $publisher = $book->publisher->name;
        return view('book.edit', ['book' => $book, 'author' => $author, 'publisher' => $publisher]);
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
        $book = Book::findOrFail($id);

        $author_id = $book->author->id;
        $author = Author::findOrFail($author_id);
        $author->update(['name' => $request->author]);

        $publisher_id = $book->publisher->id;
        $publisher = Publisher::findOrFail($publisher_id);
        $publisher->update(['name' => $request->publisher]);

        if ($request->hasFile('cover_image'))
        {
            $image_name = $this->renameFile();
            $request->cover_image->move('uploads', $image_name);
            $book->update([
                'title' => $request->title,
                'price' => $request->price,
                'cover_image' => $image_name
            ]);
        }else {
            $book->update([
                'title' => $request->title,
                'price' => $request->price,
            ]);
        }
        return redirect()->route('books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function renameFile()
    {
        $random = rand(1, 100000);
        $date = Carbon::now();
        $raw_name = $random . $date;
        $extension = ".jpeg";
        $new_name = snake_case(md5($raw_name) . $extension);
        return $new_name;
    }
}
