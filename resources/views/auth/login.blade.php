@extends('layouts.app')
@section('title')
  {{ __("Login") }}
@endsection
@section('content')
  <x-navbar/>

  <div id="register-page" style="height: 100%">
    <section id="register-section">
      <div class="container">
        <h1 class="section-title">{{__('Please Login')}}</h1>
        <form action="{{ route('login') }}" method="POST" class="col-lg-6 col-12">
          @csrf

          <div class="input-group mb-2">
            <input type="email" placeholder="{{__('Email Address')}}" class="form-control @error('email') is-invalid @enderror" name="email" required>
            <div class="invalid-feedback">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>

          <div class="input-group mb-2">
            <input type="password" placeholder="{{__('Password')}}" class="form-control @error('password') is-invalid @enderror" name="password" required>
            <div class="invalid-feedback">
              @error('password')
              {{ $message }}
              @enderror
            </div>
          </div>

          <div class="input-group">
            <button class="btn btn-primary">{{__('Login')}}</button>
          </div>

          <a href="{{ route('password.request') }}" class="d-block mt-2 text-white">{{__('Reset Password')}}</a>
        </form>
      </div>
    </section>
  </div>
@endsection