@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
	  	<div class="card-header">
			<h3 class="card-title">Add Exercise  Image<small></small></h3>
		</div>
		<form role="form" id="quickForm" method="POST" action="{{ route('admin.exercise.attachment.store') }}" enctype="multipart/form-data">
		    @csrf
			<div class="card-body">
			  <div class="row">
				<input type='hidden' value="{{ $exercise_id }}" name="exercise_id">
			    <div class="col-md-4">        
					<div class="form-group">
					  <label for="image">Upload Images</label>
					  <div class="custom-file">
						<input type="file" name="image[]" class="custom-file-input @error('image.*') is-invalid @enderror" id="image" multiple>
						<label class="custom-file-label" for="image">Choose file</label>
					  </div>
					  @error('image.*')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					  @enderror
					  @error('exercise_id')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					  @enderror
					</div>
                </div>
				<div>	
                    <div class="col-md-4">
			          <div class="form-group">
					    <label for="image">.</label>
					    <button type="submit" class="btn btn-primary">Upload</button>
                      </div>			
                    </div>	
				</div>
			  </div>
            </div>
        </form>		
		<div class="card-header">
		  <h3 class="card-title">Exercise Image List</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="load_area table-responsive">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
                            <th>Name</th>
							<th>Preview</th>
							<th>Status</th>
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
<script src="{{ asset('dist/js/uploadname.js') }}"></script>
<script>
$(function () {
	var table = $('#example1').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.exercise.attachment',['exercise_id'=> $exercise_id]) }}",
        columns: [
            {data: 'image', name: 'image'},
			{data: 'image_url', name: 'image_url'},
			{data: 'status', name: 'status'},
            {data: 'created_at.display', name: 'created_at.display'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>	
@endsection