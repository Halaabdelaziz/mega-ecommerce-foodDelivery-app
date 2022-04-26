@component('mail::message')
# Introduction

change your password 

@component('mail::button', ['url' => 'http://127.0.0.1:8000/resetPassword?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
