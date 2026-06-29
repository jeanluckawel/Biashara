<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('roles')->paginate(7);


        $roles = Role::all();


        return view('users.index',
            compact(
                'users',
                'roles'
            ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role'=>'required|nullable'

        ]);



        $user = User::create([

            'name'=>$request->name,

            'email'=>$request->email,

            'phone'=>$request->phone,

            'password'=>Hash::make($request->password),

        ]);



        $user->assignRole($request->role);



        return back()->with(
            'success',
            'User created successfully'
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $data = $request->validate([

            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'nullable',
            'role'=>'required'

        ]);



        $user->update([

            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],

        ]);



        if($request->filled('password')){

            $user->update([

                'password'=>bcrypt($request->password)

            ]);

        }



        $user->syncRoles($request->role);



        return back()->with(
            'success',
            'User updated successfully'
        );


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if(auth()->id() == $user->id){

            return back()->with(
                'error',
                'You cannot delete your own account'
            );

        }


        $user->delete();


        return back()->with(
            'success',
            'User deleted successfully'
        );

    }


}
