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
							<label for="name">Name</label>
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
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
							<textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description') }}</textarea>
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
				<div class='row itemrow' id='itemrow'>
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
                    {{--<div class="col-md-2 col-sm-12">
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
								<button type="button" class="btn addrow" id="addrow0"><i class="fa fa-plus"></i></a>
								<button type="button" class="btn deleterow" id="deleterow0"><i class="fa fa-trash"></i></button>
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
													{{--@for($i = 1; $i <= 20; $i++)
													<div class="col-md-3" style='border:1px solid lightgray;'>
														<div class="form-group">
															<div class="exercise-option">
																<input type="radio" class="select_exercise_id" id="select_exercise_id{{$i}}" name="detail[select_exercise_id][]" value="exercise{{$i}}">
																<label for="select_exercise_id{{$i}}">Exercise {{$i}}</label>
															</div>
															<div class="exercise-img">
																<img src="{{ asset('dist/img/placeholder.png') }}" class="" height="120px" width="150px">
															</div>
														</div>
													</div>
													@endfor--}}
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
	var totalcount = 0;
	$('body').on('click', '.addrow', function () {
    	var itemrow = $('#itemrow').clone(); // Remove the duplicate id from the cloned row
		var category_id = $('select[id^="category_id"]:last');
		var num = parseInt(category_id.prop("id").match(/\d+/g), 10) + 1;
		
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
		itemrow.find(".addexercise").attr("id", "addexercise" + num);
		itemrow.find(".addexercise").attr("data-target","#addexercisemodal"+num)
		itemrow.find(".addexercisemodal").attr("id","addexercisemodal"+num);
		itemrow.find(".addexercisemodal .modal-body .row").empty();

		itemrow.find("input, select").val('');
		itemrow.find("option:selected").removeAttr("selected");
		// Append the new row
		itemrow.find("label").remove()
		$('#itembody').append(itemrow);
    	totalcount++;
	});
	$('body').on('click', '.deleterow', function () {
		if ($("#itembody .itemrow").length > 1) {
			$(this).closest(".itemrow").remove();
			totalcount = totalcount-1;
			console.log('count after rmo', totalcount);
   		}
	});	

	$("#btn-plan-submit").click(function (e) {
		e.preventDefault();
		$("#btn-plan-submit").prop("disabled", true);
		$('#btn-plan-submit').html('Create <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
		$.ajax({
			type: 'POST',
			url: "{{ route('admin.plan.store') }}",
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
								console.log('keyNew',keyNew)
								$('#frm-plan-submit #'+keyNew).addClass('is-invalid');
								if(keyNew.startsWith('select_exercise_id')) {
									var but_num = parseInt(keyNew.match(/\d+/g), 10)
									console.log('but_num', but_num)
									$('#frm-plan-submit #addexercise'+but_num).addClass('btn-danger')
								}
								// $("#frm-plan-submit #error_" + keyNew).html(v);
							} else {
								console.log('key', key);
								$('#frm-plan-submit #'+key).addClass('is-invalid');
								$("#frm-plan-submit #error_" + key).html(v);
							}
						});
					});
				} else if(data.code === 200) {
						toastr.success(data.postatus);
						setTimeout(()=>{
							window.location.href = "{{ route('admin.plan') }}";
						},1000)
				} else {
					toastr.error('Server error');
				}
			}
		});
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
					dropdown.append('<option value="' + key + '">' + value + '</option>');
				});
			},
			error: function () {
				var dropdown = $("#subcategory_id"+num);
				dropdown.empty();
			}
		});
	});

	$(document).on("change", ".subcategory_id", function(){
		var subcategory_id = $(this).val() || [];
		var num = parseInt($(this).prop("id").match(/\d+/g), 10);
		$.ajax({
			type: 'POST',
			data: {subcategory_id:[subcategory_id]},
			dataType: 'json',
			url: "{{ route('admin.exercise.by.subcategory') }}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data){
				var dropdown = $("#exercise_id"+num);
				dropdown.empty(); // Clear existing options
				dropdown.append('<option value="">Select Exercise</option>');

				var modalBody = $("#addexercisemodal" + num + " .modal-body .row");
				modalBody.empty(); // clear existing select modal
				$.each(data, function (key, value) {
					console.log('value', value)
					dropdown.append('<option value="' + value.id + '" data-obj=\'' + JSON.stringify(value) + '\'>' + value.name + '</option>');

					// set select exercise modal
					var exerciseHtml = `
                        <div class="col-md-3" style="border:1px solid lightgray;">
                            <div class="form-group">
                                <div class="exercise-option">
                                    <input type="radio" class="select_exercise_id" id="select_exercise_id${num}" name="detail[select_exercise_id][${num}]" value="${value.id}" data-obj='${JSON.stringify(value)}'>
                                    <label for="select_exercise_id${value.id}">${value.name}</label>
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
			console.log('obj not', obj)
			$("#reps"+num).val('');
			$("#hold"+num).val('');
			$("#complete"+num).val('');
			$("#perform"+num).val('');
			$("#times"+num).val('');
		}
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
