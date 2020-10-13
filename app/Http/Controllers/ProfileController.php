<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        
        $user = User::find($id);

        return view("sections.profile.browse", compact("user"));

    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
