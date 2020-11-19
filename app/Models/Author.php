<?php

namespace App\Models;

use App\Repositories\AuthorRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'family_name',
        'middle_name',
        'date_of_birth',
        'date_of_death',
    ];

    protected $appends = [
        'count_books'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_book');
    }

    public function getCountBooksAttribute()
    {
        return (new AuthorRepository())->countBooks($this->id);
    }
}
