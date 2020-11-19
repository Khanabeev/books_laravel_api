<?php


namespace App\Repositories\Interfaces;


use App\Models\Author;
use Illuminate\Support\Collection;

interface AuthorInterface
{
    public function all(): Collection;

    public function getById($id): Author;

    public function getByName($name): Author;
}