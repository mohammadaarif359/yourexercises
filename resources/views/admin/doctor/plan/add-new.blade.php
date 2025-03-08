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
		  <form role="form" id="frm-plan-submit" method="POST" action="{{ route('admin.doctor.plan.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="plan_id">Admin Plan</label>
							<select id="plan_id" class="plan_id form-control" name="plan_id">
								<option value='' selected>Select Admin Plan</option>
								@foreach($adminPlans as $k=>$val)
									<option value="{{ $val->id }}" {{ old('plan_id', $plan_id ?? '') == $val->id ? 'selected' : '' }}>{{ $val->name }}</option>
								@endforeach
							</select>
							<span class="error invalid-feedback" id="error_plan_id"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name', $plan['name'] ?? '') }}" autocomplete="name" autofocus>
							<span class="error invalid-feedback" id="error_name"></span>
						</div>
					</div>
					<div class="col-md-6">        
						<div class="form-group">
							<label for="image">Feature Image</label>
							<div class="custom-file">
								<input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
								<label class="custom-file-label" for="image">Choose file</label>
							</div>
							<span class="error invalid-feedback" id="error_image"></span>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="description">Description</label>
							<textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description', $plan['description'] ?? '') }}</textarea>
							<span class="error invalid-feedback" id="error_description"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Status</label><br/>
							<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" name="is_active" class="form-check-input" value="1" checked>Active
							</label>
							</div>
							<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" name="is_active" class="form-check-input" value="0">Deactive
							</label>
							</div>
							<span class="error invalid-feedback" id="error_is_active"></span>
						</div>
					</div>
				</div>
				<div id="itembody">
					@if($plan && count($plan['plan_detail']) > 0)
						@foreach($plan['plan_detail'] as $count=>$detail)
						@php $hide = $count > 0 ? 'd-none' : ''; @endphp
						<div class='row itemrow' id='itemrow'>
							<input id="is_admin{{$count}}" type="hidden" class="is_admin form-control" name="detail[is_admin][]" value="1">
							<span class="error invalid-feedback" id="error_is_admin{{$count}}"></span>
							<div class="col-md-2">
								<div class="form-group">
									<label for="category_id" class="{{$hide}}">Category</label>
									<select id="category_id{{$count}}" class="category_id form-control" name="detail[category_id][]">
										<option value='' selected>Select Category</option>
										@foreach($categories as $k=>$val)
											<option value="{{ $k }}" {{ old('category_id',$k == $detail['category_id'] ? 'selected' : '') }}>{{ $val }}</option>
										@endforeach
									</select>
									<span class="error invalid-feedback" id="error_category_id{{$count}}"></span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="subcategory_id" class="{{$hide}}">Subcategory</label>
									<select id="subcategory_id{{$count}}" class="subcategory_id form-control" name="detail[subcategory_id][]">
										<option value="" selected>Select Subcategory</option>
									</select>
									<span class="error invalid-feedback" id="error_subcategory_id{{$count}}"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="times" class="{{$hide}}">Execise</label>
									<div>
										<button class="btn btn-default btn-block addexercise" type="button" data-toggle="modal" 
										id="addexercise{{$count}}" data-target="#addexercisemodal{{$count}}" data-whatever="@getbootstrap">Select</button>
										<span class="error invalid-feedback" id="error_select_exercise_id{{$count}}"></span>
									</div>	
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="exercise_id" class="{{$hide}}">Exercise</label>
									<select  id="exercise_id{{$count}}" class="exercise_id form-control" name="detail[exercise_id][]">
										<option value="" selected>Select Exercise</option>
									</select>
									<span class="error invalid-feedback" id="error_exercise_id{{$count}}"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="reps" class="{{$hide}}">Reps</label>
									<select id="reps{{$count}}" class="reps form-control @error('reps') is-invalid @enderror" name="detail[reps][]">
										<option value='' selected>Select</option>
										@for($i=1;$i<=50;$i++)
											<option value="{{ $i }}"  {{ old('reps',$i == $detail['reps'] ? 'selected' : '') }}>{{ $i }}</option>
										@endfor
									</select>
									<span class="error invalid-feedback" id="error_reps{{$count}}" ></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="hold" class="{{$hide}}">Hold</label>
									<select id="hold{{$count}}" class="hold form-control @error('hold') is-invalid @enderror" name="detail[hold][]">
										<option value='' selected>Select</option>
										@foreach(config('custom.hold') as $k=> $val)
											<option value="{{ $k }}"  {{ old('hold',$k == $detail['hold'] ? 'selected' : '') }}>{{ $val }}</option>
										@endforeach
									</select>
									<span class="error invalid-feedback" id="error_hold{{$count}}"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="complete" class="{{$hide}}">Complete</label>
									<select id="complete{{$count}}" class="complete form-control @error('complete') is-invalid @enderror" name="detail[complete][]">
										<option value='' selected>Select</option>
										@for($i=1;$i<=20;$i++)
											<option value="{{ $i }}" {{ old('complete',$i == $detail['complete'] ? 'selected' : '') }}>{{ $i }}</option>
										@endfor
									</select>
									<span class="error invalid-feedback" id="error_complete{{$count}}"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="complete" class="{{$hide}}">Perform</label>
									<select id="perform{{$count}}" class="perform form-control @error('perform') is-invalid @enderror" name="detail[perform][]">
										<option value='' selected>Select</option>
										@for($i=1;$i<=20;$i++)
											<option value="{{ $i }}" {{ old('perform',$i == $detail['perform'] ? 'selected' : '') }}>{{ $i }}</option>
										@endfor
									</select>
									<span class="error invalid-feedback" id="error_perform{{$count}}"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="times" class="{{$hide}}">Times</label>
									<select id="times{{$count}}" class="times form-control @error('times') is-invalid @enderror" name="detail[times][]" required>
										<option value='' selected>Select</option>
										@foreach(config('custom.times') as $k=> $val)
											<option value="{{ $k }}" {{ old('times',$k == $detail['times'] ? 'selected' : '') }}>{{ $val }}</option>
										@endforeach
									</select>
									<span class="error invalid-feedback" id="error_times{{$count}}"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="action" class="{{$hide}}">Action</label>
									<div>
										<button type="button" class="btn addrow p-0 by-admin" id="addrow{{$count}}" title="Add Self exercise"><i class="fa fa-plus"></i></a></button>
										<button type="button" class="btn addadminrow p-0 by-admin" id="addadminrow{{$count}}" title="Add Admin Exercise"><i class="fa fa-user-plus"></i></a></button>
										<button type="button" class="btn deleterow p-0 by-admin" id="deleterow{{$count}}" title="Remove Exercise"><i class="fa fa-trash"></i></button>
										<div class="modal fade addexercisemodal" id="addexercisemodal{{$count}}" tabindex="-1" role="dialog" aria-labelledby="exercisModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-xl" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exercisModalLabel">Select Exercise</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>   
										</div>
									</div>	
								</div>
							</div>
						</div>	
						@endforeach
					@else
						<div class='row itemrow' id='itemrow'>
							<input id="is_admin0" type="hidden" class="is_admin form-control" name="detail[is_admin][]" value="0">
							<span class="error invalid-feedback" id="error_is_admin0"></span>
							<div class="col-md-2">
								<div class="form-group">
									<label for="category_id">Category</label>
									<select id="category_id0" class="category_id form-control" name="detail[category_id][]">
										<option value='' selected>Select Category</option>
										@foreach($categories as $k=>$val)
											<option value="{{ $k }}">{{ $val }}</option>
										@endforeach
									</select>
									<span class="error invalid-feedback" id="error_category_id0"></span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="subcategory_id">Subcategory</label>
									<select id="subcategory_id0" class="subcategory_id form-control" name="detail[subcategory_id][]">
										<option value="" selected>Select Subcategory</option>
									</select>
									<span class="error invalid-feedback" id="error_subcategory_id0"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="times">Execise</label>
									<div>
										<button class="btn btn-default btn-block addexercise" type="button" data-toggle="modal" 
										id="addexercise0" data-target="#addexercisemodal0" data-whatever="@getbootstrap">Select</button>
										<span class="error invalid-feedback" id="error_select_exercise_id0"></span>
									</div>	
								</div>
							</div>	
							{{--<div class="col-md-2">
								<div class="form-group">
									<label for="exercise_id">Exercise</label>
									<select  id="exercise_id0" class="exercise_id form-control" name="detail[exercise_id][]">
										<option value="" selected>Select Exercise</option>
									</select>
									<span class="error invalid-feedback" id="error_exercise_id0"></span>
								</div>
							</div>--}}
							<div class="col-md-1">
								<div class="form-group">
									<label for="reps">Reps</label>
									<select id="reps0" class="reps form-control @error('reps') is-invalid @enderror" name="detail[reps][]">
										<option value='' selected>Select</option>
										@for($i=1;$i<=50;$i++)
											<option value="{{ $i }}" {{ old('reps') == $i ? 'selected' : '' }}>{{ $i }}</option>
										@endfor
									</select>
									<span class="error invalid-feedback" id="error_reps0" ></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="hold">Hold</label>
									<select id="hold0" class="hold form-control @error('hold') is-invalid @enderror" name="detail[hold][]">
										<option value='' selected>Select</option>
										@foreach(config('custom.hold') as $k=> $val)
											<option value="{{ $k }}" {{ old('hold') == $k ? 'selected' : '' }}>{{ $val }}</option>
										@endforeach
									</select>
									<span class="error invalid-feedback" id="error_hold0"></span>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="complete">Complete</label>
									<select id="complete0" class="complete form-control @error('complete') is-invalid @enderror" name="detail[complete][]">
										<option value='' selected>Select</option>
										@for($i=1;$i<=20;$i++)
											<option value="{{ $i }}" {{ old('complete') == $i ? 'selected' : '' }}>{{ $i }}</option>
										@endfor
									</select>
									<span class="error invalid-feedback" id="error_complete0"></span>
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
									<span class="error invalid-feedback" id="error_perform0"></span>
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
									<span class="error invalid-feedback" id="error_times0"></span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="times">Action</label>
									<div>
										<button type="button" class="btn addrow p-0" id="addrow0" title="Add Self exercise"><i class="fa fa-plus"></i></a></button>
										<button type="button" class="btn addadminrow p-0" id="addadminrow0" title="Add Admin Exercise"><i class="fa fa-user-plus"></i></a></button>
										<button type="button" class="btn deleterow p-0" id="deleterow0" title="Remove Exercise"><i class="fa fa-trash"></i></button>
										<div class="modal fade addexercisemodal" id="addexercisemodal0" tabindex="-1" role="dialog" aria-labelledby="exercisModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-xl" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exercisModalLabel">Select Exercise</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>   
										</div>
									</div>	
								</div>
							</div>	
						</div>
					@endif		
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
<script src="{{ asset('dist/js/uploadname.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script> 
<script>
	// var totalcount = 0;
	var totalcount = {{ isset($plan['plan_detail']) && count($plan['plan_detail']) > 0 ? count($plan['plan_detail']) - 1 : 0  }};
	var planDetail = @json($plan['plan_detail'] ?? []);

	$('body').on('click', '.addrow, .addadminrow', function () {
		console.log('call time');
    	var itemrow = $('#itemrow').clone(); // Remove the duplicate id from the cloned row
		// var exercise_id = $('select[id^="exercise_id"]:last');
		var category_id = $('select[id^="category_id"]:last');
		var num = parseInt(category_id.prop("id").match(/\d+/g), 10) + 1;
		var is_admin = $(this).hasClass('addadminrow') ? 1 : 0;
		itemrow.find("select, input").each(function () {
			var currentId = $(this).attr('id');
			if (currentId) {
				var newId = currentId.replace(/\d+/, num);
				$(this).attr('id', newId);
				$(this).removeClass('is-invalid');
			}
		});

		itemrow.find(".error").each(function () {
			var currentId = $(this).attr('id');
			if (currentId) {
				var newId = currentId.replace(/\d+/, num);
				$(this).attr('id', newId);
				$(this).html('')
			}
		});

		itemrow.find(".addrow").attr("id", "addrow" + num);
		itemrow.find(".addadminrow").attr("id", "addadminrow" + num);
		itemrow.find(".deleterow").attr("id", "deleterow" + num);
		itemrow.find(".addexercise").attr("id", "addexercise" + num);
		itemrow.find(".addexercise").attr("data-target","#addexercisemodal"+num)
		itemrow.find(".addexercisemodal").attr("id","addexercisemodal"+num);
		itemrow.find(".addexercisemodal .modal-body .row").empty();

		itemrow.find("input, select").val('');
		itemrow.find("option:selected").removeAttr("selected");
		// update the is_admin field value
		itemrow.find("#is_admin"+num).val(is_admin);
		// Append the new row
		itemrow.find("label").remove()
		$('#itembody').append(itemrow);
    	totalcount++;
	});
	$('body').on('click', '.deleterow', function () {
		if ($("#itembody .itemrow").length > 1) {
			$(this).closest(".itemrow").remove();
			totalcount = totalcount-1;
   		}
	});

	$("#btn-plan-submit").click(function (e) {
		e.preventDefault();
		$("#btn-plan-submit").prop("disabled", true);
		$('#btn-plan-submit').html('Create <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
		$.ajax({
			type: 'POST',
			url: "{{ route('admin.doctor.plan.store') }}",
			// data: $("#frm-plan-submit").serialize(),
			data: new FormData($("#frm-plan-submit")[0]),
			processData: false,
			contentType: false,
			success: function (data) {
				$("#frm-plan-submit .invalid-feedback").html('');
				$('#frm-plan-submit .is-invalid').removeClass('is-invalid');
				$("#btn-plan-submit").prop("disabled", false);
				$('#btn-plan-submit').html('Create');
				if (data.validation_error_responce) {
					$.each(data.validation_error_responce, function (key, val) {
						$.each(val, function (k, v) {
							if (key.startsWith('detail')) {
								var keyNew = key.replace('detail.','');
								keyNew = keyNew.replace('.', '');
								$('#frm-plan-submit #'+keyNew).addClass('is-invalid');
								// $("#frm-plan-submit #error_" + keyNew).html(v);
							} else {
								$('#frm-plan-submit #'+key).addClass('is-invalid');
								$("#frm-plan-submit #error_" + key).html(v);
							}
						});
					});
				} else if(data.code === 200) {
						toastr.success(data.postatus);
						setTimeout(()=>{
							window.location.href = "{{ route('admin.doctor.plan') }}";
						},1000)
				} else {
					toastr.error('Server error');
				}
			}
		});
	});

	$("document").ready(function() {
		$(".category_id").trigger('change');
	});
	$(document).on("change", ".category_id", function(){
		var category_id = $(this).val() || [];
		var num = parseInt($(this).prop("id").match(/\d+/g), 10);
		$.ajax({
			type: 'POST',
			data: {category_id:[category_id]},
			dataType: 'json',
			url: "{{ route('admin.subcategory.by.category') }}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data){
				var dropdown = $("#subcategory_id"+num);
				dropdown.empty(); // Clear existing options
				dropdown.append('<option value="" selected>Select Subcategory</option>');
				$.each(data, function (key, value) {
					var isSubSelected = planDetail[num] && planDetail[num].subcategory_id == key;
					console.log('key', key, isSubSelected)
					dropdown.append('<option value="' + key + '"' + (isSubSelected ? ' selected' : '') + '>' + value + '</option>');
					// dropdown.append('<option value="' + key + '">' + value + '</option>');
				});
				$(".subcategory_id").trigger('change');
			},
			error: function () {
				var dropdown = $("#subcategory_id"+num);
				dropdown.empty();
				dropdown.append('<option value="" selected>Select Subcategory</option>');
			}
		});
	});

	$(document).on("change", ".subcategory_id", function(){
		var subcategory_id = $(this).val() || [];
		var num = parseInt($(this).prop("id").match(/\d+/g), 10);
		var is_admin = $('#is_admin'+num).val();
		var url = is_admin == 1 ?  "{{ route('admin.exercise.by.subcategory') }}" : "{{ route('admin.doctor.exercise.by.subcategory') }}";
		console.log('sub num', num)
		$.ajax({
			type: 'POST',
			data: {subcategory_id:[subcategory_id],is_private:is_admin == 1 ? 0 : ''},
			dataType: 'json',
			url : url,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data){
				var dropdown = $("#exercise_id"+num);
				dropdown.empty(); // Clear existing options
				dropdown.append('<option value="">Select Exercise</option>');

				var modalBody = $("#addexercisemodal" + num + " .modal-body .row");
            	modalBody.empty();
				$.each(data, function (key, value) {
					var isExerSelected = planDetail[num] && planDetail[num].exercise_id == value.id || false;
					dropdown.append('<option value="' + value.id + '" data-obj=\'' + JSON.stringify(value) + '\'' + (isExerSelected ? ' selected' : '') + '>' + value.name + '</option>');
					// dropdown.append('<option value="' + value.id + '" data-obj=\'' + JSON.stringify(value) + '\'>' + value.name + '</option>');
					
					// set select exercise modal
					var exerciseHtml = `
                        <div class="col-md-3" style="border:1px solid lightgray;">
                            <div class="form-group">
                                <div class="exercise-option">
                                    <input type="radio" class="select_exercise_id" id="select_exercise_id${num}" name="detail[select_exercise_id][${num}]" value="${value.id}" data-obj='${JSON.stringify(value)}' ${isExerSelected ? "checked" : ""}>
                                    <label for="select_exercise_id${num}">${value.name}</label>
                                </div>
                                <div class="exercise-img">
                                    <img src="${value.image_url ? value.image_url : '{{ asset('dist/img/placeholder.png') }}'}" class="" height="120px" width="150px">
                                </div>
                            </div>
                        </div>`;
                    modalBody.append(exerciseHtml);
				});
			},
			error: function () {
				var dropdown = $("#exercise_id"+num);
				dropdown.empty();
				dropdown.append('<option value="" selected>Select Exercise</option>');

				var modalBody = $("#addexercisemodal" + num + " .modal-body .row");
            	modalBody.empty();
			}
		});
	});

	$(document).on("change", ".exercise_id", function(){
		var obj = $(this).find('option:selected').data('obj')
		var num = parseInt($(this).prop("id").match(/\d+/g), 10);
		if (obj) { 
			$("#reps"+num).val(obj.reps);
			$("#hold"+num).val(obj.hold);
			$("#complete"+num).val(obj.complete);
			$("#perform"+num).val(obj.perform);
			$("#times"+num).val(obj.times);
		} else {
			$("#reps"+num).val('');
			$("#hold"+num).val('');
			$("#complete"+num).val('');
			$("#perform"+num).val('');
			$("#times"+num).val('');
		}
	});

	$(document).on("change", ".plan_id", function(){
		var plan_id = $(this).val();
		window.location.href = "{{ route('admin.doctor.plan.add') }}" + "?plan_id=" + plan_id;
	});

	$('body').on('change', '.select_exercise_id', function () {
		var selecte_exercise_id = $(this).val();
    	var obj = $(this).data("obj");
		var num = parseInt($(this).prop("id").match(/\d+/g), 10);
		console.log("Selected Exercise ID:", selecte_exercise_id);
    	console.log("Exercise Data:", obj);

		var previous_modal_exercise_id = $("#select_exercise_id0").val();
		console.log('previous_modal_exercise_id',previous_modal_exercise_id);
		if (obj) { 
			$("#reps"+num).val(obj.reps);
			$("#hold"+num).val(obj.hold);
			$("#complete"+num).val(obj.complete);
			$("#perform"+num).val(obj.perform);
			$("#times"+num).val(obj.times);
		} else {
			console.log('obj not', obj)
			$("#reps"+num).val('');
			$("#hold"+num).val('');
			$("#complete"+num).val('');
			$("#perform"+num).val('');
			$("#times"+num).val('');
		}
	});

</script>	
@endsection
