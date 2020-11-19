<?php


namespace App\Repositories;


use App\Models\Book;
use App\Repositories\Interfaces\BookInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BookRepository implements BookInterface
{
    /**
     * @var string
     */
    private $ttl;

    public function __construct()
    {
        $this->ttl = '60'; //minutes
    }

    public function all(): Collection
    {
        return Cache::remember('books', $this->ttl, function () {
            return Book::all();
        });
    }

    public function getById(int $id): Book
    {
        return Cache::remember('book.id.' . $id, $this->ttl, function () use($id) {
            return Book::findOrFail($id);
        });
    }

    public function getByTitle(string $title): Book
    {
        // TODO: Implement getByTitle() method.
    }
}
