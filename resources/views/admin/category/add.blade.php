@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Add Category <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Name</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">
					@error('name')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label for="slug">Slug</label>
					<input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" autocomplete="name">
					@error('slug')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">
				  <div class="form-group">
					<label for="description">Description</label>
					<textarea id="description" rows='3' class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
					@error('description')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Image</label>
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
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Status</label><br/>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" name="is_active" class="form-check-input" value="1" checked>Active
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" name="is_active" class="form-check-input" value="0">Deactive
					  </label>
					</div>
					@error('is_active')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
			  </div>			
			</div>
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Create</button>
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