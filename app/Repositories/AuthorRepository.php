<?php


namespace App\Repositories;


use App\Models\Author;
use App\Repositories\Interfaces\AuthorInterface;
use Illuminate\Support\Collection;

class AuthorRepository implements AuthorInterface
{

    public function all(): Collection
    {
        // TODO: Implement all() method.
    }

    public function getById($id): Author
    {
        // TODO: Implement getById() method.
    }

    public function getByName($name): Author
    {
        // TODO: Implement getByName() method.
    }

    public function getByFullName($fullName): Author
    {
        // TODO: Implement getByFullName() method.
    }
}
