<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'published_at',
        'description'
    ];

    protected $appends = [
        'authors_list'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }

    public function getAuthorsListAttribute()
    {
        $authorsList = [];
        $this->authors()->each(function ($author) use ($authorsList) {
            $familyName = ucfirst(mb_strtolower($author->family_name));
            $firstNameLatter = mb_strtoupper(substr($author->first_name, 0, 1));
            $middleNameLatter = mb_strtoupper(substr($author->middle_name, 0, 1));
            $authorsList[] = $familyName . " " . $firstNameLatter . "." . $middleNameLatter . ".";
        });
        return implode(' ,', $authorsList) ?? "";
    }
}
