<?php

namespace App\Http\Controllers\Dashboard;

use Session;

use App\Director;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class DirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_directors')->only(['index']);
        $this->middleware('permission:create_directors')->only(['create','store']);
        $this->middleware('permission:update_directors')->only(['edit','update']);
        $this->middleware('permission:delete_directors')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors=Director::whenSearch(request()->search)
            ->withCount('movies')
            ->paginate(5);
        return view('dashboard.directors.index',compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.directors.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:directors,name'
        ]);
        Director::create($request->all());
        Session::flash('success','Successfully Created !');
        return redirect()->route('dashboard.directors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director=Director::find($id);
        return view('dashboard.directors.edit',compact('director'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:directors,name,' . $id
        ]);
        $director=Director::find($id);

        $director->update($request->all());

        Session::flash('success','Successfully updated !');
        return redirect()->route('dashboard.directors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director=Director::find($id);
        $director->delete();

        Session::flash('success','Successfully deleted !');
        return redirect()->route('dashboard.directors.index');
    }
}
