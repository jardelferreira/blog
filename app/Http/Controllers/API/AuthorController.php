<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Author $authors)
    {
        return $authors->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request, Author $author)
    {
        $author->create($request->all());

        return \response()->json([
            'message' => 'Authorr created successfuly'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($author)
    {
        $author = Author::find($author);
        if (!$author) {
            return response()->json([
                'message' => "Author not found"
            ],404);
        }
        return $author;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $author)
    {
        $author = Author::find($author);
        if (!$author) {
            return response()->json([
                'message' => "Author not found"
            ],422);
        }

        $author->update($request->all());

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($author)
    {
        $author = Author::find($author);
        if (!$author) {
            return response()->json([
                'message' => "Author not found"
            ],422);
        }
        $author->delete();
        return \response()->json([
            'message' => 'Author is deleted successfuly'
        ],200);
    }

    public function articles(Author $author)
    {
        if (!$author->id) {
            return response()->json([
                'message' => "Author not found"
            ],422);
        }
        return $author->articles()->get();
    }
}
