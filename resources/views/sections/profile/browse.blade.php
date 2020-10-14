@extends('layouts.app')

@section('content')
<div class="container pt-5" style="height: 100vh">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body row">

                    <div class="col-12">
                        <p>Name: {{$user->name}}</p>
                        <p>Email: {{$user->email}}</p>
                        <p>User Roles: 
                            @foreach ($user->roles as $role)
                                {{$role->name . ", "}}
                            @endforeach
                        </p>

                        <input type="file" name="profile_img" id="">
                    </div>

                </div> {{-- end card body --}}

            </div>
        </div>
    </div>
</div>
@endsection
