<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;

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

                $roles_to_text = implode($roles);

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
        //
    }

    public function store(Request $request)
    {

        $data = $this->validateRequest();

        User::create($data);

        // return redirect()->view('dashboard');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateRequest();

        User::find($id)->update($data);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }

    public function validateRequest(){

        return request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

    }

}
