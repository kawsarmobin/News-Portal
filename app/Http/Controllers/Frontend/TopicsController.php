<?php

namespace App\Http\Controllers\Frontend;

use Session;
use Illuminate\Http\Request;
use App\Models\Frontend\Topic;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.topics.index', [
            'topics' => auth()->user()->ownTopics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateTopic();

        $attributes['user_id'] = auth()->user()->id;

        if (Topic::create($attributes)) {
            Session::flash('success', 'Topic has been created');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('frontend.topics.edit')
                ->with('topic', $topic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $attributes = $this->validateUpdateTopic($topic->id);

        $attributes['user_id'] = auth()->user()->id;

        if ($topic->update($attributes)) {
            Session::flash('success', 'Topic has been updated.');
        }

        return redirect()->route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $this->authorize('delete-topic', $topic);
        // if ($topic->delete()) {
        //     Session::flash('success', 'Topic['.$topic->name.'] has been deleted.');
        // }

        // return redirect()->route('topics.index');
        return $topic->posts->count();
    }

    public function validateTopic()
    {
        return request()->validate([
            'name' => 'required|string|min:2|unique:topics'
        ]);
    }

    public function validateUpdateTopic($id)
    {
        return request()->validate([
            'name' => 'required|string|min:2|unique:topics,name,'.$id
        ]);
    }
}
