<?php

namespace App\Http\Controllers\Dashboard;

use App\Actor;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_actors')->only(['index']);
        $this->middleware('permission:create_actors')->only(['create','store']);
        $this->middleware('permission:update_actors')->only(['edit','update']);
        $this->middleware('permission:delete_actors')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors=Actor::whenSearch(request()->search)
        ->withCount('movies')
        ->paginate(5);
    return view('dashboard.actors.index',compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.actors.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:actors,name'
        ]);
        Actor::create($request->all());
        Session::flash('success','Successfully Created !');
        return redirect()->route('dashboard.actors.index');

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
        $actor=Actor::find($id);
        return view('dashboard.actors.edit',compact('actor'));

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
            'name'=>'required|unique:actors,name,' . $id
        ]);
        $actor=Actor::find($id);

        $actor->update($request->all());

        Session::flash('success','Successfully updated !');
        return redirect()->route('dashboard.actors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor=Actor::find($id);
        $actor->delete();

        Session::flash('success','Successfully deleted !');
        return redirect()->route('dashboard.actors.index');
    }
}
