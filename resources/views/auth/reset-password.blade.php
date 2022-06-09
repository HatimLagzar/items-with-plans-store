@extends('layouts.app')
@section('title')
  {{ __("Reset Password") }}
@endsection
@section('content')
  <x-navbar/>

  <div id="register-page" style="height: 100%">
    <section class="container">
      <h1 class="section-title">{{__('Enter the new password')}}</h1>
      <form action="{{ route('password.update') }}" method="POST" class="col-lg-7 col-12">
        @csrf
        <input type="hidden" name="email" value="{{ request()->get('email') }}">
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="input-group mb-2">
          <input type="password" placeholder="{{__('New Password')}}" class="form-control @error('password') is-invalid @enderror" name="password" required>
          <div class="invalid-feedback">
            @error('password')
            {{ $message }}
            @enderror
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" placeholder="{{__('Password Confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
          <div class="invalid-feedback">
            @error('password')
            {{ $message }}
            @enderror
          </div>
        </div>

        <div class="input-group">
          <button class="btn btn-primary">{{__('Set new password')}}</button>
        </div>
      </form>
    </section>
  </div>
@endsection