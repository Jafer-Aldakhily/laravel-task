<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index", ["books" => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "author" => "required",
            "image" => "required|image|mimes:png,jpg|max:2048",
        ]);

        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Book::create([
            "book_title" => $request->title,
            "book_description" => $request->description,
            "book_author" => $request->author,
            "book_image" => $imageName
        ]);

        return redirect('/')->with("success", "Added new book successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $book = new Book;
        // return view("show", ["book" => $book->showBook($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view("edit", ["book" => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if ($request->image) {
            $book = Book::findOrFail($book->id);
            $oldImage = $book->book_image;
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            Book::where("id", $book->id)->update([
                "book_title" => $request->title,
                "book_description" => $request->description,
                "book_author" => $request->author,
                "book_image" => $imageName
            ]);
            $oldImagePath = public_path("./images/$oldImage");
            if (isset($oldImagePath)) {
                unlink($oldImagePath);
            }
            return redirect('/')->with("success", "updated record successfully");
        } else {
            Book::where("id", $book->id)->update([
                "book_title" => $request->title,
                "book_description" => $request->description,
                "book_author" => $request->author
            ]);
            return redirect('/')->with("success", "updated record successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/')->with("success", "Deleted record successfully");
    }
}
