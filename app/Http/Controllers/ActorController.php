<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(Actor $actor)
    {
        dd($actor);

    }
}
