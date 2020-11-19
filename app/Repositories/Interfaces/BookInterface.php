<?php


namespace App\Repositories\Interfaces;


use App\Models\Book;
use Illuminate\Support\Collection;

interface BookInterface
{
    public function all(): Collection;

    public function getById(int $id): Book;

    public function getByTitle(string $title): Collection;

}
