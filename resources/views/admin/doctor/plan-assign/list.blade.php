@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Plan Assign<small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.doctor.plan.assign.store',['plan_id'=> $plan_id]) }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
			  <div class="row">
			  	<div class="col-md-6">
					<div class="form-group">
						<label>Select Patient</label>
						<select class="select2 user_id @error('user_id') is-invalid @enderror" name="user_id[]" id="user_id" multiple="multiple" data-placeholder="Select Patient to assign plan" style="width: 100%;">
							@foreach($users as $k => $val)
								<option value="{{ $val->id }}" {{ (is_array(old('user_id')) && in_array($k, old('user_id'))) ? 'selected' : '' }}>
									{{ $val['name'] }} ({{ $val['email'] }})
								</option>
							@endforeach
						</select>
						@error('user_id')
							<span class="error invalid-feedback">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
			  </div>			
			</div>
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Assign</button>
			</div>
		  </form>
		</div> 
		<br/>
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Plan Assign List</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="load_area table-responsive">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Exercise Count</th>
							<th>Status</th>
							<th>Avg Rating</th>
							<th>Completed At</th>
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
			ajax: "{{ route('admin.doctor.plan.assign',['plan_id'=>$plan_id]) }}",
			columns: [
				{data: 'user_name', name: 'user_name'},
				{data: 'exercise_count', name: 'exercise_count'},
				{data: 'status', name: 'status'},
				{data: 'avg_rating', name: 'avg_rating'},
				{data: 'completed_at.display', name: 'completed_at.display'},
				{data: 'created_at.display', name: 'created_at.display'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});
		$('.filter-input').keypress(function(){
			table.column($(this).data('column'))
				.search($(this).val())
				.draw();
		});
		$('.filter-select').change(function(){
			table.column($(this).data('column'))
				.search($(this).val())
				.draw();
		});
  });
</script>	
@endsection