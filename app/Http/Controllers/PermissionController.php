<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permission')->only(['index']);
        $this->middleware('permission:edit permission')->only(['edit']);
        $this->middleware('permission:create permission')->only(['create', 'store']);
        $this->middleware('permission:delete permission')->only(['destroy']);
    }

    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:permissions|min:3',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission Added Successfully');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.create', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id . '|min:3',
        ]);

        $permission->update(['name' => $request->name]);

        return redirect()->route('permissions.index')->with('success', 'Permission Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $permission = Permission::find($request->id);

        if (!$permission) {
            return redirect()->back()->with('error', 'Permission not found');
        }

        $permission->delete();

        return redirect()->back()->with('success', 'Permission deleted successfully');
    }
}
