@php
  /** @var $tickets \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] */
@endphp

@extends('layouts.app')
@section('title')
  {{ __('Home') }}
@endsection
@section('content')
  <div id="home-page">
    <header id="header">
      <x-navbar/>
      <div id="hero">
        <h1>{!! __('LIVE EVERY DAY AS IF IT IS A FESTIVAL TURN YOUR LIFE INTO A CELEBRATION') !!}</h1>
        <a href="#tickets" class="btn btn-primary mx-auto">{{ __('Browse coming concert') }}</a>
      </div>
    </header>

    <section id="tickets">
      <div class="container">
        <h2 class="text-center">{{ __('Featured Festivals') }}</h2>
        @foreach($tickets as $ticket)
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
                <h3>{{ $ticket->getTitle() }}</h3>
                <h4>{{ $ticket->getCity() }}</h4>
                <h4>{{ $ticket->getLocation() }}</h4>
              </div>
              <div class="col-lg-3 col-sm-4 col-12 d-flex flex-column justify-content-center align-items-center buy-now-wrapper">
                <form action="{{ route('tickets.show', ['id' => $ticket->getId()]) }}">
                  <button class="btn btn-primary buy-ticket"><i class="fa fa-ticket me-2"></i>{{ __('Buy Ticket') }}</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <h2 class="text-center">{{__('Contact Us')}}</h2>
        <div class="container">
          <form action="{{ route('contact') }}" method="POST" class="col-lg-6 col-12 mx-auto">
            @csrf

            <div class="input-group mb-2">
              <input type="text" placeholder="{{__('Name')}}" class="form-control" name="name">
            </div>

            <div class="input-group mb-2">
              <input type="text" placeholder="{{__('Subject')}}" class="form-control" name="subject">
            </div>

            <div class="input-group mb-2">
              <input type="email" placeholder="{{__('Email Address')}}" class="form-control" name="email">
            </div>

            <div class="input-group mb-2">
              <textarea placeholder="{{__('Message')}}" class="form-control" name="message"></textarea>
            </div>

            <div class="input-group">
              <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
@endsection