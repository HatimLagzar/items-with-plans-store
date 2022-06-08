@php
  /** @var $tickets \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] */
@endphp

@extends('layouts.app')
@section('title')
  Home
@endsection
@section('content')
  <div id="home-page">
    <header id="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">{{ __('Home') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">{{ __('Register') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">{{ __('Contact') }}</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
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
                <form action="#">
                  <button class="btn btn-primary buy-ticket"><i class="fa fa-ticket me-2"></i>{{ __('Buy Ticket') }}</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach

        <a href="#" class="btn btn-primary see-all-tickets">{{ __('See All Tickets') }}</a>
      </div>
    </section>

    <footer id="footer">
      <div class="container">
        <p>{!! __('All rights reserved &copy; 2022') !!}</p>
      </div>
    </footer>
  </div>
@endsection