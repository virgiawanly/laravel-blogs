<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $imagePath;

    public function __construct()
    {
       $this->imagePath = public_path('img/articles/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::with('topics', 'author')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create', [
            'topics' => Topic::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slug = (Str::slug($request->slug) == '') ? Str::slug($request->title) : Str::slug($request->slug);

        if($request->has('image')){
            $file = $request->file('image');
            $image = $file->hashName();
            $file->move($this->imagePath, $image);
        } else {
            $image = null;
        }

        $user_id = 1;

        $article = Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image' => $image,
            'user_id' => $user_id
        ]);

        if($request->topics){
            $topics = $this->getTopics($request);
            $article->topics()->attach($topics);
        }

        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article->load('topics');
        return view('admin.articles.edit', [
            'topics' => Topic::all(),
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slug = Str::slug($request->slug) == '' ? $article->slug : Str::slug($request->slug);

        if($request->has('image')){
            $file = $request->file('image');
            $image = $file->hashName();
            $file->move($this->imagePath, $image);

            if(file_exists($this->imagePath . $article->image)){
                unlink($this->imagePath . $article->image);
            }
        } else {
            $image = $article->image;
        }

        $user_id = 1;

        $article->update([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image' => $image,
            'user_id' => $user_id
        ]);

        if($request->topics){
            $topics = $this->getTopics($request);
            $article->topics()->sync($topics);
        }

        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        if(file_exists($this->imagePath . $article->image)){
            unlink($this->imagePath . $article->image);
        }
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }

    public function getTopics(Request $request){
        $allTopics = Topic::all();
        $topicArr = [];
        foreach($request->topics as $rTopic){
            $topic = $allTopics->where('slug', Str::slug($rTopic))->first();
            if(!$topic){
                $newTopic = Topic::create([
                    'name' => $rTopic,
                    'slug' => Str::slug($rTopic)
                ]);
                $topicArr[] = $newTopic->id;
            } else {
                $topicArr[] = $topic->id;
            }
        }

        return $topicArr;
    }
}
