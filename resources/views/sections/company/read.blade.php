@extends('layouts.app')

@section('content')
<div class="container pt-5" style="height: 100vh">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">


                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h1>{{$company->name}}</h1>
                        </div>
                        <div class="col-9">
                            <a href="{{$company->id .'/edit'}}" class="btn btn-primary mr-1">Edit</a>
                            <a href="{{$company->id .'/delete'}}" class="btn btn-danger mr-1">Delete</a>
                        </div>
                    </div>
                </div>


                <div class="card-body row">

                    <div class="col-2">
                        <img src="{{$company->logo}}" height='100px' weight='100px'>
                    </div>
                    <div class="col-10">
                        <p>Name: {{$company->name}}</p>
                        <p>Email: {{$company->email}}</p>
                        <p>Website: {{$company->website}}</p>
                    </div>

                </div> {{-- end card body --}}

            </div>
        </div>
    </div>
</div>
@endsection
