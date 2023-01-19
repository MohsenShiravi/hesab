<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(RoleRequest $request)
    {
        Role::query()->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        return redirect()->route('role.index');
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        Role::query()->where('id', $role->id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,

        ]);
        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $user = Auth::user();
        if ($user->hasRole(['super_admin'])) {
            if (filled($role->users)) {
                return abort('403', 'The user does not have access to delete the role');
            } else {
                Role::query()->where('id', $role->id)->delete();
                return redirect()->route('role.index');
            }
        } else {
            return abort('403', 'The user does not have access to delete the role');
        }
    }
}
