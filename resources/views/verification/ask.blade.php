@extends('layouts.app')
@section('title')
  {{__('You are missing email verification')}}
@endsection
@section('content')
  <div id="missing-verification-page">
    <div class="container mt-5">
      <i class="fa fa-at text-center d-block mb-3" style="font-size: 150px"></i>
      <h1 class="mb-4 w-50 text-center mx-auto">{{__('Please verify your email address by clicking the link we sent you in your email address!')}}</h1>

      <form action="{{ route('verification.resend') }}" method="POST" class="d-block mx-auto w-50">
        @csrf
        <button class="btn btn-sm btn-primary d-block mx-auto"><i class="fa fa-paper-plane me-2"></i>{{__('Resend verification link')}}</button>
      </form>
    </div>
  </div>
@endsection