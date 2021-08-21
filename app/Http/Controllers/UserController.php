<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\User;
use App\Notifications\AddNewUser;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(PAGNAITE);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Permissions = Permissions::get();
        return view('admin.users.create', compact('Permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try {
            $logo =  $request->has('logo') ? $this->UplaodFile('members', $request->logo) : '';
            $user = new User();
            $this->saveUserData($user, $request, $logo);
            $user->notify(new AddNewUser($user->id));
            toastr()->success(__('layout.insert done successful'));
            return redirect()->route('user.index');
            return redirect()->route('user.index')->with(['success' => 'insert was done']);
        } catch (Exception $ex) {
            toastr()->error(__('layout.some thuing went worng'));
            return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        try {
            if (auth()->user()->admin == 1) {
                $user = User::find($id);
                if (!$user)
                    return redirect()->route('user.index')->with(['error' => 'error 1']);

                $user->delete();
                return redirect()->route('user.index')->with(['success' => 'delete successful']);
            } else {
                return redirect()->route('user.index')->with(['error' => 'error 2']);
            }
        } catch (Exception $ex) {
            return redirect()->route('users.index')->with(['error' => 'error 3']);
        }
    }


    public function status($id)
    {
        try {
            if (auth()->user()->admin == 1) {
                $user = User::find($id);
                if (!$user)
                    return redirect()->route('user.index')->with(['error' => 'error']);
                $user->active = !$user->active;
                $user->save();
                return redirect()->route('user.index')->with(['success' => 'updated']);
            } else {
                return redirect()->route('user.index')->with(['error' => 'error']);
            }
        } catch (Exception $ex) {
            return redirect()->route('user.index')->with(['error' => 'error']);
        }
    }

    public function UplaodFile($folder, $photo)
    {
        $photo->store('/', $folder);
        $fileName = $photo->hashName();
        return $fileName;
    }

    public function saveUserData($user,  $request, $logo)
    {
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->logo = $logo;
        $user->mobile = $request->mobile;
        $user->permission_id = $request->role_id;
        $user->save();
    }

    public function verfiled($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();
        return redirect()->route('index');
    }
}