
@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello! {{$name}}
@endif
@endif

 Thank you for registering with us, you have to activate your account by filling in some required information. These info are used to verify your account across all our services. If you have any question you can contact us at support@Cryptoinvestments.com

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
             $color = 'blue';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => route('not.verified', $email_token), 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset



{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Regards,<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below
into your web browser: [{{ route('not.verified',$email_token)}}]({{ route('not.verified',$email_token) }})
@endcomponent
@endisset
@endcomponent
