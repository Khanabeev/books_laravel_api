<?php


namespace App\Repositories;


use App\Models\Book;
use App\Repositories\Interfaces\BookInterface;
use Illuminate\Support\Collection;

class BookRepository implements BookInterface
{

    public function all(): Collection
    {
        // TODO: Implement all() method.
    }

    public function getById($id): Book
    {
        // TODO: Implement getById() method.
    }

    public function getByTitle($title): Book
    {
        // TODO: Implement getByTitle() method.
    }
}
