
@component('mail::message')

        # Hello! {{$name}}
 
#  Withdrawal Notification

### Your transaction has been declined

        * Name on Card :  {{$name_on_card}},
        * Transaction type : # Withdrawal,
     	* Amount :           {{$amount}}

	### It seems to appear that the payment information you  used to make this transaction is not correct.
You can retry the transaction with the correct payment information. To learn more about this you can chat with our agent on the site.
{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Regards,<br>{{ config('app.name') }}
@endif

@endcomponent
