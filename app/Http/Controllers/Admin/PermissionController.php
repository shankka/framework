<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * 列表页
     */
    public function index()
    {
        $query = Permission::query();
        $permissions = $query->paginate();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Create page
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store Handler
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1',
            'display_name' => 'required|min:1',
        ]);

        try {
            $permission = Permission::create([
                'name'=>$request->get('name'),
                'display_name'=>$request->get('display_name'),
                'guard_name'=>'admin',
            ]);

            \Session::flash('角色创建成功.');
            return redirect()->route('admin.permissions.index');
        } catch (\Exception $e) {
            \Session::flash()->error('角色创建失败，'.$e->getMessage());
            return back();
        }
    }

    /**
     * Edit page
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update handler
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //'name' => 'required|min:1',
            'display_name' => 'required|min:1',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->fill([
            //'name'=>$request->get('name'),
            'display_name'=>$request->get('display_name'),
        ]);

        try {
            $permission->save();
            \Session::flash('权限信息修改成功.');
            return redirect()->route('admin.permissions.index');
        } catch (\Exception $e) {
            \Session::flash('权限信息修改失败，'.$e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        //将有该权限的角色，先移除权限
        $roles = Role::permission($permission)->get();
        foreach ($roles as $role) {
            $role->removePermission($permission->name);
        }

        if ($permission->delete()) {
            \Session::flash('权限删除成功');
        } else {
            \Session::flash('权限删除失败');
        }

        return redirect()->back();
    }
}
