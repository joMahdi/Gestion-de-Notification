@component('mail::message')
# {{ $content['name'] }}


{{ $content['email'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

{{ $content['msg'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
