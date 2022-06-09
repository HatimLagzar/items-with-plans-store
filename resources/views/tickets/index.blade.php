@php
  /** @var $orders \App\Models\Order[]|\Illuminate\Database\Eloquent\Collection */
@endphp
@extends('layouts.app')
@section('title')
  Tickets
@endsection
@section('content')
  <x-navbar/>
  <div class="container" style="height: 100%">
    <div class="row mt-5">
      <div class="col">
        <h1>{{ __('Your Tickets') }}</h1>
      </div>
    </div>

    <table class="table bg-transparent text-white mt-5">
      <tr>
        <th>#</th>
        <th>{{__('Title')}}</th>
        <th>{{__('City')}}</th>
        <th>{{__('Location')}}</th>
        <th>{{ __('Date / Time') }}</th>
        <th>{{ __('Ticket Type') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Bought At') }}</th>
      </tr>
      @foreach($orders as $key => $order)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $order->getTicket()->getTitle() }}</td>
          <td>{{ $order->getTicket()->getCity() }}</td>
          <td>{{ $order->getTicket()->getLocation() }}</td>
          <td>{{ $order->getTicket()->getDateAndTime() }}</td>
          <td>{{ $order->getTicketPlan()->getName() }}</td>
          <td>{{ $order->getTicketPlan()->getPrice() }}</td>
          <td>{{ $order->getCreatedAt() }}</td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection