<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
	const cat_sub_multi_js = "{{ isset($cat_sub_multi_js) ? $cat_sub_multi_js : false  }}"
	
	$('#name').on('blur', function() {
		var val = $('#name').val()
		var slug = val.trim().toLowerCase().replace(/\s+/g, '-')
		$('#slug').val(slug)
	});	
	$('.select2').select2();

	if(cat_sub_multi_js) {
		$("document").ready(function() {
			$("#category_id").trigger('change');
		});
		
		$(document).on("change", "#category_id", function(){
			var category_id = $(this).val() || [];
			
			var old_subcategory_id = @json(old('subcategory_id', []));
			var subcategory_id = $("#subcategory_id").val()
			if(!subcategory_id || subcategory_id.length === 0) {
				subcategory_id = old_subcategory_id
			}
			$.ajax({
				type: 'POST',
				data: {category_id:category_id},
				dataType: 'json',
				url: "{{ route('admin.subcategory.by.category') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function(data){
					var dropdown = $("#subcategory_id");
					dropdown.empty(); // Clear existing options
					$.each(data, function (key, value) {
						var isSubSelcted = subcategory_id.includes(key.toString());
						dropdown.append('<option value="' + key + '"' + (isSubSelcted ? ' selected' : '') + '>' + value + '</option>');
						// dropdown.append('<option value="' + key + '">' + value + '</option>');
					});
					$("#subcategory_id").trigger('change');
				},
				error: function () {
					var dropdown = $("#subcategory_id");
					dropdown.empty();
				}
			});
		});

		$(document).on("change", "#subcategory_id", function(){
			var subcategory_id = $(this).val() || [];
			var exercise_id = $("#exercise_id").val();
			console.log('selected ex', $('#exercise_id option:selected').val());
			$.ajax({
				type: 'POST',
				data: {subcategory_id:subcategory_id},
				dataType: 'json',
				url: "{{ route('admin.exercise.by.subcategory') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function(data){
					var dropdown = $("#exercise_id");
					dropdown.empty(); // Clear existing options
					dropdown.append('<option value="">Select Exercise</option>');
					$.each(data, function (key, value) {
						console.log('subcategory_id ', subcategory_id ,'exercise_id =', exercise_id, 'id ', value.id);
						var isSelected = exercise_id == value.id;
						// dropdown.append('<option value="' + key + '"' + (isSelcted ? ' selected' : '') + '>' + value + '</option>');
						// dropdown.append('<option value="' + value.id + '" data-obj=\'' + JSON.stringify(value) + '\'>' + value.name + '</option>');
						dropdown.append('<option value="' + value.id + '" data-obj=\'' + JSON.stringify(value) + '\'' + (isSelected ? ' selected' : '') + '>' + value.name + '</option>');					
					});
				},
				error: function () {
					var dropdown = $("#exercise_id");
					dropdown.empty();
				}
			});
		});
	}	

	@if(Session::get('success'))
	/*$(document).Toasts('create', {
		class: 'bg-success',
		title: 'Success',
		autohide: true,
		delay: 750,
		body: '{!! Session::get('success') !!}'
    })*/
	toastr.success('{!! Session::get('success') !!}')
	@elseif(Session::get('error'))
	/*$(document).Toasts('create', {
		class: 'bg-danger',
		title: 'Error',
		autohide: true,
		delay: 750,
		body: '{!! Session::get('error') !!}'
    })*/
	toastr.error('{!! Session::get('error') !!}')
	@endif
</script>