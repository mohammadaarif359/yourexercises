@extends('web_new.layouts.clinic.main')

@section('content')
    <div class="main-section">
        <div class="container ps-dr-profile">
            <div class="profile-header hero">
                <h1>{{$data['clinic_name'] }}</h1>
                <p></p>
                <img alt="Doctor's profile picture" class="profile-picture" src="{{ !empty($data['user']['profile_photo_url']) ? $data['user']['profile_photo_url'] : asset('web_new/assets/img/profile-img.png') }}" />
            </div>
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="profile-info mb-4 p-0">
                        <h1 class="cl-dblue">{{ $data['user']['name'] }}</h1>
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                           <span class="ps-badge-light mt-1 mb-2"><span></span> {{ $data['professional_info']['specialization'] ?? '' }}</span>
                            <!-- <p>Siloam Hospitals, West Bekasi, Bekasi</p> -->
                        </div>
                        <div class="stats">
                            <i class="fas fa-user-friends"></i> {{ $data['doctor_patient_count'] ?? 0 }}
                            @if($data['avg_rating'] > 0)
                            <i class="fas fa-star"></i> {{ $data['avg_rating'] }}
                            @endif
                        </div>
                        </div>
                    </div>

                    @if($data['description'])
                        <div class="section-title cl-dblue">Doctor Profile</div>
                        <p class="cl-gray section-paragraph collapsed">
                            {{ $data['description'] }}
                        </p>
                        <a class="text-success toggle-btn" href="javascript:void(0);">
                            See More <i class="fas fa-chevron-down"></i>
                        </a>
                    @endif

                    @if($data['professional_info']['experience'])
                        <div class="section-title cl-dblue mt-4 mb-2 pb-1">Practice Experience</div>
                        <div class="experience-item d-flex align-items-center">
                            <div class="details">
                                <p class="sub-heading">{{ $data['professional_info']['experience'] }}</p>
                            </div>
                        </div>
                    @endif
                    @if($data['professional_info']['qualification'])
                        <div class="section-title cl-dblue mt-4 mb-2 pb-1">Qualification</div>
                        <div class="experience-item d-flex align-items-center">
                            <div class="details">
                                <p class="sub-heading">{{ $data['professional_info']['qualification'] }}</p>
                            </div>
                        </div>
                    @endif

                    {{--<div class="section-title cl-dblue mt-3">Doctor Heading</div>
                    <p class="cl-gray section-paragraph">With a seasoned career spanning four years, our ENT specialist brings a wealth of
                        experience and
                        expertise to the field. Having dedicated their professional journey to ear, nose, and throat health,
                        they have honed their skills in diagnosing and treating a wide range of ENT conditions. Their commitment
                        to staying abreast of the latest advancements in the field ensures that patients receive cutting-edge
                        care.</p>

                    <div class="section-title cl-dblue mt-4 mb-2 pb-1">Practice Experience</div>
                    <div class="experience-item d-flex align-items-center">
                        <img alt="Siloam Hospitals Bekasi Timur logo" src="https://placehold.co/50x50" />
                        <div class="details">
                            <h5>Siloam Hospitals Bekasi Timur</h5>
                            <p class="heading">ENT Doctor - Neurology - Online Consultation</p>
                            <p class="sub-heading">Dec 2022 - Present • 2 yrs 1 mos</p>
                            <p class="sub-heading">Margahayu, Kec. Bekasi Timur, West Java</p>
                        </div>
                    </div>
                    <div class="experience-item d-flex align-items-center">
                        <div class="details">
                            <h5>Siloam Hospitals Bekasi Timur</h5>
                            <p class="heading">ENT Doctor - Neurology - Online Consultation</p>
                            <p class="sub-heading">Dec 2022 - Present • 2 yrs 1 mos</p>
                            <p class="sub-heading">Margahayu, Kec. Bekasi Timur, West Java</p>
                        </div>
                    </div>--}}
                </div>
                <div class="col-md-4">
                    <div class="medical-actions mb-4 mt-1 pt-2">
                        <div class="section-title cl-dblue">Connect Us</div>
                        <ul class="p-0">
                            <li> <i class="fas fa-map-marker-alt"></i>{{ $data['clinic_address'] }}</li>
                            <li><i class="fas fa-phone"></i> {{ !empty($data['clinic_phone_no']) ? $data['clinic_phone_no'] : data['user']['mobile']  }}</li>
                            <li><i class="fas fa-envelope"></i> {{ $data['user']['email'] }}</li>
                            @if($data['social_media'])
                            @php $social_media =  $data['social_media']; @endphp
                            <li class="social-icons mt-3">
                                <div class=" pt-2 pt-md-0">
                                    @if($social_media['facebook'])
                                    <a href="{{ $social_media['facebook'] }}" class=" mr-1">
                                        <i class="fab fa-facebook-f m-0"></i>
                                    </a>
                                    @endif
                                    @if($social_media['youtube'])
                                    <a href="{{ $social_media['youtube'] }}" class="mr-2">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    @endif
                                    @if($social_media['instagram'])
                                    <a href="{{ $social_media['instagram'] }}" class="mr-2">
                                        <i class="fab fa-instagram fw-600"></i>
                                    </a>
                                    @endif
                                    @if($social_media['linkedin'])
                                    <a href="{{ $social_media['linkedin'] }}" class=" mr-2">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    @endif
                                    @if($social_media['threads'])
                                    <a href="{{ $social_media['threads'] }}" class=" mr-2">
                                        <i class="fa-brands fa-threads fw-600"></i>
                                    </a>
                                    @endif
                                    @if($social_media['pinterest'])
                                    <a href="{{ $social_media['pinterest'] }}" class=" mr-2">
                                        <i class="fab fa-pinterest fw-600"></i>
                                    </a>
                                    @endif
                                    @if($social_media['tiktok'])
                                    <a href="" class=" mr-2">
                                        <i class="fab fa-tiktok fw-600"></i>
                                    </a>
                                    @endif
                                </div>
                            </li>
                            @endif
                        </ul>
                        <a class="ps-btn md-btn primary-btn mb-1 w-100 mt-1" href="tel:{{ !empty($data['clinic_phone_no']) ? $data['clinic_phone_no'] : $data['user']['mobile'] }}">Make Appointments</a>
                    </div>
                    <div class="download-app">
                        @if($data['image_url']) 
                            <img alt="{{ $data['clinic_name'] }}" src="{{ $data['image_url'] }}" />
                        @endif
                        <!--<div class="btn-group">
                            <button class="btn btn-dark mr-1 rounded"><i class="fab fa-apple"></i> App Store</button>
                            <button class="btn btn-dark ml-1 rounded"><i class="fab fa-google-play"></i> Google Play</button>
                        </div>-->
                    </div>
                </div>
            </div>
            {{--<div class="row">
                <div class="col-12"><div class="section-title mt-4 mb-2 pb-1">Doctor's Review</div></div>
                <div class="col-md-4">
                    <div class="experience-item d-flex ">
                        <img alt="Siloam Hospitals Bekasi Timur logo" class="ps-review-img" src="https://placehold.co/50x50" />
                        <div class="details">
                            <p class="heading">Review title</p>
                            <p class="sub-heading section-review collapsed">
                                With a seasoned career spanning four years, our ENT specialist brings a wealth of experience and expertise to the
                                field.
                                Having dedicated With a seasoned career spanning four years, our ENT specialist brings a wealth of experience and
                                expertise to the field.
                                Having dedicated With a seasoned career spanning four years, our ENT specialist brings a wealth of experience and
                                expertise to the field.
                                Having dedicated With a seasoned career spanning four years, our ENT specialist brings a wealth of experience and
                                expertise to the field.
                                Having dedicated
                            </p>
                            <a class="text-success toggle-btn2" href="javascript:void(0);">
                                See More
                            </a>
                            <p class="sub-heading fw-500 mt-2">Dec 2022 - Present • 2 yrs 1 mos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="experience-item d-flex ">
                        <img alt="Siloam Hospitals Bekasi Timur logo" class="ps-review-img" src="https://placehold.co/50x50" />
                        <div class="details">
                            <p class="heading">Review title</p>
                            <p class="sub-heading section-review ">
                                With a seasoned career spanning four years, our ENT specialist brings a wealth of experience and expertise to the
                                field.
                            </p>
                            <p class="sub-heading fw-500 mt-2">Dec 2022 - Present • 2 yrs 1 mos</p>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
@endsection
@section('pagejs')
<script>
    const toggleBtn = document.querySelector(".toggle-btn");
    if(toggleBtn) {
        document.querySelector(".toggle-btn").addEventListener("click", function () {
            let paragraph = document.querySelector(".section-paragraph");
            paragraph.classList.toggle("expanded");
            this.classList.toggle("expanded");

            // Change text dynamically
            this.innerHTML = paragraph.classList.contains("expanded")
                ? 'See Less <i class="fas fa-chevron-up"></i>'
                : 'See More <i class="fas fa-chevron-down"></i>';
        });
    }   

    /*document.querySelector(".toggle-btn2").addEventListener("click", function () {
        let paragraph = document.querySelector(".section-review");
        paragraph.classList.toggle("expanded");

        // Change text dynamically
        this.innerHTML = paragraph.classList.contains("expanded") ? 'See Less' : 'See More';
    });*/
</script>
@endsection