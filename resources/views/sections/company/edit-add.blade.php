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
					Create New Company
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
					
					<form action="/company" enctype="multipart/form-data" method="POST">

						@csrf

						<div class="form-group">
							<label for="example-text-input" class="form-control-label">Company Name</label>
							<input class="form-control" type="text" value="John Snow" name="name" id="company-text-input">
						</div>
						<div class="form-group">
							<label for="example-search-input" class="form-control-label">Logo</label>
							<input class="form-control" type="file" name="logo" id="company-search-input">
						</div>
						<div class="form-group">
							<label for="example-email-input" class="form-control-label">Email</label>
							<input class="form-control" type="email" name="email" value="argon@example.com" id="company-email-input">
						</div>
						<div class="form-group">
							<label for="example-url-input" class="form-control-label">Website</label>
							<input class="form-control" type="url" name="website" value="https://www.test-website.com" id="company-url-input">
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