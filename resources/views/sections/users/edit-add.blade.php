@extends('layouts.app')

@section('styles')
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}
@endsection

@section('style')

@endsection

@section('content')
<div class="container-fluid pt-5" style="height: 100vh">
    <div class="row justify-content-start">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    @if(isset($user))
                        Edit User
                    @else
                        Create User
                    @endif
                </div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="@if(isset($user))/user/{{ $user->id }}@else/user @endif"
                        enctype="multipart/form-data" method="POST">

                        @csrf

                        @if(isset($user))
                            <input name="_method" type="hidden" value="PATCH">
                        @endif

                        <div class="row">

                            <div class="form-group col-lg-6">
                                <label for="name" class="form-control-label">Name</label>
                                <input class="form-control" type="text"
                                    value="@if(isset($user)){{ $user->name }}@endif" name="name"
                                    id="name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control" type="text"
                                    value="@if(isset($user)){{ $user->email }}@endif" name="email"
                                    id="email">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="password" class="form-control-label">Password</label>
                                <input class="form-control" type="password"
                                    value="@if(isset($user)){{ $user->email }}@endif" name="password"
                                    id="password">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="confirm_password" class="form-control-label">Confirm Password</label>
                                <input class="form-control" type="password"
                                    value="@if(isset($user)){{ $user->email }}@endif" name="confirm_password"
                                    id="confirm_password">
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label for="company" class="form-control-label">Roles</label>
                                <select name="company_id" class="form-control" id="company">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                              

                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection
