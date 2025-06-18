@extends('web_new.layouts.main')

@section('content')
    <div class="main-section mb-5">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Get in Touch with Us</h1>
                    <p class="paragraph cl-dblue">
                    Have questions about your fitness journey? Reach out to us for support, guidance, or to book a free consultation.
                    </p>
                </div>
            </div>
            <div class="row mt-5 justify-content-between">
                <div class="col-md-6 demo-section" data-aos="fade-right" data-aos-duration="1000">
                    <h2>
                        Have Query
                    </h2>
                    <form id='demo-inquiry-form' name='demo-inquiry-form' method='POST'>
                        <input type="hidden" name="type" class="form-control" id="type" placeholder="" value='contact'>
                        <div class="mb-2">
                            <label class="form-label" for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name">
                            <span class="error-helper" id="error_name"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                            <span class="error-helper" id="error_email"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter your phone number">
                            <span class="error-helper" id="error_phone"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="preferred_time">Preferred Time</label>
                            <input type="datetime-local" name="preferred_time" class="form-control" id="preferred_time" required min="">
                            <span class="error-helper" id="error_preferred_time"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="designation">Your Designation</label>
                            <div class="select-wrapper">
                                <select class="form-select" name="designation" id="designation">
                                    <option value="" selected>Select Designation</option>
                                    @foreach(config('custom.designation') as $k=> $val)
                                        <option value="{{ $k }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <span class="error-helper" id="error_designation"></span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="clinic_name">Clinic Name</label>
                            <input type="text" name="clinic_name" class="form-control" id="clinic_name" placeholder="Enter clinic name">
                            <span class="error-helper" id="error_clinic_name"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" name="city" for="city">Your Provice or Territory</label>
                            <div class="select-wrapper">
                                <select class="form-select" name='city' id="city">
                                    <option selected>Select City</option>
                                    @foreach(config('custom.canada_city') as $k=> $val)
                                        <option value="{{ $k }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block" id="error_city"></span>
                            </div>
                        </div>
                        <div class="mt-2 mb-1 justify-content-start">
                            <button class="ps-btn md-btn outline-btn text-end" type="submit" id='demo-inquiry-btn'>Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 ps-dr-profile">
                    <div class="medical-actions mb-4 mt-1 pt-2">
                        <div class="section-title cl-dblue">Connect Us</div>
                        <ul class="p-0">
                            <li> <i class="fas fa-map-marker-alt"></i>Toronto, ON</li>
                            <li><i class="fas fa-phone"></i> (647) 890-2111</li>
                            <li><i class="fas fa-envelope"></i> info@yourexercises.com</li>
                        </ul>
                        <a class="ps-btn md-btn primary-btn mb-1 w-100 mt-1" href="tel:(647) 890-2111">Call to connect</a>
                    </div>
                </div>
            </div>
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
    document.getElementById('preferred_time').min = new Date().toISOString().slice(0, 16);

    $("#demo-inquiry-btn").click(function (e) {
		e.preventDefault();
        console.log('frm data', $("#demo-inquiry-form").serialize());
		$("#demo-inquiry-btn").prop("disabled", true);
		$('#demo-inquiry-btn').html('Submit <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
		$.ajax({
			type: 'POST',
			url: "{{ route('demo-inquiry') }}",
			data: $("#demo-inquiry-form").serialize(),
			success: function (data) {
				$("#demo-inquiry-form .error-helper").html('');
				$("#demo-inquiry-btn").prop("disabled", false);
				$('#demo-inquiry-btn').html('Submit');
				if (data.error) {
                    $.each(data.error, function (key, val) {
						$.each(val, function (k, v) {
							$("#demo-inquiry-form #error_" + key).html(v);
						});
					});
				} else if(data.code === 200) {
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });
                    setTimeout(()=>{
                        window.location.href = "{{ route('contact') }}";
                    },2000)
				} else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Something went wrong'
                    });
				}
			}
		});
	});
</script>
@endsection

    