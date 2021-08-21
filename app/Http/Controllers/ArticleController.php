<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticaleRequest;
use App\Models\Article;
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
        return view('article.index');
    }

    public function datatable(){
        // return response()->json([
        //     'status' =>true
        // ]);
    }


    public function create()
    {
        //
    }

    public function store(ArticaleRequest $request)
    {
        Article::create($request->validated());
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
    }

    public function edit(Article $article)
    {

    }

    public function update(ArticaleRequest $request,$id)
    {
        Article::where('id',$id)
            ->update($request->validated());
        // $article->update($request->validated());
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
    }
}
