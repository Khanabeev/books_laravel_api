<?php


namespace App\Repositories\Interfaces;


use App\Models\Book;
use Illuminate\Support\Collection;

interface BookInterface
{
    public function all(): Collection;

    public function getById($id): Book;

    public function getByTitle($title): Book;

}
