@extends('web_new.layouts.clinic.main')
@section('content')
    <div class="main-section ">
        <div class="container">
            <div class="row ps-border-bottom mx-4">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Onging Plans</h1>
                    <p class="paragraph cl-dblue">
                        See over run your practice with beautifully designed ways to work.
                    </p>
                </div>
            </div>

            {{--<div class="row mt-3 feature-page">
                @foreach($plans as $k=> $data)
                @php $image = $data->plan['image_url'] ? $data->plan['image_url'] : asset('web_new/assets/img/profile-img.png'); @endphp
                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <a href="{{ url('/patient/plan/'. $data->id) }}">
                        <div class="card">
                            <div class="view overlay">
                                <img class="card-img-top" src="{{ $image }}" alt="{{ $data->plan['name'] }}">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $data->plan['name'] }}</h4>
                                <p class="card-text">{{ $data->plan['description'] }} text with description</p>
                                <div class="d-flex justify-content-between flex-wrap px-2">
                                    <p class="card-text">Exercises : {{ $data['exercise_count'] }}</p>
                                    <p class="card-text"><i class="fas fa-star mr-1"></i>{{ $data['avg_rating'] }}</p>
                                </div>
                                <p class="ps-read-more-btn m-0">Read more</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>--}}
        </div>

        <div class="team-container ps-team-dr d-block pb-5">
            <div class="d-flex align-items-center flex-wrap justify-content-center">
                @foreach($plans as $data)
                @php $image = $data->plan['image_url'] ? $data->plan['image_url'] : asset('web_new/assets/img/profile-img.png'); @endphp
                    <a href="{{ url('/patient/plan/'.$data['id']) }}">
                        <div class="team-member my-2">
                            <img src="{{ $image }}"
                                alt="{{ $data->plan['name'] }}">
                            <h3>{{ $data->plan['name'] }}</h3>
                            {{--<h5 class='cl-lBlue'>{{ $data['clinic_name'] }}</h5>--}}
                            <div class="d-flex justify-content-between flex-wrap px-2">
                                <p>Exercises : {{ $data['exercise_count'] }}</p>
                                <p><i class="fas fa-star mr-1"></i>{{ $data['avg_rating'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- completed plan -->
        @if(count($completed_plans) > 0)
        <div class='container mt-2'>
            <div class="row ps-border-bottom mx-4">
                <div class="col-12 p-0">
                    <h3 class="heading-l cl-lBlue fw-500">Completed Plans</h3>
                </div>
            </div>
        </div>    
        <div class="team-container ps-team-dr d-block pb-5">
            <div class="d-flex align-items-center flex-wrap justify-content-center">
                @foreach($completed_plans as $data)
                @php $image = $data->plan['image_url'] ? $data->plan['image_url'] : asset('web_new/assets/img/profile-img.png'); @endphp
                    <a href="{{ url('/patient/plan/'.$data['id']) }}">
                        <div class="team-member my-2">
                            <img src="{{ $image }}"
                                alt="{{ $data->plan['name'] }}">
                            <h3>{{ $data->plan['name'] }}</h3>
                            {{--<h5 class='cl-lBlue'>{{ $data['clinic_name'] }}</h5>--}}
                            <div class="d-flex justify-content-between flex-wrap px-2">
                                <p>Exercises : {{ $data['exercise_count'] }}</p>
                                <p><i class="fas fa-star mr-1"></i>{{ $data['avg_rating'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection