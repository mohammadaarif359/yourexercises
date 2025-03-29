@extends('web_new.layouts.main')

@section('content')
<div class="main-section">
    <div class="mt-3">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Home Exercises - Clinic</h1>
                    <p class="paragraph cl-dblue">
                        Find the Best Physiotherapy Clinics Near You – Relief, Recovery, Results!
                    </p>
                </div>
            </div>
        </div>
            <div class="team-container ps-team-dr d-block pb-5">
                <div class="d-flex align-items-center justify-content-center my-3 flex-wrap">
                    <form method="GET" action="{{ route('clinic') }}">
                        <input type="text" class="input-grey-rounded" name="search" placeholder="Search by dr name or clinic" value="{{ request('search') }}">
                        <button type="submit" class="ps-btn sm-btn primary-btn ps-header-btn">Search</button>
                    </form>
                </div>

                <div class="d-flex align-items-center flex-wrap justify-content-center">
                    @foreach($clinics as $data)
                        @php $profile_photo = $data->user['profile_photo_url'] ? $data->user['profile_photo_url'] : asset('web_new/assets/img/profile-img.png'); @endphp
                        <a href="{{ url('/clinic/'.$data['slug']) }}">
                            <div class="team-member my-2">
                                <img src="{{ $profile_photo }}"
                                    alt="{{ $data['clinic_name'] }}">
                                <h3>{{ $data['user']['name'] }}</h3>
                                <h5 class='cl-lBlue'>{{ $data['clinic_name'] }}</h5>
                                <div class="d-flex justify-content-between flex-wrap px-2">
                                    <p>{{ $data['professional_info']['specialization'] ?? '' }}</p>
                                    @if($data['avg_rating'] > 0)
                                        <p><i class="fas fa-star mr-1"></i>{{ $data['avg_rating'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{--<a href=""><div class="team-member my-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE-n-Eb5PPHCiRyGR1vpCKxiucX1RsoZ0gEA&s"
                            alt="Kenneth Flery">
                        <h3>Kenneth Flery</h3>
                        <h5><i class="fas fa-hospital me-1"></i> Hospital name here</h5>
                        <div class="d-flex justify-content-between flex-wrap px-2">
                            <p>Marketing Manager</p>
                            <p><i class="fas fa-star mr-1"></i>4.5</p>
                        </div>
                    </div></a>--}}
                </div>
            </div>
    </div>
</div>    
    {{--<div class="main-section ps-about">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Home Exercises - Clinic</h1>
                    <p class="paragraph cl-dblue">
                        Find the Best Physiotherapy Clinics Near You – Relief, Recovery, Results!
                    </p>
                </div>
            </div>
        </div>

        <div class="team-container" data-aos="zoom" data-aos-duration="1500">
            <form method="GET" action="{{ route('clinic') }}">
                <input type="text" name="search" placeholder="Search by Name or Clinic Name..." value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
            @foreach($clinics as $data)
                @php $profile_photo = $data->user['profile_photo_url'] ? $data->user['profile_photo_url'] : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE-n-Eb5PPHCiRyGR1vpCKxiucX1RsoZ0gEA&s'; @endphp
                <div class="team-member">
                    <img src="{{ $profile_photo }}"
                        alt="{{ $data['user']['name'] }}">
                    <h3>{{ $data['user']['name'] }}</h3>
                    <h6><a href="{{ url('/clinic/'.$data['slug']) }}">{{ $data['clinic_name'] }}</a></h6>
                    <p>{{ $data['professional_info']['specialization'] ?? '' }}</p>
                </div>
            @endforeach
            <div class="team-member">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE-n-Eb5PPHCiRyGR1vpCKxiucX1RsoZ0gEA&s"
                    alt="Kenneth Flery">
                <h3>Kenneth Flery</h3>
                <p>Construction Development Manager</p>
            </div>
        </div>
    </div>--}}    
@endsection