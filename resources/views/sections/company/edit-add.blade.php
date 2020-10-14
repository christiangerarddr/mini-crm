@extends('layouts.app')

@section('styles')
	{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}
@endsection

@section('content')
<div class="container-fluid pt-5" style="height: 100vh">
	<div class="row justify-content-start">
		<div class="col-md-12">
			
			<div class="card">
                <div class="card-header">
					<h1>
					@if(isset($company))
					Edit Company
					@else
					Create Company
					@endif
					</h1>
				</div>

                <div class="card-body">

					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					<form action="@if(isset($company))/company/{{$company->id}}@else/company @endif" enctype="multipart/form-data" method="POST">

						@csrf

						@if(isset($company))
							<input name="_method" type="hidden" value="PATCH">
						@endif

						<div class="form-group">
							<label for="example-text-input" class="form-control-label">Company Name</label>
							<input class="form-control" type="text" value="@if(isset($company)){{$company->name}}@endif" name="name" id="company-text-input">
						</div>
						<div class="form-group">
							<label for="example-search-input" class="form-control-label">Logo</label>
							<input class="form-control" type="file" name="logo" id="company-search-input">
						</div>
						<div class="form-group">
							<label for="example-email-input" class="form-control-label">Email</label>
							<input class="form-control" type="email" name="email" value="@if(isset($company)){{$company->email}}@endif" id="company-email-input">
						</div>
						<div class="form-group">
							<label for="example-url-input" class="form-control-label">Website</label>
							<input class="form-control" type="text" name="website" value="@if(isset($company)){{$company->website}}@endif" id="company-url-input">
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

	<script>
		$(document).ready( function () {

		} );
	</script>

@endsection