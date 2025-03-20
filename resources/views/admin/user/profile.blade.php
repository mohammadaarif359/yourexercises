@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Doctor Profile <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.user.update') }}" enctype="multipart/form-data">
			@csrf
			<input type='hidden' name='id' value="{{ $data->id }}">
			<div class="card-body">
			    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Clinic Name</label>
                            <input type="text" name="clinic_name" class="form-control @error('clinic_name') is-invalid @enderror" id="clinic_name" value="{{ old('clinic_name', $data['clinic_name'] ?? '') }}">
                            @error('clinic_name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"for="slug">Clinic Slug</label>
                            <input type="text" name="slug" class="form-control @error('clinic_name') is-invalid @enderror" id="slug" value="{{ old('slug', $data['slug'] ?? '') }}" @if($data && $data['slug'])) readonly @endif>
                            @error('slug')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Clinic Logo
                                @if(!empty($data['logo_url']))
                                    <a href="{{ $data['logo_url'] }}">| Download</a>	
                                @endif
                            </label>
                            <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="logo">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('logo')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Clinic Image
                                @if(!empty($data['image_url']))
                                    <a href="{{ $data['image_url'] }}">| Download</a>	
                                @endif
                            </label>
                            <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('image')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"for="clinic_address">Clinic Address</label>
                            <textarea name="clinic_address" class="form-control @error('clinic_address') is-invalid @enderror" id="clinic_address" rows='3'>{{ old('clinic_address', $data['clinic_address'] ?? '') }}</textarea>
                            @error('clinic_address')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows='3'>{{ old('description', $data['description'] ?? '') }}</textarea>
                            @error('description')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>
                    
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
                            <label for="name"for="clinic_phone_no">Clinic Phone no</label>
                            <input type="text" name="clinic_phone_no" class="form-control @error('clinic_phone_no') is-invalid @enderror" id="clinic_phone_no" placeholder="Enter your clinic phone"
                                value="{{ old('clinic_phone_no', $data['clinic_phone_no'] ?? '') }}">
                            @error('clinic_phone_no')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Add youself in YE directory</label><br/>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ye_directory" class="form-check-input" value="1" @if(old('ye_directory', $data['ye_directory']) == 1) checked @endif>Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="ye_directory" class="form-check-input" value="0" @if(old('ye_directory', $data['ye_directory']) == 0) checked @endif>No
                                </label>
                            </div>
                            @error('ye_directory')
                                <span class="error invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h5 class="mb-2">Professional Info</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"  for="specialization">Specialization</label>
                            <input type='text' name="professional_info[specialization]" class="form-control" id="specialization" placeholder="" 
                                value="{{ old('professional_info[specialization]', $data['professional_info']['specialization'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_specialization"></span>
                        </div>
                    </div>    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"  for="experience">Experience</label>
                            <input type='text' name="professional_info[experience]" class="form-control" id="experience" placeholder=""
                                value="{{ old('professional_info[experience]', $data['professional_info']['experience'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_experience"></span>
                        </div>
                    </div>    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"  for="qualification">Qualification</label>
                            <textarea name="professional_info[qualification]" class="form-control" id="qualification" placeholder="" rows='3'>{{ old('professional_info[qualification]', $data['professional_info']['qualification'] ?? '') }}</textarea>
                            <span class="error invalid-feedback"id="error_qualification"></span>
                        </div>
                    </div>   

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"  for="affiliations">Affiliations</label>
                            <textarea name="professional_info[affiliations]" class="form-control" id="affiliations" placeholder="" rows='3'>{{ old('professional_info[affiliations]', $data['professional_info']['affiliations'] ?? '') }}</textarea>
                            <span class="error invalid-feedback"id="error_affiliations"></span>
                        </div>
                    </div>    
                </div>
                <h5 class="mb-2">Soical Media Profile</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" for="facebook">Facebook</label>
                            <input type='text' name="social_media[facebook]" class="form-control" id="facebook" placeholder="" 
                                value="{{ old('social_media[facebook]', $data['social_media']['facebook'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_facebook"></span>
                        </div>
                    </div>    

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" for="instagram">Instagram</label>
                            <input type='text' name="social_media[instagram]" class="form-control" id="instagram" placeholder=""
                                value="{{ old('social_media[instagram]', $data['social_media']['instagram'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_instagram"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" for="linkedin">Linkedin</label>
                            <input type='text' name="social_media[linkedin]" class="form-control" id="linkedin" placeholder=""
                                value="{{ old('social_media[linkedin]', $data['social_media']['linkedin'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_linkedin"></span>
                        </div>
                    </div>    

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" for="pinterest">Pinterest</label>
                            <input type='text' name="social_media[pinterest]" class="form-control" id="pinterest" placeholder=""
                                value="{{ old('social_media[pinterest]', $data['social_media']['pinterest'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_pinterest"></span>
                        </div>
                    </div>    

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" for="pinterest">Youtube</label>
                            <input type='text' name="social_media[youtube]" class="form-control" id="youtube" placeholder=""
                                value="{{ old('social_media[youtube]', $data['social_media']['youtube'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_youtube"></span>
                        </div>
                    </div>    

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" for="tiktok">Tiktok</label>
                            <input type='text' name="social_media[tiktok]" class="form-control" id="tiktok" placeholder=""
                                value="{{ old('social_media[tiktok]', $data['social_media']['tiktok'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_tiktok"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" for="threads">Threads</label>
                            <input type='text' name="social_media[threads]" class="form-control" id="threads" placeholder=""
                                value="{{ old('social_media[threads]', $data['social_media']['threads'] ?? '') }}">
                            <span class="error invalid-feedback"id="error_threads"></span>
                        </div>
                    </div>    
                </div>
			</div>
			<div class="card-footer">
              {{--<button type="submit" class="btn btn-primary">Update</button>--}}
			</div>
		  </form>
          <form method="POST" action="{{ route('admin.user.profile.verify') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $data->user_id }}">
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Verify Profile</button>
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