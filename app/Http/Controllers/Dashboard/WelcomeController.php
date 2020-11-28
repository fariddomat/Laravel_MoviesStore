<?php

namespace App\Http\Controllers\Dashboard;

use App\Actor;
use App\Category;
use App\Director;
use App\Http\Controllers\Controller;
use App\Movie;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $users_count = User::whereRole('user')->count();
        $categories_count = Category::count();
        $movies_count = Movie::count();
        $actors_count = Actor::count();
        $directors_count = Director::count();

        return view('dashboard.welcome', compact('users_count', 'categories_count', 'movies_count', 'actors_count', 'directors_count'));
    }
}
