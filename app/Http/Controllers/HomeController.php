<?php

namespace App\Http\Controllers;

use App\Models\News;



class HomeController extends Controller
{
  public function index()
    {
        
        $newsItems = News::where('visibility', 'public')
                          ->latest()
                          ->take(6) 
                          ->get();

        return view('pages.frontend.home', compact('newsItems'));
    }
}
