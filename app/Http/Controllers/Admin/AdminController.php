<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Index page
     */
    public function index()
    {
        // dd(\Auth::guard('admin')->user()->permissions);
        $query = Admin::query();

        $admins = $query->paginate();

        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Create page
     */
    public function create(Admin $admin)
    {
        return view('admin.admin.create', compact('admin'));
    }

    /**
     * Store Handler
     */
    public function store(AdminRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);

        $admin = new Admin();
        $admin->updateHandle($request);

        if ($admin->save()) {
            // @todo flash success
            return redirect()->route('admin.admins.index');
        } else {
            // @todo flash fail
            return back();
        }
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
            // @todo flash fail
            return back();
        }
    }

    public function assignRoles(Request $request)
    {
        $id = $request->get('id');
        $admin = Admin::findOrFail($id);

        $roles = $admin->getRoleNames();
        $admin_roles = [];
        foreach ($roles as $role_name) {
            $admin_roles[] = $role_name;
        }

        $all_roles = Role::pluck('display_name', 'name');
        return view('admin.admin.assignRoles', compact('admin', 'admin_roles', 'all_roles'));
    }

    public function assignRolesSave(Request $request)
    {
        $id = $request->get('id');
        $admin = Admin::findOrFail($id);

        $roles = $request->get('roles_id');
        try {
            $admin->syncRoles($roles);
            return redirect()->route('admin.admins.index');
        } catch (\Exception $e) {
            // @todo do nothing?
            return redirect()->back();
        }
    }
}
