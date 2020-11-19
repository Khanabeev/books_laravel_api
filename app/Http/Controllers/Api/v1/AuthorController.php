<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\AuthorStoreRequest;
use App\Http\Requests\Api\v1\AuthorUpdateRequest;
use App\Http\Resources\Api\v1\AuthorResource;
use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AuthorResource::collection($this->authorRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AuthorStoreRequest $request)
    {
        $validated = $request->validated();
        if ((new Author())->create($validated))
            return response()->json([
                'success' => 'New author has been created'
            ]);

        return response()->json([
            'error' => 'New author hasn\'t been created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Author $author
     * @return AuthorResource
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $validated = $request->validated();
        if ($author->update($validated))
            return response()->json([
                'success' => 'Author ' . $author->id . ' has been updated'
            ]);

        return response()->json([
            'error' => 'Author ' . $author->id . ' hasn\'t been updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Author $author)
    {
        if ($author->delete())
            return response()->json([
                'success' => 'Author ' . $author->id . ' has been deleted'
            ]);

        return response()->json([
            'error' => 'Author ' . $author->id . ' hasn\'t been deleted'
        ]);
    }
}
