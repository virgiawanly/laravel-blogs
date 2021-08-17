<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Topic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('home');
    }

    public function articles(){
        return view('articles', [
            'articles' => Article::with('topics')->paginate(6),
        ]);
    }

    public function showArticle(Article $article){
        $article->load('topics');
        return view('article', [
            'article' => $article,
            'articles' => Article::latest()->get(),
            'topics' => Topic::with('articles')->get(),
        ]);
    }

    public function showTopic(Topic $topic){
        $topic->load('articles');
        return view('articles', [
            'topic' => $topic,
            'articles' => $topic->articles()->paginate(6),
        ]);
    }

    public function search(){
        $query = request()->get('q');
        return view('articles', [
            'articles' => Article::with('topics')->where('title', 'LIKE', '%' . $query . '%')->orWhere('excerpt', 'LIKE', '%' . $query . '%')->paginate(6),
            'query' => $query
        ]);
    }
}
