@component('mail::message')
# You have been registered successfully!

Hey {{ $signee->name }}, get in there and enjoy the features we have to offer!

@component('mail::button', ['url' => route('tasks.show')])
Get Started
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
