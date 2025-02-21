@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Demo Inquiry</h3>
		  <div class="card-tools">
			  <div class="d-flex flex-row justify-content-center">			  
				  {{--<a href="{{ route('admin.inquiry.demo.export') }}" class="btn btn-primary btn-sm ml-2">Export</a>--}}
			  </div>	
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="load_area table-responsive">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phome</th>
							<th>Preferred Time</th>
                            <th>Designation</th>
                            <th>Clinic Name</th>
                            <th>City</th>
                            <th>Created At</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tfoot>
				</table>
			</div>
		</div>
	  </div>
	</div>
 </div>	
</section>
@endsection
@section('pagejs')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
	$(function () {
	var table = $('#example1').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.inquiry.demo') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'designation', name: 'designation'},
            {data: 'preferred_time', name: 'preferred_time'},
			{data: 'clinic_name', name: 'clinic_name'},
            {data: 'city', name: 'city'},
			{data: 'created_at.display', name: 'created_at.display'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>	
@endsection