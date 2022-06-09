@php
  /** @var $ticket \App\Models\Ticket */
@endphp

@extends('layouts.app')
@section('title')
  {{ __('Success') }}
@endsection
@section('content')
  <x-navbar/>

  <section id="tickets">
    <div class="container">
      <i class="fa fa-check text-center d-block mb-3" style="font-size: 150px"></i>
      <h1 class="mb-4 w-75 text-center mx-auto">{{__('Your order was sent to our team successfully, and a confirmation email was sent to your email address, you\'ll soon be contacted by our team!')}}</h1>
    </div>
  </section>
@endsection