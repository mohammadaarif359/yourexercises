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
                    {{--<form>
                        <div class="mb-4">
                            <label class="form-label" for="country">
                                What country are you in?
                            </label>
                            <select class="form-select p-dropdown" id="country">
                                <option selected="">
                                    Select a country 1
                                </option>
                                <option selected="">
                                    Select a country 2
                                </option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="discipline">
                                What kind of clinic or practitioner are you?
                            </label>
                            <select class="form-select p-dropdown" id="discipline">
                                <option selected="">
                                    Select a discipline
                                </option>
                                <option selected="">
                                    Select a discipline
                                </option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="d-flex justify-content-start">
                            <button class="ps-btn md-btn outline-btn text-end" type="submit">
                                Book Now
                            </button>
                        </div>
                    </form>--}}
                    <form>
                        <div class="mb-2">
                            <label class="form-label" for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
                            <span class="error-helper" id="name-error"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                            <span class="error-helper" id="email-error"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required>
                            <span class="error-helper" id="phone-error"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="preferred_time">Preferred Time</label>
                            <input type="datetime-local" class="form-control" id="preferred_time" required min="">
                            <span class="error-helper" id="preferred_time-error"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="country">Your Designation</label>
                            <div class="select-wrapper">
                                <select class="form-select" id="country">
                                    <option selected>Select Designation</option>
                                    @foreach(config('custom.designation') as $k=> $val)
                                        <option value="{{ $k }}">{{ $val }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="clinic_name">Clinic Name</label>
                            <input type="text" class="form-control" id="clinic_name" placeholder="Enter clinic name" required>
                            <span class="error-helper" id="clinic_name-error"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="clinic-address">Clinic Address</label>
                            <textarea class="form-control" id="clinic_address" placeholder="Enter clinic address" rows="2" required></textarea>
                            <span class="error-helper" id="clinic_address-error"></span>
                        </div>
                        <div class="d-flex justify-content-start">
                            <button class="ps-btn md-btn outline-btn text-end" type="submit">Book Now</button>
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
<script>
    document.getElementById('preferred_time').min = new Date().toISOString().slice(0, 16);
</script>
@endsection

    