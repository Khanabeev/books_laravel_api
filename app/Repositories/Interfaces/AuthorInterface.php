<?php


namespace App\Repositories\Interfaces;


use App\Models\Author;
use Illuminate\Support\Collection;

interface AuthorInterface
{
    public function all(): Collection;

    public function getById(int $id): Author;

    public function getByName(string $name): Author;

    public function countBooks(int $id): int;
}
