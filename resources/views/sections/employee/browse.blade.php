@extends('layouts.app')

@section('styles')
	{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}
@endsection

@section('content')
<div class="container" style="height: 100vh">
	<div class="row justify-content-start">
		<div class="col-md-12">
			
			<div class="card">
                <div class="card-header">
					Company
					
					<span class="float-right">
					<a href="{{route('employee.create')}}"><button class="btn btn-sm btn-success">create</button></a>
					</span>

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

					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input client-side-rendering" id="customSwitch1">
						<label class="custom-control-label" for="customSwitch1">Client Side Rendering</label>
					</div>

                </div>
            </div>
			
			

		</div>
	</div>
</div>
@endsection

@section('javascript')
	
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready( function () {

			$('#employees-table').DataTable({
				processing: true,
				serverSide: my_switch,
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