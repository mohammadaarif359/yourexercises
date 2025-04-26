@extends('admin.layouts.main')

@section('content')
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<div class="row">
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Patients</span>
				<span class="info-box-number">{{ $count['user'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dumbbell"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Exerise</span>
				<span class="info-box-number">{{ $count['exercise'] }}</span>
			  </div>
			</div>
		  </div>	
		  <div class="clearfix hidden-md-up"></div>

		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clipboard"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">Plan</span>
				<span class="info-box-number">{{ $count['plan'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-plus"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">New Members</span>
				<span class="info-box-number">{{ $count['new_member'] }}</span>
			  </div>
			</div>
		  </div>
		</div>

		<div class="row">
			@if($count['latest_user'])	
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Onboarded Patient (30 days)</h3>
						<div class="card-tools">
							<span class="badge badge-danger">{{ $count['new_member'] }}</span>
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body p-0">
						<ul class="users-list clearfix">
							@foreach($count['latest_user'] as $user)
							<li>
								<img src="{{ $user->profile_photo_url ? $user->profile_photo_url : asset('dist/img/avatar5.png') }}">
								<a class="users-list-name" href="#"><b>{{ $user['name'] }}</b></a>
								<span class="users-list-date">{{ date('d-M', strtotime($user['patient_profile']['created_at'])) }}</span>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="card-footer text-center">
						<a href="{{ route('admin.doctor.user') }}">View All Users</a>
					</div>
				</div>
			</div>
			@endif

			<div class="col-md-4">
				<div class="card">
				<div class="card-header">
					<h3 class="card-title">Recent Plans (30 days)</h3>
					<div class="card-tools">
						<span class="badge badge-danger">{{ count($count['latest_plan']) }}</span>
						<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body p-0">
					<ul class="products-list product-list-in-card pl-2 pr-2">
					@foreach($count['latest_plan'] as $plan)	
					<li class="item">
						<div class="product-img">
						<img src="{{ $plan['image_url'] ? $plan['image_url'] : asset('dist/img/placeholder.png') }}" alt="Plan Image" class="img-size-50">
						</div>
						<div class="product-info">
						<a href="{{ url('/admin/plan/'.$plan->id) }}" class="product-title">{{ $plan['name'] }}
							{{--<span class="badge badge-warning float-right">{{ count($plan['doctor_plan_detail']) }}</span></a>--}}
							<span class="product-description">
								{{ $plan['description'] }}
							</span>
						</div>
					</li>
					@endforeach
					</ul>
				</div>
				<div class="card-footer text-center">
					<a href="{{ route('admin.doctor.plan') }}" class="uppercase">View All Plans</a>
				</div>
				</div>
			</div>
		</div>
	</div>	  
</section>
@endsection