<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Constant;
use App\Libraries\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        Role::RoleSuperAdmin();

        $user = User::all();
        return view('management.user.index', compact('user'));
    }

    public function edit()
    {
        Role::RoleSuperAdmin();

        $role = Roles::all();
        $user = User::find(request()->id);
        if (!$user) {
            abort(404);
        }

        return view('management.user.edit', compact('user', 'role'));
    }

    public function update()
    {
        Role::RoleSuperAdmin();

        $validatedData = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|integer',
            'status' => 'required|integer',
        ]);

        $user = User::find(request()->id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role_id =intval($validatedData['role']);
        $user->status = intval($validatedData['status']);
        $user->updated_at = now();
        $user->save();

        return redirect()->route('management.user.index');
    }
    
    public function destroy()
    {
        Role::RoleSuperAdmin();
        
        $user = User::find(request()->id);
        if (!$user) {
            abort(404);
        }

        $user->delete();

        return redirect()->route('management.user.index');
    }
}
