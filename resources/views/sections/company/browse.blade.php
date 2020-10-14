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
					Company
					
					<span class="ml-2">
					<a href="{{route('company.create')}}"><button class="btn btn-success">create</button></a>
					<a href="{{route('company.create')}}"><button class="btn btn-danger">mass delete</button></a>
					</span>

				</div>

                <div class="card-body">
					
					<table id="companies-table" class="table table-hover ">
						<thead class="thead-light">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Logo</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Website</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
					</table>

                </div>
            </div>
			
			

		</div>
	</div>
</div>
@endsection

@section('javascript')

	<script>
		$(document).ready( function () {

			var server_side = (sessionStorage.getItem("serverSideRender") == 1) ? true : false;

			$('#companies-table').DataTable({
				processing: true,
				serverSide: server_side,
				ajax: '{{ route('companies.all') }}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'logo', name: 'logo' },
					{ data: 'name', name: 'name' },
					{ data: 'email', name: 'email' },
					{ data: 'website', name: 'website' },
					{ data: 'actions', name: 'actions' , orderable: false, searchable: false}
				]
			});

		} );
	</script>

@endsection