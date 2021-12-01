<?php

namespace App\Http\Controllers;

use App\Models\Articals;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $data = [];
        $data['leatest_post'] = Articals::limit(4)->orderBy('created_at', 'DESC')->get();
        $data['categories'] = [];
        $categories = Category::get();
        foreach ($categories as $category) {
            $articals = Articals::where('category_id', $category->id)->orderBy('created_at', 'desc')->limit(4)->get();
            $artical_and_name = ['articals' => $articals, 'name' => $category->name, 'id' => $category->id];
            array_push($data['categories'], $artical_and_name);
        }
        // return $data;
        return view('home', $data);
    }

    public function privcy()
    {
        return view('site.privcy');
    }
    public function contact()
    {
        return view('site.contant');
    }

    public function setting()
    {
        return auth()->user()->permission->permissions;
        // return auth()->user()->hasApilty('users');
    }
}