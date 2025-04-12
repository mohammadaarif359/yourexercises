@extends('web_new.layouts.clinic.main')

@section('content')
    <div class="main-section">
        <div class="container ps-dr-profile">
            <div class="profile-header hero">
                <h5>Your Health, Connected — From Doctor’s Advice to Home Exercises</h5>
                <p></p>
                <img alt="Patient's profile picture" class="profile-picture" src="{{ !empty($data['user']['profile_photo_url']) ? $data['user']['profile_photo_url'] : asset('web_new/assets/img/profile-img.png') }}" />
            </div>
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="profile-info mb-4 p-0">
                        <h1 class="cl-dblue">{{ $data['user']['name'] }}</h1>
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="stats">
                            @if($data['avg_rating'] > 0)
                            <i class="fas fa-star"></i> {{ $data['avg_rating'] }}
                            @endif
                        </div>
                        </div>
                    </div>

                    {{ $data['medical_history'] }}
                    <div class="section-title cl-dblue">Medical History</div>
                    <p class="cl-gray section-paragraph collapsed">
                        {{ $data['medical_history'] ? $data['medical_history'] : 'No medical history given by your doctor'  }}
                    </p>
                    
                    <div class="section-title cl-dblue mt-4 mb-2 pb-1">Your Practioner</div>
                    <div class="experience-item d-flex align-items-center">
                        @if($data['patient_doctor']['image_url'])
                        <img alt="{{ $data['patient_doctor']['clinic_name'] }}" src="{{ $data['patient_doctor']['image_url'] }}" />
                        @endif
                        <div class="details">
                            <h5>{{ $data['patient_doctor']['clinic_name'] }}</h5>
                            <p class="heading">{{ $data['patient_doctor']['user']['name'] }} - {{ $data['patient_doctor']['professional_info']['specialization'] ?? '' }}</p>
                            <p class="sub-heading">{{  $data['patient_doctor']['clinic_address'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="medical-actions mb-4 mt-1 pt-2">
                        <div class="section-title cl-dblue">Personal Info</div>
                        <ul class="p-0">
                            <li><i class="fas fa-phone"></i> {{ $data['user']['mobile']  }}</li>
                            <li><i class="fas fa-envelope"></i> {{ $data['user']['email'] }}</li>
                            <li><i class="fas fa-user-clock"></i> {{ date('d-m-y h:i:a', strtotime($data['created_at'])) }}</li>
                            @if($data['gender'])
                            <li><i class="fas fa-venus-mars"></i> {{ $data['gender'] }}</li>
                            @endif
                            @if($data['dob'])
                            <li><i class="fas fa-calendar-alt"></i> {{ $data['dob'] }}</li>
                            @endif
                            @if($data['address'])
                            <li> <i class="fas fa-map-marker-alt"></i>{{ $data['address'] }}</li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('pagejs')
<script>
    document.querySelector(".toggle-btn").addEventListener("click", function () {
        let paragraph = document.querySelector(".section-paragraph");
        paragraph.classList.toggle("expanded");
        this.classList.toggle("expanded");

        // Change text dynamically
        this.innerHTML = paragraph.classList.contains("expanded")
            ? 'See Less <i class="fas fa-chevron-up"></i>'
            : 'See More <i class="fas fa-chevron-down"></i>';
    });

    /*document.querySelector(".toggle-btn2").addEventListener("click", function () {
        let paragraph = document.querySelector(".section-review");
        paragraph.classList.toggle("expanded");

        // Change text dynamically
        this.innerHTML = paragraph.classList.contains("expanded") ? 'See Less' : 'See More';
    });*/
</script>
@endsection