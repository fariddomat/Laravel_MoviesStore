<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'cc_number' => 'required',
            'cc_month' => 'required',
            'cc_year' => 'required',
            'cvv' => 'required|digits:3',

        ]);
        $movie = Movie::find($id); 

        $order=Order::create($request->all());
        $order->movies()->associate($movie);
        $order->users()->associate(Auth::user());
        $order->save();
        // dd(true);
        return redirect()->back();
        // return view('movies.order' , compact('movie'));
    }
}
