<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Term;
use App\Models\Privacy;

class FooterController extends Controller
{
    public function about()
    {
        return view('frontend.footer.site_details')
                ->with('data', About::first())
                ->with('title', 'about us');
    }

    public function terms()
    {
        return view('frontend.footer.site_details')
                ->with('data', Term::first())
                ->with('title', 'Terms & Conditions');
    }

    public function privacy()
    {
        return view('frontend.footer.site_details')
                ->with('data', Privacy::first())
                ->with('title', 'Privacy Policy');
    }
}
