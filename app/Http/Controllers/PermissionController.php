<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    //
    public function index()
    {

        return view('admin.permissions.index', ['permissions' => Permission::all()]);
    }

    public function create()
    {


        return view('admin.permissions.create');
    }

    public function store()
    {
        // code to verify name field is not blank
        request()->validate([
            'name' => ['required']
        ]);

        // code makes name first letter upper case, slug is lower case and has dashes between words
        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')

        ]);
        // creates message - also code on top of permission.index.php file
        session()->flash('permission-created', 'New permission has been created: ');

        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {

        return view('admin.permissions.edit', [
            'permission' => $permission,

        ]);
    }

    public function update(Permission $permission)
    {

        // code to verify name field is not blank
        request()->validate([
            'name' => ['required']
        ]);



        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');
        // code detects if any change was actually made to name field
        if ($permission->isDirty('name')) {

            // creates message if permission was or was not changed - also code on top of permssion.index.php file
            session()->flash('permission-updated', 'Permission has been updated: ' . $permission->name);
            $permission->save();
        } else {
            session()->flash('permission-updated', 'No changes made to this permission: ' . $permission->name);
        }

        return redirect()->route('permissions.index');
    }



    public function destroy(Permission $permission)
    {

        $permission->delete();
        // creates message - also code on top of permission.index.php file
        session()->flash('permission-deleted', 'Permission has been deleted: ' . $permission->name);

        return back();
    }
}
