<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::join('stores', 'stores.id', '=', 'articles.store_id')
                    ->select('articles.id','articles.description','articles.price','articles.name','articles.total_in_shelf','articles.total_in_vault', 'stores.name as store_name')
                    ->getQuery()
                    ->get();
        $response = array();
        $response['articles'] = $articles;
        $response['success'] = true;
        $response['total_elements'] = count($articles);

        return $response;
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
    public function store(Request $request)
    {
      $attributes = request()->validate([
         'name' => ['required'],
         'description' => ['required'],
         'price' => ['required'],
         'total_in_shelf' => ['required'],
         'total_in_vault' => ['required'],
         'store_id' => ['required']
      ]);
      $saved = Article::create($attributes);
      $result = array();
      $result['article'] = $saved;
      $result['sucess'] = true;
      return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
      $result = array();
      $result['article'] = $article;
      $result['sucess'] = true;
      return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
      $attributes = request()->validate([
         'name' => ['required'],
         'description' => ['required'],
         'price' => ['required'],
         'total_in_shelf' => ['required'],
         'total_in_vault' => ['required'],
         'store_id' => ['required']
      ]);
      $updated = $article->update($attributes);
      $result = array();
      $result['article'] = $article;
      $result['sucess'] = true;
      return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
      $article->delete();
      $result = array();
      $result['article'] = $article;
      $result['sucess'] = true;
      return $result;
    }
}
