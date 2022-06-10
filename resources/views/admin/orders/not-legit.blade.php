@extends('admin.layouts.auth-template')
@section('title')
  {{ __('Not legit') }}
@endsection
@section('content')
  <section id="tickets" class="mt-5">
    <div class="container">
      <i class="fa fa-cross text-center d-block mb-3" style="font-size: 150px"></i>
      <h1 class="mb-4 text-center mx-auto">{{__('Order not found')}}</h1>
    </div>
  </section>
@endsection