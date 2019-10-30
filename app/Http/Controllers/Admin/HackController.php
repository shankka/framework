<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class HackController extends Controller
{
    public function index()
    {
        $login_user = Auth::guard('admin')->user();
        $admins = Admin::pluck('nickname', 'id');
        return view('admin.hack.index', compact('admins', 'login_user'));
    }

    public function login(Request $request)
    {
        $login_user = $request->get('login_user');
        $admin = Admin::findOrFail($login_user);

        Auth::guard('admin')->attempt([
            'nickname' => $admin->nickname, 
            'password' => $admin->account
        ]);

        return redirect()->route('admin.home');
    }
}
