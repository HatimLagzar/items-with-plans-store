@extends('layouts.app')
@section('title')
  {{__('Register')}}
@endsection
@section('content')
  <x-navbar/>

  <div id="register-page">
    <section id="register-section">
      <div class="container">
        <h1 class="section-title">{{__('Please Register')}}</h1>
        <form action="{{ route('register') }}" method="POST" class="col-lg-6 col-12">
          @csrf
          <div class="form-group mb-3">
            <label for="firstNameInput" class="form-label">{{ __('First Name') }}</label>
            <input id="firstNameInput" type="text" placeholder="{{__('First Name')}}" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required>
            <div class="invalid-feedback">
              @error('first_name')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="lastNameInput" class="form-label">{{ __('Last Name') }}</label>
            <input id="lastNameInput" type="text" placeholder="{{__('Last Name')}}" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required>
            <div class="invalid-feedback">
              @error('last_name')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="emailInput" class="form-label">{{ __('Email Address') }}</label>
            <input id="emailInput" type="email" placeholder="{{__('Email Address')}}" class="form-control @error('email') is-invalid @enderror" name="email" required>
            <div class="invalid-feedback">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="phoneInput" class="form-label">{{ __('Phone Number') }}</label>
            <input id="phoneInput" type="tel" placeholder="{{__('Phone Number')}}" class="form-control @error('phone') is-invalid @enderror" name="phone" required>
            <div class="invalid-feedback">
              @error('phone')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="passwordInput" class="form-label">{{ __('Password') }}</label>
            <input id="passwordInput" type="password" placeholder="{{__('Password')}}" class="form-control @error('password') is-invalid @enderror" name="password" required>
            <div class="invalid-feedback">
              @error('password')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="passwordConfInput" class="form-label">{{ __('Password Confirmation') }}</label>
            <input id="passwordConfInput" type="password" placeholder="{{__('Password Confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
            <div class="invalid-feedback">
              @error('password_confirmation')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary">{{__('Register')}}</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection