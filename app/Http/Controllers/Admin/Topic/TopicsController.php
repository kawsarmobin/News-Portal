<?php

namespace App\Http\Controllers\Admin\Topic;

use Session;
use App\Models\Frontend\Topic;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    public function index()
    {
        return view('admin.topics.index')
                ->with('topics', Topic::orderBy('name')->get());
    }

    public function destroy($id)
    {
        if (Topic::delete()) {
            Session::flash('success', 'Topic has been deleted.');
        }
        return back();
    }
}
