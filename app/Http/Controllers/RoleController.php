<?php



namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    //
    public function index()
    {

        return view('admin.roles.index', ['roles' => Role::all()]);
    }

    public function create()
    {


        return view('admin.roles.create');
    }

    public function store()
    {
        // code to verify name field is not blank
        request()->validate([
            'name' => ['required']
        ]);

        // code makes name first letter upper case, slug is lower case and has dashes between words
        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')

        ]);
        // creates message - also code on top of role.index.php file
        session()->flash('role-created', 'New role has been created: ');

        return redirect()->route('roles.index');
    }


    public function edit(Role $role)
    {

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role)
    {

        // code to verify name field is not blank
        request()->validate([
            'name' => ['required']
        ]);

        // $role = Role::find($id);

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');
        // code detects if any change was actually made to name field
        if ($role->isDirty('name')) {

            // creates message if role was or was not changed - also code on top of role.index.php file
            session()->flash('role-updated', 'Role has been updated: ' . $role->name);
            $role->save();
        } else {
            session()->flash('role-updated', 'No changes made to this role: ' . $role->name);
        }

        return redirect()->route('roles.index');
    }

    public function attach(Role $role)
    {

        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach(Role $role)
    {

        $role->permissions()->detach(request('permission'));
        return back();
    }


    public function destroy(Role $role)
    {

        $role->delete();
        // creates message - also code on top of role.index.php file
        session()->flash('role-deleted', 'Role has been deleted: ' . $role->name);

        return back();
    }
}
