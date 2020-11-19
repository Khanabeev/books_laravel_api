<?php


namespace App\Repositories;


use App\Models\Author;
use App\Repositories\Interfaces\AuthorInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class AuthorRepository implements AuthorInterface
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
        return Cache::remember('authors', $this->ttl, function () {
            return Author::all();
        });
    }

    public function getById(int $id): Author
    {
        return Cache::remember('author.id.' . $id, $this->ttl, function ($id) {
            return Author::findOrFail($id);
        });
    }

    public function getByName(string $name): Author
    {
        return Author::where('name', 'LIKE', '%' . $name . '%')->first();
    }

    public function countBooks(int $id): int
    {
        return Author::findOrFail($id)->books()->count();
    }
}
