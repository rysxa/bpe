<?php 

namespace App\Libraries;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Constant;

class Role {
    public static function RoleAccessUserActive()
    {
        if (Auth::user()->status != Constant::Active) {
            abort(403, 'Not Authorized');
        }
    }

    public static function RoleAccessAdmin()
    {
        if (Auth::user()->role_id != Constant::RoleAccessAdmin && Auth::user()->role_id != Constant::RoleOwner && Auth::user()->role_id != Constant::RoleManager) {
            abort(403, 'Not Authorized');
        }
    }

    public static function RoleSuperAdmin()
    {
        if (Auth::user()->role_id != Constant::RoleAccessAdmin) {
            return false;
        }
        return true;
    }

    public static function RoleAdmin()
    {
        if (Auth::user()->role_id != Constant::RoleAccessAdmin && Auth::user()->role_id != Constant::RoleOwner && Auth::user()->role_id != Constant::RoleManager) {
            return false;
        }
        return true;
    }

    public static function RoleUserActive()
    {
        if (Auth::user()->status == Constant::Active) {
            return true;
        }
        return false;
    }
}
