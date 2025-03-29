@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Patient Profile <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.doctor.user.profile.save') }}" enctype="multipart/form-data">
			@csrf
			<input type='hidden' name='id' value="{{ $data['id'] ?? ''}}">
            <input type='hidden' name='user_id' value="{{ $user_id }}">
			<div class="card-body">
			    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"for="gender">Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                                <option value="">Select Gender</option>
                                @foreach(config('custom.gender') as $k => $val)
                                    <option value="{{ $k }}" {{ old('gender',$data['gender'] ?? '') == $k ? 'selected' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" for="dob">Date of Birth</label>
                            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" id="dob" value="{{ old('dob', $data['dob'] ?? '') }}">
                            @error('dob')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"for="address">Address</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows='3'>{{ old('address', $data['address'] ?? '') }}</textarea>
                            @error('address')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"for="medical_history">Medical History</label>
                            <textarea name="medical_history" class="form-control @error('medical_history') is-invalid @enderror" id="medical_history" rows='3'>{{ old('medical_history', $data['medical_history'] ?? '') }}</textarea>
                            @error('description')
                                <span class="error invalid-feedback">{{ $message }}</span>
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
	</div>
  </div>
</section>
@endsection
@section('pagejs')
	<script src="{{ asset('dist/js/uploadname.js') }}"></script>
@endsection