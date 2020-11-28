<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Category;
use App\Director;
use App\Movie;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // $movies = Movie::whenSearch('a')->get();

        //     $actors = Actor::whenSearch('a')->get();

        //     $directors = Director::whenSearch('a')->get();

        //   dd($movies.$actors);
        // $json = json_decode(file_get_contents('http://localhost:3547/api/Movies/mm'), true);

        $latest_movies=Movie::latest()
                ->limit(6)
                ->get();
        $categories=Category::where('name','Action')
            ->orWhere('name','Drama')
            ->with('movies')
            ->get();
            // dd($categories);
        return view('welcome' , compact('latest_movies','categories'));
    }
}
