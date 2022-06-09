@php
  /** @var $orders \App\Models\Order[]|\Illuminate\Database\Eloquent\Collection */
@endphp
@extends('admin.layouts.auth-template')
@section('title')
  Orders
@endsection
@section('content')
  <div class="row mt-5">
    <div class="col">
      <h1>Orders List</h1>
    </div>
  </div>

  <table class="table table-hover  mt-5">
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Type</th>
      <th>Price</th>
      <th>Client</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Invoice Url</th>
      <th>Created At</th>
      <th>Actions</th>
    </tr>
    @foreach($orders as $key => $order)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $order->getTicket()->getTitle() }}</td>
        <td>{{ $order->getTicketPlan()->getName() }}</td>
        <td>€ {{ number_format($order->getTicketPlan()->getPrice() / 100, 2) }}</td>
        <td>{{ $order->getUser()->getFirstName() }} {{ $order->getUser()->getLastName() }}</td>
        <td>{{ $order->getUser()->getPhoneNumber() }}</td>
        <td>{{ $order->getUser()->getEmail() }}</td>
        <td><a href="{{ $order->getInvoiceUrl() }}">{{ $order->getInvoiceUrl() }}</a></td>
        <td>{{ $order->getCreatedAt() }}</td>
        <td>
          <a href="{{ route('admin.orders.send-invoice', ['id' => $order->getId()]) }}" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane me-2"></i>Send Invoice</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection