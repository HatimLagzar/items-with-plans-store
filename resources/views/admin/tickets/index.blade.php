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
      <th>Actions</th>
    </tr>
    @foreach($tickets as $key => $ticket)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $ticket->getTitle() }}</td>
        <td>{{ $ticket->getCity() }}</td>
        <td>{{ $ticket->getLocation() }}</td>
        <td>{{ $ticket->getDateAndTime() }}</td>
        <td>{{ $ticket->getCreatedAt() }}</td>
        <td>
          <a href="{{ route('admin.tickets.edit', ['id' => $ticket->getId()]) }}" class="btn btn-sm btn-secondary"><i class="fa fa-pencil me-2"></i>Edit</a>
          <form action="{{ route('admin.tickets.destroy', ['id' => $ticket->getId()]) }}" class="d-inline-block" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger"><i class="fa fa-trash me-2"></i>Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
@endsection