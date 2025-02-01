@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Add Exercise <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.exercise.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<label>Category</label>
						<select class="select2 catgory_id @error('category_id') is-invalid @enderror" name="category_id[]" id="category_id" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
							@foreach($categories as $k => $val)
								<option value="{{ $k }}" {{ (is_array(old('category_id')) && in_array($k, old('category_id'))) ? 'selected' : '' }}>
									{{ $val }}
								</option>
							@endforeach
						</select>
						@error('category_id')
							<span class="error invalid-feedback">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="subcategory_id">Subcategory</label>
							<select class="select2 subcategory_id @error('subcategory_id') is-invalid @enderror" name="subcategory_id[]" id="subcategory_id" multiple="multiple" data-placeholder="Select a Subcategory" style="width: 100%;">
							</select>
							@error('subcategory_id')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
							@error('name')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">        
						<div class="form-group">
							<label for="image">Image</label>
							<div class="custom-file">
								<input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
								<label class="custom-file-label" for="image">Choose file</label>
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
							<label for="description">Description</label>
							<textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description') }}</textarea>
							@error('description')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="reps">Reps (Times)</label>
							<select id="reps" class="form-control @error('reps') is-invalid @enderror" name="reps">
								<option value='' selected>Select</option>
								@for($i=1;$i<=50;$i++)
									<option value="{{ $i }}" {{ old('reps') == $i ? 'selected' : '' }}>{{ $i }}</option>
								@endfor
							</select>
							@error('reps')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="hold">Hold (Seconds)</label>
							<select id="hold" class="form-control @error('hold') is-invalid @enderror" name="hold">
								<option value='' selected>Select</option>
								@foreach(config('custom.hold') as $k=> $val)
									<option value="{{ $k }}" {{ old('hold') == $k ? 'selected' : '' }}>{{ $val }}</option>
								@endforeach
							</select>
							@error('hold')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="complete">Complete (sets)</label>
							<select id="complete" class="form-control @error('complete') is-invalid @enderror" name="complete">
								<option value='' selected>Select</option>
								@for($i=1;$i<=20;$i++)
									<option value="{{ $i }}" {{ old('complete') == $i ? 'selected' : '' }}>{{ $i }}</option>
								@endfor
							</select>
							@error('complete')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="perform">Perform</label>
							<select id="perform" class="form-control @error('perform') is-invalid @enderror" name="perform">
								<option value='' selected>Select</option>
								@for($i=1;$i<=20;$i++)
									<option value="{{ $i }}" {{ old('perform') == $i ? 'selected' : '' }}>{{ $i }}</option>
								@endfor
							</select>
							@error('perform')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="times">Times</label>
							<select id="times" class="form-control @error('times') is-invalid @enderror" name="times">
								<option value='' selected>Select</option>
								@foreach(config('custom.times') as $k=> $val)
									<option value="{{ $k }}" {{ old('times') == $k ? 'selected' : '' }}>{{ $val }}</option>
								@endforeach
							</select>
							@error('times')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="is_active">Status</label><br/>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="radio" name="is_active" class="form-check-input" value="1" checked>Active
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="radio" name="is_active" class="form-check-input" value="0">Inactive
								</label>
							</div>
							@error('is_active')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="is_active">Prviate/Public</label><br/>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="radio" name="is_private" class="form-check-input" value="1" checked>Private
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="radio" name="is_private" class="form-check-input" value="0">Public
								</label>
							</div>
							@error('is_private')
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
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dist/js/uploadname.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@endsection
