<?php

namespace App\Http\Controllers\API;

use App\Models\Author;
use App\Models\Article;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $articles)
    {
        return $articles->get();
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
    public function store(ArticleRequest $request, Article $article)
    {
        $article->create($request->all());

        return \response()->json([
            'message' => 'Article publish successfuly'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $article)
    {
        $article = Article::find($article);
        if (!$article) {
            return response()->json([
                'message' => "Article not found"
            ],404);
        }
        return $article;
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
    public function update(ArticleRequest $request,int $article)
    {
        $article = Article::find($article);
        if (!$article) {
            return response()->json([
                'message' => "Article not found"
            ],404);
        } 
   
        if ($article->author_id !== $request->author_id) {
            return response()->json([
                'message' => "Forbidden, you don't is authored this article"
            ],403);
        }else{
            
            $article->update($request->all());
            
            return \response()->json([
                'message' => 'Article updated successfuly',
                'data' => $request->all()
            ],200);
            
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Author $author)
    {
        if (!$article) {
            return response()->json([
                'message' => "Article not found"
            ],404);
        }
        if ($author->id != $article->author_id) {
            return \response()->json([
                "messagem" => "Forbidden, you don't is authored this article"
            ],403);
        }
        
         $article->delete();
        return \response()->json([
            'message' => 'Article is deleted successfuly'
        ],200);
    }

    public function comments(int $article)
    {
        $article = Article::where('id',$article);
        if (!$article->count()) {
            return response()->json([
                'message' => "Article not found"
            ],404);
        }
        return $article->with('comments')->get();
    }
}
