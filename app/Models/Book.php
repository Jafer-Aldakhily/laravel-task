<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // public $books;

    protected $fillable = [
        'book_title',
        'book_description',
        'book_author',
        'book_image'
    ];


    // read from array
    // public function allBooks()
    // {
    //     $this->books = [
    //         [
    //             "id" => 1, "book_title" => "book1",
    //             "book_description" => "This description for a book 1",
    //             "book_author" => "Jafer Al-Dakhily",
    //             "book_image" => "https://www.fillmurray.com/640/360"
    //         ],
    //         [
    //             "id" => 2, "book_title" => "book2",
    //             "book_description" => "This description for a book 2",
    //             "book_author" => "Morad Ahmad",
    //             "book_image" => "https://placekitten.com/640/360"
    //         ],
    //         [
    //             "id" => 3, "book_title" => "book3",
    //             "book_description" => "This description for a book 3",
    //             "book_author" => "Kareeam Morad",
    //             "book_image" => "https://www.fillmurray.com/640/360"
    //         ],
    //         [
    //             "id" => 4, "book_title" => "book4",
    //             "book_description" => "This description for a book 4",
    //             "book_author" => "Mohammed Al-Dakhily",
    //             "book_image" => "https://loremflickr.com/640/360"
    //         ],
    //         [
    //             "id" => 5, "book_title" => "book5",
    //             "book_description" => "This description for a book 5",
    //             "book_author" => "Ahmmad Emadd",
    //             "book_image" => "https://loremflickr.com/640/360"
    //         ]
    //     ];

    //     return $this->books;
    // }

    // public function showBook($id)
    // {
    //     foreach ($this->allBooks() as $book) {
    //         if ($book["id"] == $id) {
    //             return $book;
    //         }
    //     }
    // }
}
