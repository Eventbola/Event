@component('mail::message')
# Introduction

Hello dear you are invited to join the event :)

@component('mail::button', ['url' => 'http://localhost:8000'] )
    Please click here
@endcomponent
<strong>if you have the problem with button login please click this link instead <strong>
        http://localhost:8000<br>
        Thanks,<br>
{{ config('app.name') }}
@endcomponent
