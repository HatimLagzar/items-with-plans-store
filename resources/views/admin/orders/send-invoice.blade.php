@php
  /** @var $order \App\Models\Order */
@endphp
@extends('admin.layouts.auth-template')
@section('title')
  Orders
@endsection
@section('content')
  <div class="row mt-5">
    <div class="col">
      <h1>Send Invoice</h1>
    </div>
  </div>

  <form action="{{ route('admin.orders.send', ['id' => $order->getId()]) }}" method="POST" class="col-lg-6 col-12">
    @csrf
    <div class="form-group mb-2">
      <label for="urlInput">Invoice URL</label>
      <input type="url" name="invoice_url" class="form-control" id="urlInput" required>
    </div>

    <button class="btn btn-primary"><i class="fa fa-paper-plane me-2"></i>Send Invoice</button>
  </form>
@endsection