<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($aboutData = About::first()) {
            $about = $aboutData;
        } else {
            $about = new About();
        }
        return view('admin.about.create')
            ->with('about', $about);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateAbout();

        $attributes['user_id'] = auth()->user()->id;

        if ($about = About::first()) {
            $about->update($attributes);
        } else {
            About::create($attributes);
        }

        return back();
    }

    public function validateAbout()
    {
        return request()->validate([
            'description' => ['required', 'string'],
        ]);
    }
}
