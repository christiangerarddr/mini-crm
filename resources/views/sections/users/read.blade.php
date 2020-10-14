@extends('layouts.app')

@section('content')
<div class="container pt-5" style="height: 100vh">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h1>{{$user->name}}</h1>
                        </div>
                        <div class="col-9">
                            <a href="{{$user->id .'/edit'}}" class="btn btn-primary mr-1">Edit</a>
                            <a href="{{$user->id .'/delete'}}" class="btn btn-danger mr-1">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="card-body row">

                    <div class="col-12">
                        <p>First name: {{$user->name}}</p>
                        <p>Email: {{$user->email}}</p>
                        <p>Roles:  @foreach ($user->roles as $key => $role) @if(count($user->roles) > 1 && $key != 0), @endif {{$role->name}} @endforeach</p>
                    </div>

                </div> {{-- end card body --}}

            </div>
        </div>
    </div>
</div>
@endsection
