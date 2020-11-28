<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ProfileControlller extends Controller
{
    public function index()
    {


        return view('profile.index');
    }

    public function movies(Request $request)
    {
        $movies = Auth::user()->movie;
        $movies = $movies->merge($movies);
        $movies = $this->paginate($movies);
        // dd($movies);
        $movies->setPath('movie');
        return view('profile.movie', compact('movies'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => ['required'],
            'birth_date' => ['required'],

            'children_number' => ['required'],
            'hoppies' => ['required']
        ]);
        $user = User::find($id);

        $married = '';
        if (isset($request->married)) {
            $married = 'true';
        } else {
            $married = 'false';
        }
        $user->married = $married;
        $user->update($request->except('married'));
        // dd($user);
        Session::flash('success', 'Successfully updated !');
        return redirect()->back();
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
