@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Edit Notification <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.notification.update') }}" enctype="multipart/form-data">
			@csrf
			<input type='hidden' name='id' value="{{ $notification->id }}">
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Title</label>
					<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$notification['title']) }}" autocomplete="title" autofocus>
					@error('title')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Image
						@if(!empty($notification['image_url']))
							<a href="{{ $notification->image_url }}">| Download</a>	
						@endif
					</label>
					<div class="custom-file">
					  <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
					  <label class="custom-file-label" for="customFile">Choose file</label>
					</div>
					@error('image')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">
				  <div class="form-group">
					<label for="name">Message</label>
					<textarea id="message" rows="3" cols="10" class="form-control @error('message') is-invalid @enderror" name="message" autofocus>{{ old('message',$notification['message']) }}</textarea>
					@error('message')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Status</label><br/>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" name="status" class="form-check-input" value="1" @if($notification->status == 1) checked @endif>Active
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" name="status" class="form-check-input" value="0" @if($notification->status == 0) checked @endif>Deactive
					  </label>
					</div>
					@error('status')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
			  </div>			
			</div>
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Update</button>
			</div>
		  </form>
		</div>
		</div>
	  <div class="col-md-6">

	  </div>
	</div>
  </div>
</section>
@endsection
@section('pagejs')
	<script src="{{ asset('dist/js/uploadname.js') }}"></script>
@endsection