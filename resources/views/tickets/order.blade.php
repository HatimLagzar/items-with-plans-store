@php
  /** @var $plan \App\Models\TicketPlan */
@endphp

@extends('layouts.app')
@section('title')
  {{ __('Order') }}
@endsection
@section('content')
  <x-navbar/>

  <section id="order-ticket">
    <div class="container">
      <h1 class="mb-5">Order Ticket</h1>

      <div class="order-info">
        <h2 class="mb-4">{{ __('Ticket Details') }}</h2>
        <h3 class="mb-2">{{__('Event Name:')}} {{ $plan->getTicket()->getTitle() }}</h3>
        <h4 class="mb-2">{{__('Ticket Type:')}} {{ $plan->getName() }}</h4>
        <h5 class="mb-2">{{__('City:')}} {{ $plan->getTicket()->getCity() }}</h5>
        <h5 class="mb-2">{{__('Location:')}} {{ $plan->getTicket()->getLocation() }}</h5>
        <h5>{{__('Price:')}} € {{ number_format($plan->getPrice() / 100, 2) }}</h5>
      </div>

      <div id="user-personal-info" class="col-12 col-lg-8">
        <h2 class="mt-5 mb-4">{{ __('Please fill in your personal information, our team will contact you with the invoice.') }}</h2>
        <form action="{{ route('tickets.plans.store', ['id' => $plan->getId()]) }}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="firstNameInput" class="form-label">{{__('First Name')}}</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="firstNameInput" placeholder="{{ __('First Name') }}" required>
            @error('first_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="lastNameInput" class="form-label">{{__('Last Name')}}</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="lastNameInput" placeholder="{{ __('Last Name') }}" required>
            @error('last_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="emailInput" class="form-label">{{__('Email Address')}}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="emailInput" placeholder="{{ __('Email Address') }}" required>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="phoneInput" class="form-label">{{__('Phone Number')}}</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phoneInput" placeholder="{{ __('Phone Number') }}" required>
            @error('phone')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label class="form-label">{{__('Payment Method')}}</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" value="{{ \App\Models\Order::PAYMENT_TYPE_CREDIT_CARD }}" id="flexRadioDefault1" required checked>
              <label class="form-check-label" for="flexRadioDefault1">
                {{ __('Credit Card') }}
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" value="{{ \App\Models\Order::PAYMENT_TYPE_BANK_TRANSFER }}" id="flexRadioDefault2" required>
              <label class="form-check-label" for="flexRadioDefault2">
                {{ __('Bank transfer') }}
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="payment_type" value="{{ \App\Models\Order::PAYMENT_TYPE_POSTEPAY }}" id="flexRadioDefault3" required>
              <label class="form-check-label" for="flexRadioDefault3">
                {{ __('Postepay') }}
              </label>
            </div>
          </div>

          <p class="mt-3 text-muted">{!! __('terms-and-conditions-notice', ['url' => route('terms')]) !!}</p>

          <button class="btn btn-primary"><i class="fa fa-paper-plane me-2"></i>{{ __('Checkout') }}</button>
        </form>
      </div>
    </div>
  </section>
@endsection