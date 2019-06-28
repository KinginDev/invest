
@component('mail::message')

        # Hello! {{$name}}
 
# {{$introLine}}

### Here is What you need to know

        * Refrence Number : {{$trans_ref}},
        * Transaction type : #Withdrawal,
     	 * Amount : {{$amount}}

	### This transaction was Made at {{ date('M j, Y h:ia',strtotime($posted_at))}}
{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Regards,<br>{{ config('app.name') }}
@endif

@endcomponent
