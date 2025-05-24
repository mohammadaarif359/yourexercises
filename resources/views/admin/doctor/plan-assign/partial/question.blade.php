@php $config_diffculty = config('custom.feedback_how_was_exercise'); @endphp
<!-- feedback questionary -->
<div id='accordion'>
    <div class="card card-primary card-outline">

        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{$fcount}}" aria-expanded="false">
            <div class="card-header">
                <h6 class="w-100">
                    Feedback -  {{ date('d-M-y h:i:a', strtotime($feedback['updated_at'])) }}
                    <span class="float-right"><i class="fas fa-star mr-1"></i> {{ $feedback['rating'] }}</span>
                </h6>
            </div>
        </a>
        <div id="collapseOne{{$fcount}}" class="collapse" data-parent="#accordion" style="">
            <div class="card-body">
                <div class="text-muted">
                @php $ques_count = 1; @endphp
                @foreach(config('custom.feedback_question_summary') as $k=> $ques)
                    @if($k == 'how_was_exercise')
                    <p class="text-sm">
                    <b class="d-block">Q{{$ques_count}}: {{ $ques }}</b>
                    Ans: {{ $feedback['answer'][$k] ? $config_diffculty[$feedback['answer'][$k]] : '' }}
                    </p>
                    @else
                    <p class="text-sm">
                        <b class="d-block">Q{{$ques_count}}: {{ $ques }}</b>
                        Ans: {{ $feedback['answer'][$k] ?? '' }}
                    </p>
                    @endif
                    @php $ques_count++; @endphp
                @endforeach
                <p class="text-sm">
                    <b class="d-block">Q{{$ques_count++}}: Comment</b>
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
        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{$fcount}}{{$ke}}" aria-expanded="false">
            <div class="card-header">
                <h6 class="w-100">
                    Feedback -  {{ date('d-M-y h:i:a', strtotime($history['updated_at'])) }}
                    <span class="float-right"><i class="fas fa-star mr-1"></i> {{ $history['rating'] }}</span>
                </h6>
            </div>
        </a>
        <div id="collapseOne{{$fcount}}{{$ke}}" class="collapse" data-parent="#accordion" style="">
            <div class="card-body">
                <div class="text-muted">
                @php $ques_count = 1; @endphp
                @foreach(config('custom.feedback_question_summary') as $k=> $ques)
                    @if($k == 'how_was_exercise')
                    <p class="text-sm">
                    <b class="d-block">Q{{$ques_count}}: {{ $ques }}</b>
                    Ans: {{ $history['answer'][$k] ? $config_diffculty[$history['answer'][$k]] : '' }}
                    </p>
                    @else
                    <p class="text-sm">
                        <b class="d-block">Q{{$ques_count}}: {{ $ques }}</b>
                        Ans: {{ $history['answer'][$k] ?? '' }}
                    </p>
                    @endif
                    @php $ques_count++; @endphp
                @endforeach
                <p class="text-sm">
                    <b class="d-block">Q{{$ques_count++}}: Comment</b>
                    Ans: {{ $history['comment'] ?? '' }}
                </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>