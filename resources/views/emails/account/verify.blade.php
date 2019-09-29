@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => route('index')])
        {{ config('app.name') }}
    @endcomponent
@endslot

# Hello {{ $name }}!

@component('mail::button', ['url' => route('verify', $token)])
    Confirm email
@endcomponent

@slot('footer')
    @component('mail::footer')
        © {{ date('Y') }} {{ config('app.name') }}.
    @endcomponent
@endslot

@endcomponent
