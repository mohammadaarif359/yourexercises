@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Notifications</h3>
		  <div class="card-tools">
			  <div class="d-flex flex-row justify-content-center">			  
				  <form class="filter-form" method="get">
					  <div class="input-group input-group-sm m-0" style="width: 150px;">
						<input type="text" name="keyword" value="{{ old('keyword',$keyword) }}"class="form-control float-right" placeholder="Search">
						<div class="input-group-append">
						  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
						</div>
					  </div>
				  </form>
				  <a href="{{ route('admin.notification.add') }}" class="btn btn-primary btn-sm ml-2">Add</a>
			  </div>	
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<div class="load_area table-responsive">
				<table class="table table-striped text-nowrap">
					<thead>
						<tr>
							<th>Title</th>
							<th>Message</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($notifications as $data)
						<tr>
							<td>{{ $data->title }}</td>
							<td>{{ $data->message }}</td>
							<td>{!! ($data->status == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">Inactive</span>' !!}</td></td>
							<td>{{ date('d-m-Y h:i:A',strtotime($data->created_at)) }}</td>
							<td class="">
								<a href="{{ route('admin.notification.edit',$data->id) }}" class="" title="Edit"><i class="fa fa-edit"></i></a>
								<a href="{{ route('admin.notification.delete',$data->id) }}" class="" title="Delete"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tfoot>
				</table>
				<hr>
				<div class="row m-auto">
					<div class="col-sm-4">
						<div class="record-text">Showing {{$notifications->firstItem()}} to {{$notifications->lastItem()}} of {{$notifications->total()}} entries</div>
					</div>
					<div class="col-sm-8">
						<div class="paginate pagination-sm float-right">
							{{  $notifications->appends(request()->input())->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
  </div>	
</section>
@endsection
