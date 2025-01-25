@extends('web_new.layouts.main')

@section('content')
    <div class="main-section">
        <div class="container">
            <div class="row ps-border-bottom mx-4">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">See Over in action</h1>
                    <p class="paragraph cl-dblue">
                        Watch our demo reel or book a live demo.
                    </p>
                </div>
            </div>
            <div class="row mt-5 justify-content-between">
                <div class="col-md-5 demo-section p-5">
                    <h2>
                        Book a Demo
                    </h2>
                    <form>
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
                    </form>
                </div>
                <div class="col-md-6 video-section">
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
            <div class="content-section my-5 ">
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

    