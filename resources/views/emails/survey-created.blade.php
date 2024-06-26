@component('mail::message')
greetings {{$domainName}} admin, a new survey has been created with the following url

{{$surveyUrl}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
