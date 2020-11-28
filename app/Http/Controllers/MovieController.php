<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Director;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rating;

class MovieController extends Controller
{
    public function index()
    {



        if (request()->ajax()) {
            if(request()->selector=="movies")
            $values = Movie::whenSearch(request()->search)->get();

            else if(request()->selector=="actors"){
            $values = Actor::whenSearch(request()->search)->get();
            $values->map(function ($actor) {
                $actor['poster_path'] = asset('images/actor.jpg');
                return $actor;
            });
        }

            else
            {$values = Director::whenSearch(request()->search)->get();
            $values->map(function ($director) {
                $director['poster_path'] = asset('images/director.png');
                return $director;
            });}
            return $values;
        }

        $movies = Movie::whenCategory(request()->category_name)
            ->whenSearch(request()->search)
            ->whenFavorite(request()->favorite)
            ->paginate(20);

        return view('movies.index', compact('movies'));

    }// end of index

    public function show(Movie $movie)
    {
        $rate=0;
        if(Auth::user()){
        try {
            $rating=Rating::where('rateable_id',$movie->id)
        ->where('user_id',Auth::user()->id)->first();
        $rate=$rating->rating;
        } catch (\Throwable $th) {

        }
        }
        $rating_average=$movie->averageRating;
        $related_movies = Movie::where('id', '!=', $movie->id)
            ->whereHas('categories', function ($query) use ($movie) {
                return $query->whereIn('category_id', $movie->categories->pluck('id')->toArray());
            })->get();
        return view('movies.show', compact('movie', 'related_movies', 'rate', 'rating_average'));

    }// end of show

    public function increment_views(Movie $movie)
    {
        $movie->increment('views');

    }// end of increment_views

    public function toggle_favorite(Movie $movie)
    {
        $movie->is_favored ? $movie->users()->detach(auth()->user()->id) : $movie->users()->attach(auth()->user()->id);

    }// end of toggle_favorite

    public function rateMovie(Request $request)
    {
        // dd($request->rating);
        request()->validate(['rating' => 'required']);
        $movie = Movie::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rating;
        // $rating->user_id = auth()->user()->id;
        // $movie->ratings()->save($rating);
        $movie->rateOnce($rating->rating);

        // return redirect()->back();

    }

}
