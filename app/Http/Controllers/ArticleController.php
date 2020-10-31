<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{


    public function show(Article $article)
    {

        // SHOW A SINGE ARTICLE

        return view('articles.show', ['article' => $article]);

    }

    public function index()
    {

        if (\request('tag')) {
            $article = Tag::where('name', \request('tag'))->firstOrFail()->articles;
        } else {
            $article = Article::latest()->get();
        }


        // RENDER A LIST
        return view('articles.article_list', ['articles' => $article]);
    }

    public function create()
    {
        // SHOW A VIEW FOR CREATING NEW RESOURCE

        return view('articles.create', ['tags' => Tag::all()]);

    }

    public function edit(Article $article)
    {
        // SHOW A VIEW FOR EDITING EXISTING ARTICLE

        return view('articles.edit', compact('article'));

    }

    public function destroy()
    {
        // DELETE AN ARTICLE
    }

    public function store()
    {
        // SAVE AN ARTICLE THAT WAS JUST MADE

        $this->validateArticle();
        //Article::create($this->validateArticle());
        $article = new Article(\request(['title','excerpt','body']));
        $article->user_id = 1; // hard-coded user
        $article->save();
        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));


    }

    public function update(Article $article)
    {
        // UPDATE EDITED ARTICLE

        $article->update($this->validateArticle());


        return redirect(route('articles.show', $article->id));

    }

    // CLEAN UP CODE METHOD
    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags'=>'exists:tags,id'
        ]);
    }
}
