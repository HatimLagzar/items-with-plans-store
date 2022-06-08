@extends('admin.layouts.auth-template')
@section('title')
  Add Ticket
@endsection
@section('content')
  <section class="mt-5">
    <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary mb-4"><i class="fa fa-arrow-left me-2"></i>Back to List</a>
    <h1>Add Ticket</h1>

    <form action="{{ route('admin.tickets.store') }}" method="POST" class="w-50">
      @csrf
      <div class="form-group mb-3">
        <label class="form-label" for="titleInput">Title</label>
        <input type="text" class="form-control" id="titleInput" name="title" required>
      </div>

      <div class="form-group mb-3">
        <label class="form-label" for="cityInput">City</label>
        <input type="text" class="form-control" id="cityInput" name="city" required>
      </div>

      <div class="form-group mb-3">
        <label class="form-label" for="locationInput">Location</label>
        <input type="text" class="form-control" id="locationInput" name="location" required>
      </div>

      <div class="form-group mb-3">
        <label class="form-label" for="dateTimeInput">Date / Time</label>
        <input type="datetime-local" class="form-control" id="dateTimeInput" name="date_and_time" required>
      </div>

      <div id="ticket-plans" class="px-4 mt-5">
        <h4>Ticket Plans</h4>
        <button type="button" role="button" id="add-new-ticket-plan" class="btn w-100 btn-primary btn-sm mb-2">
          <i class="fa fa-plus"></i>
        </button>
      </div>

      <button class="btn btn-primary"><i class="fa fa-paper-plane me-2"></i>Create Ticket</button>
    </form>
  </section>

@endsection