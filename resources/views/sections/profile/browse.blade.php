@extends('layouts.app')

@section('content')
<div class="container" style="height: 100vh">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body row">

                    <div class="col-6">
                        <p>Name: {{$user->name}}</p>
                        <p>Email: {{$user->email}}</p>
                        <p>User Roles: 
                            @foreach ($user->roles as $role)
                                {{$role->name . ", "}}
                            @endforeach
                        </p>
                    </div>

                    <div class="col-6">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>

                </div> {{-- end card body --}}

            </div>
        </div>
    </div>
</div>
@endsection
