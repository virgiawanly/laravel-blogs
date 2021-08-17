<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.topics.index', [
            'topics' => Topic::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topics.create');
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
            'name' => 'required',
            'slug' => 'unique:topics,slug'
        ]);

        $slug = ($request->slug) ? Str::slug($request->slug) : Str::slug($request->name);

        if(Topic::where('slug', $slug)->first()){
        return redirect()->route('topics.index')->withErrors('The slug has already been taken.');

        }

        Topic::create([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return redirect()->route('topics.index')->with('success', 'Topic created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if($topic->slug !== $request->slug){
            $request->validate([
                'slug' => 'unique:topics,slug'
            ]);
        }

        $slug = ($request->slug) ? Str::slug($request->slug) : Str::slug($topic->slug);

        $topic->update([
            'name' => $request->name,
            'slug' => $slug
        ]);


        return redirect()->route('topics.index')->with('success', 'Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('topics.index')->with('success', 'Topic deleted successfully');
    }
}
