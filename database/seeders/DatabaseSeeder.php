<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(10)->create();
        Book::factory(100)->create();

        Book::all()->each(function ($book) {
           $book->authors()->attach(Author::inRandomOrder()->first());
        });
    }
}
