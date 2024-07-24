<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('management.user.index', compact('user'));
    }

    public function edit()
    {
        $role = Roles::all();
        $user = User::find(request()->id);
        if (!$user) {
            abort(404);
        }

        return view('management.user.edit', compact('user', 'role'));
    }

    public function update()
    {
        $user = User::find(request()->id);
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = Hash::make(request('password'));
        $user->role_id = request()->role;
        $user->status = request()->status;
        $user->updated_at = now();
        $role = Roles::all();

        if (request('name') && request('email') && request('password') && request('role') && request('status')) {
            $user->save();
        } else {
            abort(400, 'Tidak ada data yang diubah.');
        }

        return view('management.user.edit', compact('user', 'role'));
    }
    
}
