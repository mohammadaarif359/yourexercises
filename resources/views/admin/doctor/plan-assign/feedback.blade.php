@extends('admin.layouts.main')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Plan</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-weight mr-1"></i> <a href="{{ url('/admin/doctor/plan/edit/'.$assign['plan']['id']) }}">{{ $assign['plan']['name'] }}</a></strong>
                <p class="text-muted">
                  {{ $assign['plan']['description'] }}
                </p>
              </div>
            </div>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ !empty($assign['user']['profile_photo_url']) ? $assign['user']['profile_photo_url'] : asset('dist/img/avatar5.png') }}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $assign['user']['name'] }}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Rating</b> <a class="float-right"><i class="fas fa-star mr-1"></i> {{ $assign['avg_rating'] }}</a>
                  </li>
                  <li class="list-group-item">
                    @if($assign['completed_at'])
                      <b>Plan Completed</b> <a class="float-right">{{ date('d-m-y h:i:a', strtotime($assign['completed_at'])) }}</a>
                    @else 
                      <b>Plan Assign</b> <a class="float-right">{{ date('d-m-y h:i:a', strtotime($assign['created_at'])) }}</a>
                    @endif
                  </li>
                </ul>

                <a href="tel:{{$assign['user']['mobile']}}" class="btn btn-primary">Contact</a>
                <a href="mailto:{{$assign['user']['email']}}" class="btn btn-primary">Email</a>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    @if(count($assign['feedback']) >  0)
                      @foreach($assign['feedback'] as $k=> $feedback)
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" 
                            src="{{ $feedback['exercise']['image_url'] ? $feedback['exercise']['image_url'] : asset('web_new/assets/img/profile-img.png') }}" alt="exercise image">
                          <span class="username">
                            <a href="#">{{ $feedback['exercise']['name'] }}</a>
                          </span>
                          <span class="description"> {{ date('d-M-y h:i:a', strtotime($feedback['updated_at'])) }}</span>
                        </div>
                        <p>{{ $feedback['comment'] }}</p>
                        <!-- feedback questionary -->
                        <div id='accordion'>
                          <div class="card card-primary card-outline">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{$k}}" aria-expanded="false">
                                <div class="card-header">
                                    <h6 class="w-100">
                                        Feedback -  {{ date('d-M-y h:i:a', strtotime($feedback['updated_at'])) }}
                                      <span class="float-right"><i class="fas fa-star mr-1"></i> {{ $feedback['rating'] }}</span>
                                    </h6>
                                </div>
                            </a>
                            <div id="collapseOne{{$k}}" class="collapse" data-parent="#accordion" style="">
                                <div class="card-body">
                                  <div class="text-muted">
                                    <p class="text-sm">
                                      <b class="d-block">Q1: How was the exercise</b>
                                      Ans: {{ $feedback['answer']['how_was_exercise'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q2: Pain level before the exercise</b>
                                      Ans: {{ $feedback['answer']['pain_before_exercise'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q3: Pain level after the exercise</b>
                                      Ans: {{ $feedback['answer']['pain_after_exercise'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q4:Were you able to complete all assigned sets</b>
                                      Ans: {{ $feedback['answer']['complete_sets'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q5: How stiff did you feel after the exercise</b>
                                      Ans: {{ $feedback['answer']['stiffness'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q6:Were you able to perform your activities of daily living (bathing, grooming, eating, dressing, etc.)</b>
                                      Ans: {{ $feedback['answer']['daily_activities'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q7: How much pain did you experience the next day</b>
                                      Ans: {{ $feedback['answer']['pain_next_day'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q8: How many incidents of extreme pain did you experience in the last 24 hours</b>
                                      Ans: {{ $feedback['answer']['extreme_pain_last_24'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q9: Comment</b>
                                      Ans: {{ $feedback['comment'] ?? '' }}
                                    </p>
                                  </div>
                                </div>
                            </div>

                            @php
                                $sortedHistory = isset($feedback->history)
                                    ? collect($feedback->history)->sortByDesc('updated_at')->values()->all()
                                    : [];
                            @endphp
                            @foreach ($sortedHistory as $ke => $history)
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{$k}}{{$ke}}" aria-expanded="false">
                                <div class="card-header">
                                    <h6 class="w-100">
                                        Feedback -  {{ date('d-M-y h:i:a', strtotime($history['updated_at'])) }}
                                      <span class="float-right"><i class="fas fa-star mr-1"></i> {{ $history['rating'] }}</span>
                                    </h6>
                                </div>
                            </a>
                            <div id="collapseOne{{$k}}{{$ke}}" class="collapse" data-parent="#accordion" style="">
                                <div class="card-body">
                                  <div class="text-muted">
                                  <p class="text-sm">
                                      <b class="d-block">Q1: How was the exercise</b>
                                      Ans: {{ $history['answer']['how_was_exercise'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q2: Pain level before the exercise</b>
                                      Ans: {{ $history['answer']['pain_before_exercise'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q3: Pain level after the exercise</b>
                                      Ans: {{ $history['answer']['pain_after_exercise'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q4:Were you able to complete all assigned sets</b>
                                      Ans: {{ $history['answer']['complete_sets'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q5: How stiff did you feel after the exercise</b>
                                      Ans: {{ $history['answer']['stiffness'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q6:Were you able to perform your activities of daily living (bathing, grooming, eating, dressing, etc.)</b>
                                      Ans: {{ $history['answer']['daily_activities'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q7: How much pain did you experience the next day</b>
                                      Ans: {{ $history['answer']['pain_next_day'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q8: How many incidents of extreme pain did you experience in the last 24 hours</b>
                                      Ans: {{ $history['answer']['extreme_pain_last_24'] ?? '' }}
                                    </p>
                                    <p class="text-sm">
                                      <b class="d-block">Q9: Comment</b>
                                      Ans: {{ $history['comment'] ?? '' }}
                                    </p>
                                    
                                  </div>
                                </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      @endforeach
                    @else
                    <div class="text-muted">
                      <p class="text-sm">No any feedback recevied from patient on this assigned plan</p>
                    </div>
                    @endif    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection