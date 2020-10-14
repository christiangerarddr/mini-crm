@extends('layouts.app')

@section('styles')
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}
@endsection

@section('style')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection

@section('content')
<div class="container-fluid pt-5" style="height: 100vh">
    <div class="row justify-content-start">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    @if(isset($employee))
                        Edit Employee
                    @else
                        Create Employee
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

                    <form action="@if(isset($employee))/employee/{{ $employee->id }}@else/employee @endif"
                        enctype="multipart/form-data" method="POST">

                        @csrf

                        @if(isset($employee))
                            <input name="_method" type="hidden" value="PATCH">
                        @endif

                        <div class="row">

                            <div class="form-group col-lg-6">
                                <label for="first_name" class="form-control-label">First Name</label>
                                <input class="form-control" type="text"
                                    value="@if(isset($employee)){{ $employee->first_name }}@endif" name="first_name"
                                    id="first_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="last_name" class="form-control-label">Last Name</label>
                                <input class="form-control" type="text"
                                    value="@if(isset($employee)){{ $employee->last_name }}@endif" name="last_name"
                                    id="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control" type="text"
                                    value="@if(isset($employee)){{ $employee->email }}@endif" name="email" id="email">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="phone" class="form-control-label">Phone Number</label>
                                <input class="form-control" type="text"
                                    value="@if(isset($employee)){{ $employee->phone }}@endif" name="phone" id="phone">
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label for="company" class="form-control-label">Company</label>
                                <select name="company_id" class="form-control" id="company">
                                    @if(isset($employee))
                                    <option value="{{$employee->company_id}}">{{$employee->company->name}}</option>
                                    @endif
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
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
