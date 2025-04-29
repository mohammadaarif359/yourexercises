@extends('web_new.layouts.clinic.main')
@section('content')
    @php $plan = $data->plan; @endphp
    <div class="main-section ps-about">
        <div class="container">
            <div class="header-section text-center mt-3 ps-border-bottom">
                <div class="row justify-content-between">
                    <div class="col-md-4 mb-3 order-1 order-md-2" data-aos="fade-right" data-aos-duration="1000">
                        @if($plan['image_url'])
                        <img alt="" class="img-fluid rounded"
                            src="{{ $plan['image_url'] }}" />
                        @endif    
                    </div>
                    <div class="col-md-7 text-left mb-3 order-2 order-md-1" data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="paragraph-xxl cl-dblue">
                            {{ $plan['name'] }}
                        </h1>
                        <p class="cl-gray paragraph-lg">
                            {{ $plan['description'] }}
                        </p>
                        <div class="d-flex justify-content-between flex-wrap">
                            @if($data['avg_rating'] > 0)
                            <h2 class="paragraph-md cl-dblue">Rating <i class="fas fa-star"></i> {{ $data['avg_rating'] }}</h2>
                            @endif
                            <h2 class="paragraph-md cl-dblue"><i class="fas fa-dumbbell"></i> {{ $data['exercise_count'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- lang section and search bar -->
            {{--@include('.web_new.patient.plan.partail.searchbar')--}}
            
            @foreach($plan['doctor_plan_detail'] as $de => $detail)
            <div class="card ps-exercise-detail mt-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="row d-flex">
                    @php $ex_img_url = $detail['exercise']['image_url'] ? $detail['exercise']['image_url'] : asset('web_new/assets/img/profile-img.png') @endphp  
                    <div class="col-md-3 my-2 text-center">
                        <img id="exercise-logo{{$de}}" data-num={{$de}} class='' alt="" src="{{ $ex_img_url }}">
                    </div>
                    <div class="details col-md-6 my-2">
                        <div class="row h-100">
                            <div class="col-12 order-2 order-md-1 p-0">
                                <h4>{{ $detail['exercise']['name'] }}</h4>
                                <h5>{{ $detail['category']['name'] }} - {{ $detail['subcategory']['name'] }}</h5>
                                <p class="heading">{{ $detail['exercise']['description'] }}</p>
                            </div>
                            <div class="col-12  order-1 order-md-2 p-0 mt-1 mb-2">
                                <span><i class="fa-solid fa-arrows-rotate ps-cursor-pointer flip-btn" data-target='#exercise-logo{{$de}}' data-num={{$de}}></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 my-2 d-flex flex-column justify-content-between">
                        <div>
                            <div class="mb-2 row ps-label-text">
                                <label class="col-4  p-0 m-0" for="textcheck">Reps</label>
                                <div class="select-wrapper col-8 pr-0" id="textcheck">
                                    <select class="form-select" id="reps">
                                        <option value='' selected>Select</option>
                                        @for($i=1;$i<=50;$i++)
                                            <option value="{{ $i }}" {{ old('reps', $detail['reps']) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row ps-label-text">
                                <label class="col-4  p-0 m-0" for="textcheck">Hold</label>
                                <div class="select-wrapper col-8 pr-0" id="textcheck">
                                    <select class="form-select" id="hold">
                                        <option value='' selected>Select</option>
                                        @foreach(config('custom.hold') as $k=> $val)
                                            <option value="{{ $i }}" {{ old('hold', $detail['hold']) == $k ? 'selected' : '' }}>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row ps-label-text">
                                <label class="col-4  p-0 m-0" for="textcheck">Complete (Sets)</label>
                                <div class="select-wrapper col-8 pr-0" id="textcheck">
                                    <select class="form-select" id="complete">
                                        <option value='' selected>Select</option>
                                        @for($i=1;$i<=20;$i++)
                                            <option value="{{ $i }}" {{ old('complete', $detail['complete']) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row ps-label-text">
                                <label class="col-4  p-0 m-0" for="textcheck">Perform</label>
                                <div class="select-wrapper col-8 pr-0" id="textcheck">
                                    <select class="form-select" id="perform">
                                        <option value='' selected>Select</option>
                                        @for($i=1;$i<=20;$i++)
                                            <option value="{{ $i }}" {{ old('perform', $detail['perform']) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row ps-label-text">
                                <label class="col-4  p-0 m-0" for="textcheck">Times</label>
                                <div class="select-wrapper col-8 pr-0" id="textcheck">
                                    <select class="form-select" id="times">
                                        <option value='' selected>Select</option>
                                        @foreach(config('custom.times') as $k=> $val)
                                            <option value="{{ $k }}" {{ old('times', $detail['times']) == $k ? 'selected' : '' }}>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>            
                        </div>
                        <div class="d-flex align-items-end">
                            <!-- video attacments btn -->
                            @if(isset($detail->exercise->attachments) && count($detail->exercise->attachments) > 0)   
                            <button class="ps-btn sm-btn primary-btn ps-header-btn mr-2 ml-0 videoModalBtn" data-toggle="modal"
                                data-target="#VideoModal" type="button" id='videoModalBtn{{$de}}' data-attachments='@json($detail->exercise->attachments)'>
                                <i class="fa-solid fa-video"></i>
                            </button>
                            @endif
                            <!-- check if rating extis show rating other wise rating btn -->
                            @php $ex_feedback = null; @endphp
                            @if($data->feedback)
                                @php $ex_feedback = $data->feedback->where('exercise_id', $detail['doctor_exercise_id'])->first(); @endphp
                            @endif     
                            @php 
                                $feedback_input['assign_id'] = $data['id'];
                                $feedback_input['plan_id'] = $data['plan_id'];
                                $feedback_input['exercise_id'] = $detail['doctor_exercise_id'];
                                $feedback_input['exercise_name'] = $detail['exercise']['name'];
                            @endphp
                            <button class="ps-btn sm-btn primary-btn ps-header-btn mr-2 ml-0 ratingModalBtn" id='ratingModalBtn{{$de}}' data-toggle="modal"
                                data-target="#exampleModal" type="button" data-feedback_input='@json($feedback_input)' data-feedback='@json($ex_feedback)'>
                                Rate Exercise
                            </button>
                            @if($ex_feedback)
                                <h2 class="paragraph-md cl-dblue gap-1 d-flex mr-2 mb-0">
                                    <i class="fas fa-star"></i><span class="mx-1">{{ $ex_feedback->rating }}</span>
                                </h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
 
        <!-- rating modal -->
        @include('web_new.patient.plan.partail.feedback')

        <!-- attachments modal -->
        @include('web_new.patient.plan.partail.attachment')
    </div>

@endsection
@section('pagejs')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script> 
    let flippedMap = {};

    $('.flip-btn').on('click', function () {
        const targetSelector = $(this).data('target');

        // Flip state tracking
        flippedMap[targetSelector] = !flippedMap[targetSelector];

        // Apply flip
        $(targetSelector).css({
            'transform': flippedMap[targetSelector] ? 'scaleX(-1)' : 'scaleX(1)',
            'transition': 'transform 0.3s ease'
        });
    });
    $('.ratingModalBtn').on('click', function () {
        var feedback_input = $(this).attr('data-feedback_input');
        feedback_input = JSON.parse(feedback_input);
        $('#ratingModal .modal-title').html(`Rate Exercise - ${feedback_input.exercise_name}`)
        $("#feedback-form #assign_id").val(feedback_input.assign_id);
        $("#feedback-form #plan_id").val(feedback_input.plan_id);
        $("#feedback-form #exercise_id").val(feedback_input.exercise_id);

        var feedback = $(this).attr('data-feedback');
        feedback = JSON.parse(feedback);
        if(feedback) {
            $("#feedback-form #id").val(feedback.id);
            $("#feedback-form #rating").val(feedback.rating);
            $("#feedback-form #comment").val(feedback.comment);
            $("#feedback-form #rating").prop('disabled', true);
            $("#feedback-form #comment").prop('disabled', true);
            if(feedback.answer) {
                var answer = feedback.answer
                for(const key in answer) {
                    $("#feedback-form #"+key).val(answer[key]);
                }
            }
        }
        $('#ratingModal').modal('show');
    });
    $('.videoModalBtn').on('click', function () {
        var attachments = $(this).attr('data-attachments');
        attachments = JSON.parse(attachments);
        const imageExtensions = @json(config('custom.img_extension'));
        const videoExtensions = @json(config('custom.video_extension'));
        let html = '';
        attachments.forEach(function (attach) {
            if (attach.image_url) {
                const url = attach.image_url;
                const extension = url.split('.').pop().toLowerCase();

                if (imageExtensions.includes(extension)) {
                    html += `
                        <div class="card col-cl6 col-smvl-6 col-lgcl-4">
                            <img src="${url}" class="img-fluid" alt="Image">
                        </div>
                    `;
                } else if (videoExtensions.includes(extension)) {
                    html += `
                        <div class="card col-cl6 col-smvl-6 col-lgcl-4">
                            <video width="100%" height="228" controls Autoplay=autoplay src="${url}" type="video/"+extension>
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    `;
                    /*html += `
                        <div class="card col-cl6 col-smvl-6 col-lgcl-4">
                            <iframe width="100%" height="228" src="${url}"
                                title="Exercise video" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                            </iframe>
                        </div>
                    `;*/
                }
            }
        });
        $('.video-content').html(html);
    });

    $("#feedback-btn").click(function (e) {
        e.preventDefault();
        $("#feedback-btn").prop("disabled", true);
        $('#feedback-btn').html('Save <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
        $("#feedback-form").find(':input:disabled').prop('disabled', false);

        $.ajax({
            type: 'POST',
            url: "{{ route('patient.plan.feedback.store') }}",
            data: $("#feedback-form").serialize(),
            success: function (data) {
                $("#feedback-form .error-helper").html('');
                $("#feedback-btn").prop("disabled", false);
                $('#feedback-btn').html('Save');
                if (data.error) {
                    $.each(data.error, function (key, val) {
                        $.each(val, function (k, v) {
                            $("#feedback-form #error_" + key).html(v);
                        });
                    });
                } else if(data.code === 200) {
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });
                    setTimeout(()=>{
                        window.location.reload(); 
                    },2000)
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Something went wrong'
                    });
                }
            }
        });
    });
</script>    
@endsection