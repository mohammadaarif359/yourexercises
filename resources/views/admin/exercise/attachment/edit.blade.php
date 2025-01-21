@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
	  	<div class="card-header">
			<h3 class="card-title">Edit Exercise  Image<small></small></h3>
		</div>
		<form role="form" id="quickForm" method="POST" action="{{ route('admin.exercise.attachment.update') }}" enctype="multipart/form-data">
		    @csrf
			<div class="card-body">
			  <div class="row">
				<input type='hidden' name='id' value="{{ $data->id }}">
			    <div class="col-md-4">        
					<div class="form-group">
					  <label for="name">Upload Image
						@if(!empty($data->image_url))
							<a href="{{ $data->image_url }}" target='_blank'>| Download</a>	
						@endif
					  </label>
					  <div class="custom-file">
						<input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
						<label class="custom-file-label" for="image">Choose file</label>
					  </div>
					  @error('image')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					  @enderror
					  @error('id')
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
					    <button type="submit" class="btn btn-primary">Update</button>
                      </div>			
                    </div>	
				</div>
			  </div>
            </div>
        </form>
	  </div>
	</div>
 </div>	
</section>
@endsection
@section('pagejs')
<script src="{{ asset('dist/js/uploadname.js') }}"></script>
@endsection