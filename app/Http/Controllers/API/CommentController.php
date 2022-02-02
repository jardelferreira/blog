<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentRequest $request, Article $article, Comment $comment)
    {
        if (!$article) {
            return \response()->json([
                'message' => 'Article not found'
            ], 404);
        }

        $comment->create($request->all());

        return \response()->json([
            'message' => 'Comment sent successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $comment)
    {
        $comment = Comment::where('id',$comment)->get();
        if (!$comment->count()) {
            return response()->json([
                'message' => 'Comment not Found'
            ],404);
        }
        return $comment;
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
    public function update(CommentRequest $request, int $comment)
    {
        $comment = Comment::where('id', $comment);
        if (!$comment) {
            return response()->json([
                'message' => "Comment not found"
            ], 404);
        }

        $comment->update($request->all());

        return \response()->json([
            'message' => 'Comment updated successfuly',
            'data' => $request->all()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $comment)
    {
        $comment = Comment::where('id',$comment);
        if (!$comment->count()) {
            return \response()->json([
                'message' => "Comment not found"
            ],404);
        }
        $comment->delete();
        return \response()->json([
            'message' => 'comment deleted successfuly'
        ],200);
    }
}
