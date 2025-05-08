@component('mail::message')
# Hello {{$data['name']}},

{{$data['message']}}

@component('mail::button', ['url'=>$data['url'], 'color' => 'success'])
Review Feedback
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
