@component('mail::message')
# Hello {{$data['name']}},

{{$data['message']}}

Email: {{ $data['email'] }}
<br/>
Password: {{ $data['password'] }}

@component('mail::button', ['url'=>$data['url'], 'color' => 'success'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
