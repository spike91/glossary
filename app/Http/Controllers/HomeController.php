<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }


    public function films()
    {
        //SQL
        $films=\DB::select('select * from film order by title');
        return view('pages.films', compact('films'));
    }

    public function filmByID($id)
    {
        //Query Builder
        //$film=\DB::table("film")->where('film_id','=',$id)->first();
        $film=\App\Film::find($id);
        return view('pages.filminfo', compact('film'));
    }

    public function categories()
    {
        $categories=\App\Category::all();
        return view('pages.categories', compact('categories'));
    }

    public function filmsByCategory($id)
    {
        $films=\App\Category::where('category_id', $id)->first()->films()
               ->orderBy('title', 'asc')->get();
        return view('pages.films', compact('films'));
    }

    public function actors()
    {
        $actors=\App\Actor::all();
        return view('pages.actors', compact('actors'));
    }

}
