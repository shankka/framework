<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Index page
     */
    public function index()
    {
        $query = Admin::query();

        $admins = $query->paginate();

        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Create page
     */
    public function create(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Edit page
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update handler
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        if ($request->password) {
            $request->merge(['password' => bcrypt($request->password)]);
        } else {
            unset($request['password']);
        }

        $admin->updateHandle($request);

        if ($admin->save()) {
            // @todo flash success
            return redirect()->route('admin.admins.index');
        } else {
            // flash fail
            return back();
        }
    }
}
