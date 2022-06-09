@php
  /** @var \App\Models\Order $order */
@endphp

@component('mail::message')
  # {{ $order->getTicket()->getTitle() }} {{ __('Order Invoice') }}

  @component('mail::button', ['url' => $order->getInvoiceUrl()])
    Click Here
  @endcomponent

  Thanks,<br>
  {{ config('app.name') }}
@endcomponent
