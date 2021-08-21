<?php

namespace App\Http\Controllers;

use App\Models\Articals;
use Illuminate\Http\Request;

class LatestPost extends Controller
{
    public function index()
    {
        $articals =  Articals::paginate(12);
        return view('site.latestpost', compact('articals'));
    }
}