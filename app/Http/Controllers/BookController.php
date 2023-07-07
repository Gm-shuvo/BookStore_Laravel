<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
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
    
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'price' => 'required',
            'publisher' => 'required',
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->publisher = $request->publisher;

        $book->update();
        
        return redirect()->route('books.index')->with('success', 'Book Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //delete the book
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book Deleted Successfully!');
    }

    public function getPDF()
    {
        // Retrieve all books from the database
        $books = Book::all();
        
        // Create a new Dompdf instance
        $pdf = new Dompdf();
        
        // Define the HTML content for the PDF
        $html = '<h1>Books List</h1>
            <table class= "table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Price</th>
                        <th>Publisher</th>
                    </tr>
                </thead>
                <tbody>';
        
        // Loop through each book and add its details to the HTML
        foreach ($books as $book) {
            $html .= '<tr>
                <td>' . $book->title . '</td>
                <td>' . $book->author . '</td>
                <td>' . $book->isbn . '</td>
                <td>' . $book->price . '</td>
                <td>' . $book->publisher . '</td>
            </tr>';
        }
        
        $html .= '</tbody></table>';
        
        // Load the HTML into Dompdf
        $pdf->loadHtml($html);
        
        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $pdf->render();
        
        // Output the generated PDF to the browser
        $pdf->stream('books.pdf', ["Attachment" => false]);
    }    
}
