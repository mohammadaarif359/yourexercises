@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Plan Assign Edit<small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.doctor.plan.assign.update',['plan_id'=> $data->plan_id]) }}" enctype="multipart/form-data">
			@csrf
            <input type='hidden' value='{{ $data->id }}' name='id'>
			<div class="card-body">
			  <div class="row">
                <div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Select User</label>
					<select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id" disabled>
						<option value='' selected>Select</option>
						@foreach($users as $key=>$val)
							<option value="{{ $val->id }}" {{ old('user_id', $val->id == $data->user_id ? 'selected' : '') }}>{{ $val->name }} ({{ $val->email }})</option>
						@endforeach
					</select>
					@error('user_id')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
                <div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Status</label>
					<select id="status" class="form-control @error('status') is-invalid @enderror" name="status" @if($data->status == 'completed') disabled @endif>
						<option value='' selected>Select</option>
						@foreach(config('custom.plan_assgin_status') as $key=>$val)
							<option value="{{ $key }}" {{ old('status', $key == $data->status ? 'selected' : '') }}>{{ $val }}</option>
						@endforeach
					</select>
					@error('status')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
			  </div>			
			</div>
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Update</button>
			  <a href="{{ route('admin.doctor.plan.assign', ['plan_id' => $data->plan_id]) }}" class="btn btn-primary">Cancel</a>
			</div>
		  </form>
		</div>
	</div>
 </div>	
</section>
@endsection