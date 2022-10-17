<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    // public $books;

    protected $fillable = [
        'book_title',
        'book_description',
        'author_id',
        'book_image'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function scopeFilter($query, array $filters)
    {
        if ($filters["search"] ?? false) {
            $query->where("book_title", "LIKE", "%" . $filters["search"] . "%");
        }
    }
}
