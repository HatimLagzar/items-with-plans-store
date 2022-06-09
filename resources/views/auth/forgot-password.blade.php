@extends('layouts.app')
@section('title')
  {{ __("Reset Password") }}
@endsection
@section('content')
  <x-navbar/>
  <div class="container" style="height: 100%">
    <section id="register-section">
      <h1 class="section-title">{{__('Reset your password')}}</h1>
      <form action="{{ route('password.email') }}" method="POST" class="col-lg-7 col-12">
        @csrf
        <div class="input-group mb-2">
          <input type="email" placeholder="{{__('Email Address')}}" class="form-control @error('email') is-invalid @enderror" name="email" required>
          <div class="invalid-feedback">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="input-group">
          <button class="btn btn-primary">{{__('Send me the link')}}</button>
        </div>
      </form>
    </section>
  </div>
@endsection