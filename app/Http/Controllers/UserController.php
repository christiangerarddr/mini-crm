<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        dd('test');
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
