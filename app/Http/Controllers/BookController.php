<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sort = null)
    {
        if ($sort == null)
            $books = Book::simplePaginate(10);
        else
            $books = Book::orderBy('price', $sort)->simplePaginate(10);

        return view('books', ['books' => $books]);
    }

    public function sort($sort)
    {
        $books = Book::orderBy('price', $sort)->simplePaginate(10);
        return view('books', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        return view('new-book', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'id' => 'required|email',
        ]);

        if ($validator->passes()) {
            $book = new Book();
            $book->title = $request->title;
            $book->price = $request->price;
            $book->author_id = $request->id;

            $book->save();

            return response()->json(['success' => 'Added new records.']);
        }


        return response()->json(['error' => $validator->errors()->all()]);

        /*
        $validatedData = $request->validate([
            'title' => 'required|max:30',
            'price' => 'required|numeric'
        ]);
        */
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
        $author = Book::find($id)->author;

        return view('book', ['book' => $book], ['author' => $author]);
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

        return view('edit-book', ['book' => $book]);
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
        $book = Book::find($id);

        $book->title = $request->title;
        $book->price = $request->price;

        $book->save();
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
    }
}
