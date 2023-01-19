<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.users-index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.users-create');
    }

    public function store(UserRequest $request)
    {
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        return view('users.users-edit', [
            'user' => $user,
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'password' => bcrypt($request->password),
        ]);
        return redirect(route('users.index'));
    }

    public function destroy(User $user)
    {
        if (true) {
            $user->delete();
            return redirect(route('users.index'));
        }
    }
}
