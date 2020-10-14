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

					<div class="row">

						<div class="col-lg-2">
							<h1>Employees</h1>
						</div>
					
						<div class="col-lg-6">
							<a href="{{route('employee.create')}}"><button class="btn btn-success">create</button></a>
						</div>

					</div>

				</div>

                <div class="card-body">
					
					<table id="employees-table" class="table table-hover ">
						<thead class="thead-light">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Company</th>
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

			$('#employees-table').DataTable({
				processing: true,
				serverSide: server_side,
				ajax: '{{ route('employees.all') }}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'first_name', name: 'first_name' },
					{ data: 'last_name', name: 'last_name' },
					{ data: 'email', name: 'email' },
					{ data: 'phone', name: 'phone' },
					{ data: 'company', name: 'company' },
					{ data: 'actions', name: 'actions' , orderable: false, searchable: false}
				]
			});
			

		} );
	</script>

@endsection