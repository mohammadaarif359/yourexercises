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

                        <div class="row">
                          <div class="col-md-7">
                            <!-- graph -->
                            @php $fcount = $k; @endphp 
                            @include('admin.doctor.plan-assign.partial.graph')
                          </div>
                          <div class="col-md-5">
                            <!-- question -->
                            @include('admin.doctor.plan-assign.partial.question')
                          </div>
                      </div>
                      <hr/>
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
@section('pagejs')
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/feedback/graph.js') }}"></script>
<script>
   
</script>
@endsection