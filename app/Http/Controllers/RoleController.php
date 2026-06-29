<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //
    public function index()
    {

        $roles = Role::with('permissions')
            ->paginate(3);


        $permissions = Permission::all();



        return view('roles.index',
            compact(
                'roles',
                'permissions'
            )
        );

    }




    public function store(Request $request)
    {

        $request->validate([

            'name'=>'required|unique:roles,name'

        ]);



        Role::create([

            'name'=>$request->name,

            'guard_name'=>'web'

        ]);



        return back()->with(
            'success',
            'Role created successfully'
        );

    }







    public function update(Request $request, Role $role)
    {

        $request->validate([

            'name'=>'required'

        ]);



        $role->update([

            'name'=>$request->name

        ]);



        return back()->with(
            'success',
            'Role updated successfully'
        );

    }










    public function permissions(Request $request, Role $role)
    {

        $permissions = Permission::whereIn(
            'id',
            $request->permissions ?? []
        )->get();


        $role->syncPermissions($permissions);


        return back()->with(
            'success',
            'Permissions updated successfully'
        );

    }








    public function destroy(Role $role)
    {


        if($role->name == 'Admin'){

            return back()->with(
                'error',
                'Admin role cannot be deleted'
            );

        }



        $role->delete();



        return back()->with(
            'success',
            'Role deleted'
        );


    }

    public function updatePermissions(Request $request, Role $role)
    {

        $permissions = Permission::whereIn(
            'id',
            $request->permissions ?? []
        )->get();


        $role->syncPermissions($permissions);



        return back()->with(
            'success',
            'Permissions updated successfully'
        );

    }

}
