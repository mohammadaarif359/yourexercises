@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Add Plan <small></small></h3>
		  </div>
		  <form role="form" id="frm-plan-submit" method="POST" action="{{ route('admin.plan.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<label>Category</label>
						<select class="select2 catgory_id @error('category_id') is-invalid @enderror" name="category_id[]" id="category_id" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
							@foreach($categories as $k => $val)
								<option value="{{ $k }}">
									{{ $val }}
								</option>
							@endforeach
						</select>
						@error('category_id')
							<span class="error invalid-feedback">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="subcategory_id">Subcategory</label>
							<select class="select2 subcategory_id @error('subcategory_id') is-invalid @enderror" name="subcategory_id[]" id="subcategory_id" multiple="multiple" data-placeholder="Select a Subcategory" style="width: 100%;">
							</select>
							@error('subcategory_id')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
							<span class="error invalid-feedback" id="error_name"></span>
						</div>
					</div>
					<div class="col-md-6">        
						<div class="form-group">
							<label for="image">Image</label>
							<div class="custom-file">
								<input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
								<label class="custom-file-label" for="image">Choose file</label>
							</div>
							@error('image')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="description">Description</label>
							<textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description') }}</textarea>
							@error('description')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
				</div>
				<div id="itembody">
				<div class='row itemrow' id='itemrow'>	
                    <div class="col-md-3">
						<div class="form-group">
							<label for="exercise_id">Exercise</label>
							<select  id="exercise_id0" class="exercise_id form-control @error('detail.exercise_id.0') is-invalid @enderror" name="detail[exercise_id][]">
								<option value="" selected>Select Exercise</option>
								@foreach($exercises as $k => $val)
									<option value="{{ $val->id }}" data-obj="{{$val }}">
										{{ $val->name }}
									</option>
								@endforeach
							</select>
							<span class="error invalid-feedback" id="error_exercise_id0"></span>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="reps">Reps (Times)</label>
							<select id="reps0" class="reps form-control @error('reps') is-invalid @enderror" name="detail[reps][]">
								<option value='' selected>Select</option>
								@for($i=1;$i<=50;$i++)
									<option value="{{ $i }}" {{ old('reps') == $i ? 'selected' : '' }}>{{ $i }}</option>
								@endfor
							</select>
							<span class="error invalid-feedback" id="error_reps0" ></span>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="hold">Hold (Seconds)</label>
							<select id="hold0" class="hold form-control @error('hold') is-invalid @enderror" name="detail[hold][]">
								<option value='' selected>Select</option>
								@foreach(config('custom.hold') as $k=> $val)
									<option value="{{ $k }}" {{ old('hold') == $k ? 'selected' : '' }}>{{ $val }}</option>
								@endforeach
							</select>
							<span class="error invalid-feedback" id="error_hold0"></span>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="complete">Complete (sets)</label>
							<select id="complete0" class="complete form-control @error('complete') is-invalid @enderror" name="detail[complete][]">
								<option value='' selected>Select</option>
								@for($i=1;$i<=20;$i++)
									<option value="{{ $i }}" {{ old('complete') == $i ? 'selected' : '' }}>{{ $i }}</option>
								@endfor
							</select>
							@error('complete')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<label for="complete">Perform</label>
							<select id="perform0" class="perform form-control @error('perform') is-invalid @enderror" name="detail[perform][]">
								<option value='' selected>Select</option>
								@for($i=1;$i<=20;$i++)
									<option value="{{ $i }}" {{ old('perform') == $i ? 'selected' : '' }}>{{ $i }}</option>
								@endfor
							</select>
							@error('perform')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<label for="times">Times</label>
							<select id="times0" class="times form-control @error('times') is-invalid @enderror" name="detail[times][]" required>
								<option value='' selected>Select</option>
								@foreach(config('custom.times') as $k=> $val)
									<option value="{{ $k }}" {{ old('times') == $k ? 'selected' : '' }}>{{ $val }}</option>
								@endforeach
							</select>
							@error('times')
								<span class="error invalid-feedback">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<label for="times">Action</label>
							<div>
								<button type="button" class="btn btn-info addrow" id="addrow0"><i class="fa fa-plus"></i></a>
								<button type="button" class="btn btn-danger deleterow" id="deleterow0"><i class="fa fa-trash"></i></button>
							</div>	
						</div>
					</div>		
				</div>
				</div>          
			</div>
			<div class="card-footer">
				<!--<button type="submit" class="btn btn-primary" >Create</button>-->
				<button type="button" class="btn btn-primary" id='btn-plan-submit'>Create</button>
			</div>
		</form>

		</div>
		</div>
	  <div class="col-md-6">

	  </div>
	</div>
  </div>
</section>
@endsection
@section('pagejs')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script> 
<script>
	var totalcount = 0;
	$('body').on('click', '.addrow', function () {
    	var itemrow = $('#itemrow').clone(); // Remove the duplicate id from the cloned row
		var exercise_id = $('select[id^="exercise_id"]:last');
		var num = parseInt(exercise_id.prop("id").match(/\d+/g), 10) + 1;
		
		itemrow.find("select, input").each(function () {
			var currentId = $(this).attr('id');
			console.log('currentId',currentId)
			if (currentId) {
				var newId = currentId.replace(/\d+/, num);
				console.log('new id', newId)
				$(this).attr('id', newId);
				$(this).removeClass('is-invalid');
			}
		});

		itemrow.find(".error").each(function () {
			var currentId = $(this).attr('id');
			console.log('currentId',currentId)
			if (currentId) {
				var newId = currentId.replace(/\d+/, num);
				console.log('new id', newId)
				$(this).attr('id', newId);
				$(this).html('')
			}
		});

		itemrow.find(".addrow").attr("id", "addrow" + num);
		itemrow.find(".deleterow").attr("id", "deleterow" + num);

		itemrow.find("input, select").val('');
		itemrow.find("option:selected").removeAttr("selected");
		// Append the new row
		$('#itembody').append(itemrow);
    	totalcount++;
	});

	$("#btn-plan-submit").click(function (e) {
		e.preventDefault();
		$("#btn-plan-submit").prop("disabled", true);
		$('#btn-plan-submit').html('Create <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
		$.ajax({
			type: 'POST',
			url: "{{ route('admin.plan.store') }}",
			data: $("#frm-plan-submit").serialize(),
			success: function (data) {
				$("#frm-plan-submit .invalid-feedback").html('');
				$("#btn-plan-submit").prop("disabled", false);
				$('#btn-plan-submit').html('Create');
				$('#btn-plan-submit').removeClass('is-invalid');
				if (data.validation_error_responce) {
					$.each(data.validation_error_responce, function (key, val) {
						$.each(val, function (k, v) {
							if (key.startsWith('detail')) {
								var keyNew = key.replace('detail.','');
								keyNew = keyNew.replace('.', '');
								console.log('keyNew',keyNew)
								$('#frm-plan-submit #'+keyNew).addClass('is-invalid');
								$("#frm-plan-submit #error_" + keyNew).html(v);
							} else {
								console.log('key', key);
								$('#frm-plan-submit #'+key).addClass('is-invalid');
								$("#frm-plan-submit #error_" + key).html(v);
							}
						});
					});
				} else {
					alert('sucess');
				}
			}
		});
	});

</script>	
@endsection
