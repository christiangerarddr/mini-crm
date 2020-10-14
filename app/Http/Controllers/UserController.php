<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

use DataTables;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{

    public function showAll(){

        $users = User::query();
    
        return DataTables::eloquent($users)
            ->addColumn('role', function ($user) {
                $roles = [];
                foreach($user->roles as $value){
                    array_push($roles, $value->name);
                }



                $roles_to_text = ($roles > 1) ? implode(", ", $roles): $roles ;

                return$roles_to_text;
            })
            ->addColumn('actions', function($user) {

                $add_btn = '<a href="/user/'. $user->id .'/edit" class="btn btn-sm btn-primary mr-1">Edit</a>';
                $delete_btn = '<a href="/user/'. $user->id .'/delete" class="btn btn-sm btn-danger">Delete</a>';

                return  $add_btn . $delete_btn;
                
            })
            ->rawColumns(['actions'])
            ->toJson();

    }

    public function index()
    {
        return view('sections.users.browse');
    }

    public function create()
    {
        $roles = Role::all();

        return view('sections.users.edit-add', compact('roles'));

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(Request $request)
    {

        $data = $this->validateRequest();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->sync($request->roles);

        return redirect(route('user.index'));

    }

    public function edit($id)
    {
        $roles = Role::all();

        $user = User::find($id);

        return view('sections.users.edit-add', compact('roles', 'user'));
    }

    public function update(Request $request, $id)
    {

        User::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect(route('user.index'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect(route('user.index'));
    }

    public function validateRequest(){

        return request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

}
