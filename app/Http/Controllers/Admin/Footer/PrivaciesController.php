<?php

namespace App\Http\Controllers\Admin\Footer;

use Session;
use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivaciesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($privacyData = Privacy::first()) {
            $privacy = $privacyData;
        } else {
            $privacy = new Privacy();
        }
        return view('admin.privacies.create')
                ->with('privacy', $privacy);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validatePrivacy();

        $attributes['user_id'] = auth()->user()->id;

        if ($privacy = Privacy::first()) {
            $privacy->update($attributes);
            Session::flash('success', 'Privacy has been updated.');
        } else {
            Privacy::create($attributes);
            Session::flash('success', 'Privacy has been created.');
        }
        return back();
    }

    /**
     * Validation checking
     */
    public function validatePrivacy()
    {
        return request()->validate([
            'description' => ['required', 'string'],
        ]);
    }
}
