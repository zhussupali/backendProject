@component('mail::message')
# Welcome to twettie.com

You have registered in our site. Press "Go" to continue surfing!

@component('mail::button', ['url' => 'http://localhost:8000/wall'])
Go!
@endcomponent

Thanks, {{ $obj->name }} <br>
{{ config('app.name') }}
@endcomponent