@extends('web_new.layouts.main')

@section('content')
    <div class="main-section ps-singin mb-5">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Doctor Profile</h1>
                    <p class="paragraph cl-dblue">
                        It only takes a few minutes to have your practice up and running with .
                    </p>
                </div>
            </div>
            <hr>
            <div class="contact-section  mt-5">
                <h2 class="paragraph-xxl cl-dblue">Still need to see  in action?</h2>
                <p>If you would like to watch a pre-recorded demo or book a live demo with the  team, <a href="#">click
                        here</a>.</p>
                <form class="mt-4" id='frm-doctor-profile' name='frm-doctor-profile' method='POST' action="{{ route('doctor.profile.save') }}" enctype="multipart/form-data">
			        @csrf
                    <input type='hidden' name='id' value="{{ old('id', $data['id'] ?? '') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="clinic_name">Clinic Name</label>
                            <input type="text" name="clinic_name" class="form-control" id="clinic_name" placeholder="Enter your clinic name" value="{{ old('clinic_name', $data['clinic_name'] ?? '') }}">
                            @error('clinic_name')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="slug">Clinic Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter your clinic page slug" value="{{ old('slug', $data['slug'] ?? '') }}">
                            @error('slug')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="logo">Clinic Logo
                            @if(!empty($data['logo_url']))
                                <a href="{{ $data['logo_url'] }}">| Download</a>	
                            @endif
                            </label>
                            <input type="file" name="logo" class="form-control" id="logo">
                            @error('logo')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="logo">Clinic Image
                            @if(!empty($data['image_url']))
                                <a href="{{ $data['image_url'] }}">| Download</a>	
                            @endif
                            </label>
                            <input type="file" name="image" class="form-control" id="image">
                            @error('image')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="clinic_address">Clinic Address</label>
                            <textarea name="clinic_address" class="form-control" id="clinic_address" placeholder="Enter clinic address" rows='3'>{{ old('clinic_address', $data['clinic_address'] ?? '') }}</textarea>
                            @error('clinic_address')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Enter description" rows='3'>{{ old('description', $data['description'] ?? '') }}</textarea>
                            @error('description')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="">Select Gender</option>
                                @foreach(config('custom.gender') as $k => $val)
                                    <option value="{{ $k }}" {{ old('gender',$data['gender'] ?? '') == $k ? 'selected' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="dob">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob', $data['dob'] ?? '') }}">
                            @error('dob')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="clinic_phone_no">Clinic Phone no</label>
                            <input type="text" name="clinic_phone_no" class="form-control" id="clinic_phone_no" placeholder="Enter your clinic phone"
                                value="{{ old('clinic_phone_no', $data['clinic_phone_no'] ?? '') }}">
                            @error('clinic_phone_no')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--<div class="col-md-6">
                            <label class="form-label" for="color_theme">Clinic Color Theme <span id='color_value'></span></label>
                            <input type="color" name="color_theme" class="form-control" id="color_theme" placeholder="Enter your color theme"
                                value="{{ old('color_theme', $data['color_theme'] ?? '') }}">
                            <span class="error-helper" id="error_color_theme"></span>
                        </div>-->
                    </div> 
                    <h5 class="paragraph-xl cl-dblue">Professional Info</h5>   
                    <hr/>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="specialization">Specialization</label>
                            <input type='text' name="professional_info[specialization]" class="form-control" id="specialization" placeholder="" 
                                value="{{ old('professional_info[specialization]', $data['professional_info']['specialization'] ?? '') }}">
                            <span class="error-helper" id="error_specialization"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="experience">Experience</label>
                            <input type='text' name="professional_info[experience]" class="form-control" id="experience" placeholder=""
                                value="{{ old('professional_info[experience]', $data['professional_info']['experience'] ?? '') }}">
                            <span class="error-helper" id="error_experience"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="qualification">Qualification</label>
                            <textarea name="professional_info[qualification]" class="form-control" id="qualification" placeholder="" rows='3'>{{ old('professional_info[qualification]', $data['professional_info']['qualification'] ?? '') }}</textarea>
                            <span class="error-helper" id="error_qualification"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="affiliations">Affiliations</label>
                            <textarea name="professional_info[affiliations]" class="form-control" id="affiliations" placeholder="" rows='3'>{{ old('professional_info[affiliations]', $data['professional_info']['affiliations'] ?? '') }}</textarea>
                            <span class="error-helper" id="error_affiliations"></span>
                        </div>
                    </div>
                    <h5 class="paragraph-xl cl-dblue">Soical Media Profile</h5>   
                    <hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="facebook">Facebook</label>
                            <input type='text' name="social_media[facebook]" class="form-control" id="facebook" placeholder="" 
                                value="{{ old('social_media[facebook]', $data['social_media']['facebook'] ?? '') }}">
                            <span class="error-helper" id="error_facebook"></span>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="instagram">Instagram</label>
                            <input type='text' name="social_media[instagram]" class="form-control" id="instagram" placeholder=""
                                value="{{ old('social_media[instagram]', $data['social_media']['instagram'] ?? '') }}">
                            <span class="error-helper" id="error_instagram"></span>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="linkedin">Linkedin</label>
                            <input type='text' name="social_media[linkedin]" class="form-control" id="linkedin" placeholder=""
                                value="{{ old('social_media[linkedin]', $data['social_media']['linkedin'] ?? '') }}">
                            <span class="error-helper" id="error_linkedin"></span>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="pinterest">Pinterest</label>
                            <input type='text' name="social_media[pinterest]" class="form-control" id="pinterest" placeholder=""
                                value="{{ old('social_media[pinterest]', $data['social_media']['pinterest'] ?? '') }}">
                            <span class="error-helper" id="error_pinterest"></span>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="pinterest">Youtube</label>
                            <input type='text' name="social_media[youtube]" class="form-control" id="youtube" placeholder=""
                                value="{{ old('social_media[youtube]', $data['social_media']['youtube'] ?? '') }}">
                            <span class="error-helper" id="error_youtube"></span>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="tiktok">Tiktok</label>
                            <input type='text' name="social_media[tiktok]" class="form-control" id="tiktok" placeholder=""
                                value="{{ old('social_media[tiktok]', $data['social_media']['tiktok'] ?? '') }}">
                            <span class="error-helper" id="error_tiktok"></span>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="threads">Threads</label>
                            <input type='text' name="social_media[threads]" class="form-control" id="threads" placeholder=""
                                value="{{ old('social_media[threads]', $data['social_media']['threads'] ?? '') }}">
                            <span class="error-helper" id="error_threads"></span>
                        </div>
                    </div>
                    <button type="submit" class="ps-btn lg-btn primary-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection    
@section('pagejs')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script>
    $('#clinic_name').on('blur', function() {
		var val = $('#clinic_name').val()
		var slug = val.trim().toLowerCase().replace(/\s+/g, '-')
		$('#slug').val(slug)
	});
    const colorPicker = document.getElementById("color_theme");
    const colorValue = document.getElementById("color_value");

    colorPicker.addEventListener("input", () => {
        colorValue.textContent = colorPicker.value;
    });
</script>
@endsection