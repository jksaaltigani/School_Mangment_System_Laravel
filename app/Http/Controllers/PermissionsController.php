<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index()
    {
        $Permissions = Permissions::all();
        return view('admin.permissions.index', compact('Permissions'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'string | max:30',
                'permissions' => 'array',
            ]
        );
        $per = new Permissions;
        $this->savePermissions($per,  $request);
        return back();
    }

    public function savePermissions($model, $request)
    {
        $model->name = $request->name;
        $model->permissions = json_encode($request->permissions);
        $model->save();
    }

    public function edit($id)
    {
        $permissions = Permissions::findOrFail($id);
        return view('admin.permissions.edit', compact('permissions'));
    }
}