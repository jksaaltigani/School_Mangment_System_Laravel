<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticalREquest;
use App\Models\Articals;
use App\Models\Category;
use App\Notifications\newPost;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals = Articals::with('user')->orderBy('created_at', 'desc')->paginate(PAGNAITE);
        return view('admin.Articals.index', compact('articals'));
    }

    public function unactive()
    {
        $articals = Articals::with('user')->unactive()->paginate(PAGNAITE);
        return view('articals.index', compact('articals'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.Articals.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticalREquest $request)
    {
        try {
            DB::beginTransaction();
            //store post
            $filname = '';
            $artical = new Articals();
            $artical->name = $request->name;
            $artical->description = $request->description;
            $artical->tags = $request->tag;
            $artical->slug = Str::slug($artical->name);
            $artical->short_desc = $request->short_des;
            $artical->category_id = $request->category_id;
            $artical->content = $request->content;
            $artical->user_id = auth()->user()->id;
            $artical->view = 0;
            $artical->active = 0;
            $artical->fack_data = 'ksjadm';
            $artical->photo = $filname;
            $artical->save();

            if ($request->hasFile('photo')) {
                $filname = UplaodFile('articals', $request->photo, $artical->id);
            }
            $artical->photo = $filname;
            $artical->save();
            Notification::send(auth()->user(), new newPost($artical->name, $artical->id));


            //add new notifaction
            DB::commit();
            toastr()->success(__('layout.insert done successful'));
            return redirect()->route('articals.index')->with(['success' => 'artical created']);
        } catch (Exception $ex) {
            DB::rollback();
            return $ex;
            return redirect()->route('artical.index')->with(['error' => 'artical created']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return  $artical = Articals::find($id);

        try {
            $artical = Articals::find($id);
            if (!$artical)
                return redirect()->route('artical.index')->with(['error' => 'something went worng']);
            return view('articals.show', compact('artical'));
        } catch (Exception $ex) {
            return redirect()->route('artical.index')->with(['error' => 'error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = Category::get();
            $artical = Articals::with('user')->find($id);
            if (!$artical)
                return redirect()->route('articals.index')->with(['error' => 'something went worng']);

            return view('articals.edit', compact('artical', 'categories'));
        } catch (Exception $ex) {
            return redirect()->route('articals.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticalREquest $request, $id)
    {
        try {


            $artical = Articals::find($id);
            $artical->name = $request->name;
            $artical->description = $request->description;
            $artical->tag = $request->tag;
            $artical->slug = Str::slug($artical->name);
            $artical->sort_des = $request->short_des;
            $artical->category_id = $request->category_id;
            $artical->content = $request->content;
            $artical->user_id = auth()->user()->id;
            if ($request->has('photo')) {
                $filname = UplaodFile('articals', $request->photo, $artical->id);
                $artical->photo = $filname;
            }
            $artical->save();
            return redirect()->route('artical.index')->with(['success' => 'artical created']);
        } catch (Exception $ex) {
            return $ex;
            return redirect()->route('artical.index')->with(['error' => 'artical created']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $artical = Articals::findOrFail($request->id);
            $filname = $artical->photo;
            $artical->delete();
            Storage::disck('articals')->deleteDirectory("/" . $artical->id);
            toastr()->success(__('layout.delete successful'));
            return redirect()->route('articals.index');
        } catch (Exception $e) {
            toastr()->error(__('layout.some thing went worng'), __('layout.error'));
            return redirect()->route('articals.index');
        }
    }
    public function changeStatus($id)
    {
        try {
            $artical = Articals::find($id);
            $artical->active = !$artical->active;
            $artical->save();
            toastr()->success(__('layout.update was done'));
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error(__('layout.some thing went worng'));
            return redirect()->back()->withInputwith(['error' => 'error']);
        }
    }
}