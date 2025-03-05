@extends('web_new.layouts.main')

@section('content')
    <div class="main-section ps-singin mb-5">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Sign Up</h1>
                    <p class="paragraph cl-dblue">
                        It only takes a few minutes to register and get the benefit of Home Exerise .
                    </p>
                </div>
            </div>
            <!--<div class="tips-section mt-5">
                <h2 class="paragraph-xxl cl-dblue mb-4">Here's some tips for signing up with :</h2>
                <ul>
                    <li><i class="fas fa-check-circle"></i>If you're a client or patient and are looking to book an appointment
                        or join a video call, <a href="#">click here</a> to search for your practitioner's  account.</li>
                    <li><i class="fas fa-check-circle"></i>It's best to sign up with the business owner's contact info as this
                        will be 's primary contact for all billing and ownership purposes.</li>
                    <li><i class="fas fa-check-circle"></i>Make sure you have access to your business's email account so we can
                        send you a confirmation link.</li>
                    <li><i class="fas fa-check-circle"></i>You will need a VISA or Mastercard to open an account.</li>
                </ul>
                <button class="ps-btn lg-btn primary-btn  mb-3">Begin</button>
            </div>-->
            <div class="contact-section">
                <h2 class="paragraph-xxl cl-dblue mb-2">Still need to see  in action?</h2>
                <p class="mb-2">If you would like to watch a pre-recorded demo or book a live demo with the  team, <a href="#">click
                        here</a></p>
                <br/>        
                <div class='row'>   
                    <div class="col-md-6 register-section" data-aos="fade-right" data-aos-duration="1000">
                        <h5 class="paragraph-xl cl-dblue">Create an new account here</h5>
                        <hr/>
                        <form id='frm-register' name='frm-register' method='POST' enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name') }}">
                                    <span class="error-helper" id="error_name"></span>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="" autocomplete="off">
                                    <span class="error-helper" id="error_email"></span>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="mobile">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter your mobile" value="{{ old('mobile') }}">
                                    <span class="error-helper" id="error_mobile"></span>

                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="profile_photo">Profile Photo</label>
                                    <input type="file" name="profile_photo" class="form-control" id="profile_photo">
                                    <span class="error-helper" id="error_profile_photo"></span>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="" autocomplete="off">
                                    <span class="error-helper" id="error_password"></span>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="role">Role</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $k=>$v)
                                        <option value="{{ $k }}" {{ old('role') == $k ? 'selected' : '' }}>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-helper" id="error_role"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 justify-content-start">
                                    <button type="button" class="ps-btn lg-btn primary-btn" id='register-btn'>Register</button>
                                    <p class='demo-message' style='font-size:12pt;'></p>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-md-5 offset-md-1 d-flex justify-content-center align-items-center">
                        <div class="w-100 p-4 rounded shadow login-section">
                            <h4 class="paragraph-xl cl-dblue text-white">Already an account! Login here </h4>
                            <form class="mt-4" id='frm-login' name='frm-login' method='POST' action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{ old('email') }}" autocomplete="off">
                                        @error('email')
                                            <span class="error-helper">{{ $message }}</span>
                                        @enderror
                                        @error('authfailed')
                                            <span class="error-helper">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="{{ old('password') }}" autocomplete="off">
                                        <span class="error-helper" id="error_password"></span>
                                        @error('password')
                                            <span class="error-helper">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                                        <button type="submit" class="ps-btn lg-btn primary-btn">Login</button>
                                        <!--<a href="{{ route('admin.password.request') }}" class="text-primary">Forgot Password?</a>-->
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>    
            </div>
            <!--<div class="contact-section  mt-5">
                <h2 class="paragraph-xxl cl-dblue mb-2">Still need to see  in action?</h2>
                <p>If you would like to watch a pre-recorded demo or book a live demo with the  team, <a href="#">click
                        here</a>.</p>
                <form class="mt-4">
                    <div class="row">
                        <div class="col-sm-12 col-lg-7 p-0">
                            <div class="row">
                                <div class="col-md-6 p-0">
                                    <input type="text" class="form-control" placeholder="First Name *" required>
                                </div>
                                <div class="col-md-6 ps-paddingFix">
                                    <input type="text" class="form-control" placeholder="Last Name *" required>
                                </div>
                            </div>
                        <input type="email" class="form-control" placeholder="Email *" required>
                        <input type="text" class="form-control" placeholder="Clinic / Organization">
                        <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                        <p class="mb-2">Just to prove you're a human and not a robot, please answer the question below:</p>
                        <input type="text" class="form-control" placeholder="What color is an orange?" required>
                        <button type="submit" class="ps-btn lg-btn primary-btn">Submit</button>
                    </div>
                    </div>
                </form>
            </div>-->
        </div>
    </div>
@endsection
@section('pagejs')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $("#register-btn").click(function (e) {
        e.preventDefault();
        console.log('frm data', $("#frm-register").serialize());
		$("#register-btn").prop("disabled", true);
		$('#register-btn').html('Register <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
		$.ajax({
			type: 'POST',
			url: "{{ route('register') }}",
            data: new FormData($("#frm-register")[0]),
            processData: false,
			contentType: false,
			success: function (data) {
				$("#frm-register .error-helper").html('');
				$('.demo-message').html();
                $('.demo-message').removeClass(['text-success','text-danger']);
				$("#register-btn").prop("disabled", false);
				$('#register-btn').html('Register');
				if (data.error) {
                    $.each(data.error, function (key, val) {
						$.each(val, function (k, v) {
							$("#frm-register #error_" + key).html(v);
						});
					});
				} else if(data.code === 200) {
						// toastr.success(data.message);
                        $('.demo-message').addClass('text-success');
                        $('.demo-message').html(data.message);
						setTimeout(()=>{
							window.location.href = "{{ route('login') }}";
						},2000)
				} else {
					// toastr.error('Something went wrong');
                    $('.demo-message').addClass('text-danger');
                    $('.demo-message').html('Something went wrong');
				}
			}
		});
	});
</script>
@endsection
