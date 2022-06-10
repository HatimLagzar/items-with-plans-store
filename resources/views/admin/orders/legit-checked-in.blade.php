@php
  /** @var $order \App\Models\Order */
@endphp

@extends('admin.layouts.auth-template')
@section('title')
  {{ __('Success') }}
@endsection
@section('content')
  <section id="tickets" class="mt-5">
    <div class="container">
      <i class="fa fa-check text-center d-block mb-3" style="font-size: 150px"></i>
      <h1 class="mb-4 text-center mx-auto">{{__('Order is legit, but the visitor has already checked in!')}}</h1>
      <h3 class="text-center">{{ __('Full Name:') }} {{ $order->getUser()->getFirstName() }} {{ $order->getUser()->getLastName() }}</h3>
      <h3 class="text-center">{{ __('Event:') }} {{ $order->getTicket()->getTitle() }}</h3>
      <h3 class="text-center">{{ __('Ticket:') }} {{ $order->getTicketPlan()->getName() }}</h3>
      <h3 class="text-center">{{ __('Paid Price:') }} {{ number_format($order->getTicketPlan()->getPrice() / 100, 2) }}€</h3>
    </div>
  </section>
@endsection