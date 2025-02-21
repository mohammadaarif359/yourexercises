@extends('web_new.layouts.main')

@section('content')
    <div class="main-section mb-5">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">See Over in action</h1>
                    <p class="paragraph cl-dblue">
                        Watch our demo reel or book a live demo.
                    </p>
                </div>
            </div>
            <div class="row mt-5 justify-content-between">
                <div class="col-md-6 demo-section" data-aos="fade-right" data-aos-duration="1000">
                    <h2>
                        Book a Demo
                    </h2>
                    <form id='demo-inquiry-form' name='demo-inquiry-form' method='POST'>
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
                            <label class="form-label" name="city" for="city">Your City</label>
                            <div class="select-wrapper">
                                <select class="form-select" id="city">
                                    <option selected>Select City</option>
                                    @foreach(config('custom.canada_city') as $k=> $val)
                                        <option value="{{ $k }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block" id="error_city"></span>
                            </div>
                        </div>
                        {{--<div class="mb-2">
                            <label class="form-label" for="clinic-address">Clinic Address</label>
                            <textarea class="form-control" id="clinic_address" placeholder="Enter clinic address" rows="2" required></textarea>
                            <span class="error-helper" id="clinic_address-error"></span>
                        </div>--}}
                        <div class="mt-2 mb-1 justify-content-start">
                            <button class="ps-btn md-btn outline-btn text-end" type="submit" id='demo-inquiry-btn'>Book Now</button>
                            <p class='demo-message' style='font-size:12pt;'></p>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 video-section">
                    <h3 class="paragraph-lg cl-dblue">
                        Pre-Recorded Demo
                    </h3>
                    <img alt="Laptop with charts and play button overlay"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCvurmd9sKtU3LnZ7XHuUjrBIf8qMPCXlxCw&s" />
                </div>
            </div>
            <section class="testimonial-section mt-4 rounded">
                <div class="container">
                    <blockquote class="m-0 cl-white">
                        "Your Exercises Family, you guys are really awesome. Keep the amazing new features coming."
                        <footer>
                            - Auto Solutions Best Practice Summit 2020
                        </footer>
                    </blockquote>
                </div>
            </section>
            <div class="content-section my-5" data-aos="fade-up" data-aos-duration="1000">
                <h3 class="paragraph-xxl cl-dblue">
                    We want to let you in on a little secret... Your Exercises has no sales team.
                    <span>
                        ðŸ‘Œ
                    </span>
                </h3>
                <p>
                    It's something that we're proud of. In fact, our growth has been primarily fueled through
                    word-of-mouth
                    referrals since our inception.
                </p>
                <p>
                    <strong>
                        Why does this matter?
                    </strong>
                    We ditched the traditional way of selling so that we could devote our time &amp; effort towards
                    building an
                    incredible product &amp; compassionate team of customer support reps who know Your Exercises better than
                    anyone in the
                    world. In other words, we play no games, and absolutely no pressure. That's just not us. So, let's
                    each grab
                    a cup of tea, coffee, or hot chocolate, and have a casual chat about what you need to create a
                    thriving
                    business.
                </p>
                <p>
                    <strong>
                        If you don't have time for a chat with us,
                    </strong>
                    that's okay. You can check out the pre-recorded demo instead.
                </p>
                <p>
                    All appointments are remote, using screen shares.
                    <br />
                    If you'd like to watch an overview of Your Exercises before you demo, you can watch the videos
                    <a href="#">
                        here
                    </a>
                    .
                </p>
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
		$('#demo-inquiry-btn').html('Book Now <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
		$.ajax({
			type: 'POST',
			url: "{{ route('demo-inquiry') }}",
			data: $("#demo-inquiry-form").serialize(),
			success: function (data) {
				$("#demo-inquiry-form .error-helper").html('');
				$('.demo-message').html();
                $('.demo-message').removeClass(['text-success','text-danger']);
				$("#demo-inquiry-btn").prop("disabled", false);
				$('#demo-inquiry-btn').html('Book Now');
				if (data.error) {
                    $.each(data.error, function (key, val) {
						$.each(val, function (k, v) {
							$("#demo-inquiry-form #error_" + key).html(v);
						});
					});
				} else if(data.code === 200) {
						// toastr.success(data.message);
                        $('.demo-message').addClass('text-success');
                        $('.demo-message').html(data.message);
						setTimeout(()=>{
							window.location.href = "{{ route('book-a-demo') }}";
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

    