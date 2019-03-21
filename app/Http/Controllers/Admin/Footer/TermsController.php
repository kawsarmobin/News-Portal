<?php

namespace App\Http\Controllers\Admin\Footer;

use Session;
use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($termData = Term::first()) {
            $term = $termData;
        } else {
            $term = new Term();
        }
        return view('admin.terms.create')
        ->with('term', $term);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateTerms();

        $attributes['user_id'] = auth()->user()->id;

        if ($term = Term::first()) {
            $term->update($attributes);
            Session::flash('success', 'Terms has been updated.');
        } else {
            Term::create($attributes);
            Session::flash('success', 'Terms has been created.');
        }

        return back();
    }

    public function validateTerms()
    {
        return request()->validate([
            'description' => ['required', 'string'],
        ]);
    }
}
