@php
  /** @var \App\Models\Ticket[]|\Illuminate\Database\Eloquent\Collection */
@endphp
@extends('admin.layouts.auth-template')
@section('title')
  Tickets
@endsection
@section('content')
  <div class="row mt-5">
    <div class="col">
      <h1>Tickets List</h1>
    </div>
    <div class="col">
      <a href="{{ route('admin.tickets.create') }}" class="btn btn-primary d-block float-end"><i class="fa fa-plus me-2"></i>Add Ticket</a>
    </div>
  </div>

  <table class="table table-hover  mt-5">
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>City</th>
      <th>Location</th>
      <th>Date / Time</th>
      <th>Created At</th>
    </tr>
    @foreach($tickets as $key => $ticket)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $ticket->getTitle() }}</td>
        <td>{{ $ticket->getCity() }}</td>
        <td>{{ $ticket->getLocation() }}</td>
        <td>{{ $ticket->getDateAndTime() }}</td>
        <td>{{ $ticket->getCreatedAt() }}</td>
      </tr>
    @endforeach
  </table>
@endsection