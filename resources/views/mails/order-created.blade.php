@php
  /** @var \App\Models\Order $order */
@endphp

@component('mail::message')
# {{ __('Order created successfully') }}

{{ __('Hi') }},
{{ __('You successfully bought') }} {{ $ticket->getTitle() }} {{ __('type') }} {{ $ticketPlan->getName() }} {{ __('for') }} €{{ number_format($ticketPlan->getPrice() / 100, 2) }}
{{ __('You\'ll be contacted soon by our team to confirm your order and pay the invoice with the requested method.') }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
