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
				<span class="info-box-text">Users</span>
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
	</div>
</section>
@endsection