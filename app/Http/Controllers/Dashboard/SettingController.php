<?php

namespace App\Http\Controllers\Dashboard;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    

    public function social_links()
    {
        return view('dashboard.settings.social_links');
    }

    public function site_settings()
    {
        return view('dashboard.settings.site_settings');

    }
    public function store(Request $request)
    {
        setting($request->all())->save();

        Session::flash('success','Successfully added !');
        return redirect()->back();
    }
}
