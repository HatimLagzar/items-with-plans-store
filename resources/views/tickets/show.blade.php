@php
  /** @var $ticket \App\Models\Ticket */
@endphp

@extends('layouts.app')
@section('title')
  {{ $ticket->getTitle() }}
@endsection
@section('content')
  <x-navbar/>

  <section id="tickets">
    <div class="container">
      <h2 class="text-center mb-2">{{ $ticket->getTitle() }}</h2>
      <h4 class="text-center">{{ $ticket->getCity() }}</h4>
      <h4 class="text-center mb-5">{{ $ticket->getLocation() }}</h4>
      @foreach($ticket->getPlans() as $plan)
        <div class="ticket-item">
          <div class="row">
            <div class="col-lg-2 col-sm-2 col-3 text-center d-flex flex-column justify-content-center align-items-center">
                <span class="ticket-day">
                  {{ $ticket->getDateAndTime()->day }}<br>
                  {{ $ticket->getDateAndTime()->shortMonthName }}
                </span>
              <span class="ticket-time">{{ $ticket->getDateAndTime()->format('h:i A') }}</span>
            </div>
            <div class="col-lg-7 col-sm-6 col-9 d-flex flex-column justify-content-center ticket-title">
              <h3>{{ $plan->getName() }}</h3>
              <h3>€ {{ number_format($plan->getPrice() / 100, 2) }}</h3>
              <h4>{{ $plan->getStock() . ' ' . __('Tickets left') }}</h4>
            </div>
            <div class="col-lg-3 col-sm-4 col-12 d-flex flex-column justify-content-center align-items-center buy-now-wrapper">
              <form action="{{ route('tickets.plans.order', ['id' => $plan->getId()]) }}">
                <button class="btn btn-primary buy-ticket"><i class="fa fa-ticket me-2"></i>{{ __('Buy Ticket for ') . '€' . number_format($plan->getPrice() / 100, 2) }}</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection