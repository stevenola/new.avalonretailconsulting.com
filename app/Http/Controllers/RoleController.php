<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class RoleController extends Controller
{
    //
    public function index()
    {

        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function create()
    {


        return view('admin.roles.create');
    }

    public function store(Request $request)
    {

        $role = new Role([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),

        ]);



        $role->save();

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {


        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->slug = $request->get('slug');
        $role->save();

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {

        $role->delete();
        session()->flash('role-deleted', 'Role has been deleted');

        return back();
    }
}
