<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * 列表页
     */
    public function index()
    {
        $query = Role::query();
        $roles = $query->paginate();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Create page
     */
    public function create()
    {
        return view('admin.role.create');
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
            $role = Role::create([
                'name'=>$request->get('name'),
                'display_name'=>$request->get('display_name'),
                'guard_name'=>'admin',
            ]);

            \Session::flash('角色创建成功.');
            return redirect()->route('admin.roles.index');
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
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
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

        $role = Role::findOrFail($id);
        $role->fill([
            //'name'=>$request->get('name'),
            'display_name'=>$request->get('display_name'),
        ]);

        try {
            $role->save();
            \Session::flash('角色信息修改成功.');
            return redirect()->route('admin.roles.index');
        } catch (\Exception $e) {
            \Session::flash('角色信息修改失败，'.$e->getMessage());
            return back();
        }
    }

    // @todo 可使用模型绑定功能
    // public function destroy(Role $role)
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        //将有该角色的用户，先移除角色，再删除
        $users = User::role($role)->get();
        foreach ($users as $user) {
            $user->removeRole($role->name);
        }

        if ($role->delete()) {
            \Session::flash('角色删除成功');
        } else {
            \Session::flash('角色删除失败');
        }

        return redirect()->back();
    }

    public function assignPermissions(Request $request)
    {
        $id = $request->get('id');
        $role = Role::findOrFail($id);

        $permissions = $role->getAllPermissions('admin');
        $role_permissions = [];
        foreach ($permissions as $permission) {
            $role_permissions[] = $permission->id;
        }

        $all_permissions = Permission::pluck('display_name', 'id');
        return view('admin.role.assignPermissions', compact('role', 'role_permissions', 'all_permissions'));
    }

    public function assignPermissionsSave(Request $request)
    {
        $id = $request->get('id');
        $role = Role::findOrFail($id);

        $permissions_id = $request->get('permissions_id');
        $permissions = [];
        if ($permissions_id) {
            foreach ($permissions_id as $permission_id) {
                $permission = Permission::find($permission_id);
                $permissions[] = $permission->name;
            }
        }
        
        try {
            $role->syncPermissions($permissions);
            return redirect()->route('admin.roles.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
