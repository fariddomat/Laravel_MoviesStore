<?php

namespace App\Http\Controllers\Profile;

use Session;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Rules\MatchOldPassword;

use Illuminate\Support\Facades\Hash;

use App\User;



class ChangePasswordController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {

        return view('profile.changePassword');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function store(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);



        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        Session::flash('success', 'Successfully updated !');
        return redirect()->back();


        dd('Password change successfully.');

    }

}
