<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\BookSearchRequest;
use App\Http\Requests\Api\v1\BookStoreRequest;
use App\Http\Requests\Api\v1\BookUpdateRequest;
use App\Http\Resources\Api\v1\BookResource;
use App\Http\Resources\Api\v1\BookResourceCollection;
use App\Models\Author;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * @var BookRepository
     */
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return BookResourceCollection
     */
    public function index()
    {
        return new BookResourceCollection(Book::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookStoreRequest $request)
    {

        $validated = $request->validated();
        if ((new Book())->create($validated))
            return response()->json([
                'success' => 'New book has been created'
            ]);

        return response()->json([
            'error' => 'New book hasn\'t been created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BookUpdateRequest $request, Book $book)
    {
        $validated = $request->validated();
        if ($book->update($validated))
            return response()->json([
                'success' => 'Book ' . $book->id . ' has been updated'
            ]);

        return response()->json([
            'error' => 'Book ' . $book->id . ' hasn\'t been updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Book $book)
    {
        if ($book->delete())
            return response()->json([
                'success' => 'Author ' . $book->id . ' has been deleted'
            ]);

        return response()->json([
            'error' => 'Author ' . $book->id . ' hasn\'t been deleted'
        ]);
    }

    public function search(BookSearchRequest $request)
    {
        return $this->bookRepository->getByTitle($request->validated()['title']);
    }
}
