@php
  /** @var \App\Models\Order $order */
@endphp

@component('mail::message')
# {{ $order->getTicket()->getTitle() }} {{ __('has been paid successfully') }}

{{ __('Thank you for paying the invoice, here\'s your QR Code:') }}

<div class="container" style="display: block; text-align: center; margin: 10px auto; width: 100%;">
  {!! $qrCode !!}
</div>

<strong>{{ __('Please make sure to bring this QR Code with you.') }}</strong>

{{__('Thanks')}},<br>
{{ config('app.name') }}
@endcomponent
