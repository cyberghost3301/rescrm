<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role')->only(['index']);
        $this->middleware('permission:edit role')->only(['edit']);
        $this->middleware('permission:create role')->only(['create', 'store']);
        $this->middleware('permission:delete role')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::orderBy('created_at', 'DESC')->paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|min:3',
        ]);

        $role = Role::create(['name' => $request->name]);

        if (!empty($request->permission)) {
            foreach ($request->permission as $name) {
                $role->givePermissionTo($name);
            }
        }

        return redirect()->route('roles.index')->with('success', 'Role Added Successfully');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::orderBy('name', 'ASC')->get();
        $haspermissions = $role->permissions->pluck('name');

        return view('roles.create', compact('role', 'permissions', 'haspermissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $id . '|min:3',
        ]);

        $role->update(['name' => $request->name]);

        $role->syncPermissions($request->permission ?? []);

        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $role = Role::find($request->id);

        if (!$role) {
            return redirect()->back()->with('error', 'Role not found');
        }

        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
