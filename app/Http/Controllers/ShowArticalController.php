<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articals;
use App\Models\Category;

class ShowArticalController extends Controller
{
    public function index($id)
    {

        $artical = Articals::findOrFail($id);
        if (empty(session($artical->id))) {
            $artical->view++;
            $artical->save();
            session($artical->id, $artical->id);
        }
        // return session();
        $data['artical'] =  $artical;
        $data['category'] = Category::findOrFail($artical->id);
        $data['watch_to'] = Articals::where('category_id', $artical->category_id)->orderBy('view', 'desc')->limit(10)->pluck('name', 'short_desc', 'photo');
        $data['pupular_view'] = Articals::orderBy('view', 'desc')->limit(4)->get();
        $data['wirter_chsose'] = Articals::orderBy('view', 'desc')->limit(3)->get();

        return view('site.artical', $data);
    }
}