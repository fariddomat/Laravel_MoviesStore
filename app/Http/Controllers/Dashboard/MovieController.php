<?php

namespace App\Http\Controllers\Dashboard;

use App\Actor;
use App\Category;
use App\Director;
use Session;
use App\Http\Controllers\Controller;
// use App\Jobs\StreamMovie;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_movies')->only(['index']);
        $this->middleware('permission:create_movies')->only(['create','store']);
        $this->middleware('permission:update_movies')->only(['edit','update']);
        $this->middleware('permission:delete_movies')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $movies=Movie::whenSearch(request()->search)
            ->whenCategory(request()->category)
            ->with('categories')
            ->paginate(5);
        return view('dashboard.movies.index',compact('movies', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $directors=Director::all();
        $actors=Actor::all();
        $movie=Movie::create([]);
        return view('dashboard.movies.create',compact('categories', 'directors', 'actors', 'movie'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd(phpinfo());
        $movie = Movie::FindOrFail($request->movie_id);

        // if (!$request->movie->isValid()) {
        //     throw new \Exception('Error on upload file: '.$request->movie->getErrorMessage());
        // }
        $movie->update([
            'name' => $request->name,
            'path' => $request->file('movie')->store('movies'),
        ]);
        //  dd($movie->path);


        Session::flash('success','Successfully Created !');
        return $movie;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $directors=Director::all();
        $actors=Actor::all();
        $categories = Category::all();
        return view('dashboard.movies.edit', compact('categories', 'movie','directors','actors'));

    }//end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Movie $movie)
    {
        if ($request->type == 'publish') {

            //publish
            $request->validate([
                'name' => 'required|unique:movies,name,' . $movie->id,
                'description' => 'required',
                'poster' => 'required|image',
                'image' => 'required|image',
                'categories' => 'required|array',
                'director_id' => 'required',
                'actors' => 'required|array',
                'year' => 'required',
                'rating' => 'required',
            ]);
            // dd($request->director_id);

        } else {

            //update
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'poster' => 'sometimes|nullable|image',
                'image' => 'sometimes|nullable|image',
                'categories' => 'required|array',
                'director_id' => 'required',
                'actors' => 'required|array',
                'year' => 'required',
                'rating' => 'required',
            ]);

        }//end of else

        $request_data = $request->except(['poster', 'image']);

        if ($request->poster) {

            $this->remove_previous('poster', $movie);

            $poster = Image::make($request->poster)
                ->resize(255, 378)
                ->encode('jpg');

            Storage::disk('local')->put('public/images/' . $request->poster->hashName(), (string)$poster, 'public');
            $request_data['poster'] = $request->poster->hashName();

        }//end of if

        if ($request->image) {

            $this->remove_previous('image', $movie);

            $image = Image::make($request->image)
                ->encode('jpg', 50);

            Storage::disk('local')->put('public/images/' . $request->image->hashName(), (string)$image, 'public');
            $request_data['image'] = $request->image->hashName();

        }//end of if

        // dd($request_data);
        $movie->director()->associate($request->director_id);

        $movie->update($request_data);
        $movie->categories()->sync($request->categories);
        $movie->actors()->sync($request->actors);
        Session::flash('success','Successfully updated !');
        return redirect()->route('dashboard.movies.index');

    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        Storage::disk('local')->delete('public/images/' . $movie->poster);
        Storage::disk('local')->delete('public/images/' . $movie->image);
        Storage::disk('local')->delete($movie->path);

        Storage::disk('local')->deleteDirectory('public/movies/' . $movie->id);

        $movie->categories()->detach();
        $movie->actors()->detach();
        $movie->delete();
        Session::flash('success','Successfully deleted !');
        return redirect()->route('dashboard.movies.index');
    }

    private function remove_previous($image_type, $movie)
    {
        if ($image_type == 'poster') {

            if ($movie->poster != null)
                Storage::disk('local')->delete('public/images/' . $movie->poster);

        } else {

            if ($movie->image != null)
                Storage::disk('local')->delete('public/images/' . $movie->image);

        }//end of else

    }// end of remove_previous
}
