@extends('layouts.app')

@section('content')
<div class="container pt-5" style="height: 100vh">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">


                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h1>{{$employee->first_name . " " . $employee->last_name}}</h1>
                        </div>
                        <div class="col-9">
                            <a href="{{$employee->id .'/edit'}}" class="btn btn-primary mr-1">Edit</a>
                            <a href="{{$employee->id .'/delete'}}" class="btn btn-danger mr-1">Delete</a>
                        </div>
                    </div>
                </div>


                <div class="card-body row">

                    <div class="col-12">
                        <p>First name: {{$employee->first_name}}</p>
                        <p>Last name: {{$employee->last_name}}</p>
                        <p>Email: {{$employee->email}}</p>
                        <p>Phone: {{$employee->phone}}</p>
                        <p>Company: {{$employee->company->name}}</p>
                    </div>

                </div> {{-- end card body --}}

            </div>
        </div>
    </div>
</div>
@endsection
