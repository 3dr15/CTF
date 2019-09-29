@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => route('index')])
        {{ config('app.name') }}
    @endcomponent
@endslot

@component('mail::button', ['url' => route('password.reset', $token)])
    Reset Password
@endcomponent


@slot('footer')
    @component('mail::footer')
        © {{ date('Y') }} {{ config('app.name') }}.
    @endcomponent
@endslot

@endcomponent