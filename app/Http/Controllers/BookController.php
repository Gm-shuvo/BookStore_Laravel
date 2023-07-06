<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        
        return view('books.index',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //  Validate the request...
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'price' => 'required',
            'publisher' => 'required',
        ]);

        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->publisher = $request->publisher;

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
