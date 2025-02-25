@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Exercise</h3>
		  <div class="card-tools">
			  <div class="d-flex flex-row justify-content-center">			  
			  	  @include('admin.partial.list.search')
				  <a href="{{ route('admin.exercise.add') }}" class="btn btn-primary btn-sm ml-2">Add</a>
			  </div>	
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<div class="load_area table-responsive">
				<table class="table table-striped text-nowrap" id="myTable">
					<thead>
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Subcategory</th>
							<th>Status</th>
							<th>Private</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($results as $data)
						<tr>
							<td>{{ $data->name }}</td>
							@if($data->exercise_category)
								<td>
								@foreach($data->exercise_category as $cat)
									{{ $cat->category->name ?? "" }} ,
								@endforeach
								</td>
							@else
								<td></td>
							@endif	
							@if($data->exercise_category)
								<td>
								@foreach($data->exercise_category as $cat)
									{{ $cat->subcategory->name ?? "" }} ,
								@endforeach
								</td>
							@else
								<td></td>
							@endif
							<td>{!! ($data->is_active == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">Deactive</span>' !!}</td>
							<td>{!! ($data->is_private == 1)?'<span class="label label-success">Yes</span>':'<span class="label label-danger">No</span>' !!}</td>
							<td>{{ date('d-m-Y h:i:A',strtotime($data->created_at)) }}</td>
							<td class="">
								<a href="{{ route('admin.exercise.edit',$data->id) }}" class="" title="Edit"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						@endforeach
					</tfoot>
				</table>
				@include('admin.partial.list.pagination')
			</div>
		</div>
	  </div>
	</div>
  </div>	
</section>
@endsection