<?php

namespace App\Http\Controllers;

use App\Models\Articals;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesArtical extends Controller
{
    public function index($id)
    {
        $data['category'] = Category::findOrFail($id);
        $data['articals'] = Articals::where('category_id', $id)->paginate();
        $data['pupular_view'] = Articals::where('category_id', $id)->orderBy('view', 'desc')->limit(4)->get();
        $data['wirter_chsose'] = Articals::where('category_id', $id)->orderBy('view', 'desc')->limit(3)->get();
        return view('site.categories', $data);
    }
}