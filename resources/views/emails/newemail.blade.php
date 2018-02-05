@component('mail::message')
# Introduction

This is a new messege notification my name is {{$user->name}}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
