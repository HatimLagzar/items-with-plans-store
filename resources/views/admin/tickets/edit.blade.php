@extends('admin.layouts.auth-template')
@section('title')
  Edit Ticket
@endsection
@section('content')
  <section class="mt-5">
    <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary mb-4"><i class="fa fa-arrow-left me-2"></i>Back to List</a>
    <h1>Edit Ticket</h1>

    <form action="#" method="POST" class="w-50">
      @csrf
      <div class="form-group mb-3">
        <label class="form-label" for="titleInput">Title</label>
        <input type="text" class="form-control" id="titleInput" name="title" required value="{{ $ticket->getTitle() }}">
      </div>

      <div class="form-group mb-3">
        <label class="form-label" for="cityInput">City</label>
        <input type="text" class="form-control" id="cityInput" name="city" required value="{{ $ticket->getCity() }}">
      </div>

      <div class="form-group mb-3">
        <label class="form-label" for="locationInput">Location</label>
        <input type="text" class="form-control" id="locationInput" name="location" required value="{{ $ticket->getLocation() }}">
      </div>

      <div class="form-group mb-3">
        <label class="form-label" for="dateTimeInput">Date / Time</label>
        <input type="datetime-local" class="form-control" id="dateTimeInput" name="date_and_time" required value="{{ date('Y-m-d\TH:i', strtotime($ticket->getDateAndTime())) }}">
      </div>

      <div id="ticket-plans" class="px-4 mt-5">
        <h4>Ticket Plans</h4>
        @foreach($ticket->getPlans() as $key => $plan)
          <div class="mb-3 plan-item">
            <div class="form-group mb-3">
              <label for="ticket_plans-{{ $key }}-nameInput" class="form-label">Title</label>
              <input class="form-control" id="ticket_plans-{{ $key }}-nameInput" type="text" name="ticket_plans[{{ $key }}][name]" required value="{{ $plan->getName() }}">
            </div>

            <div class="form-group mb-3">
              <label for="ticket_plans-{{ $key }}-priceInput" class="form-label">Price</label>
              <input class="form-control" id="ticket_plans-{{ $key }}-priceInput" type="number" step="any" name="ticket_plans[{{ $key }}][price]" required value="{{ $plan->getPrice() / 100 }}">
            </div>

            <div class="form-group mb-3">
              <label for="ticket_plans-{{ $key }}-stockInput" class="form-label">Stock</label>
              <input class="form-control" id="ticket_plans-{{ $key }}-stockInput" type="number" step="1" name="ticket_plans[{{ $key }}][stock]" required value="{{ $plan->getStock() }}">
            </div>

            <button type="button" role="button" class="btn btn-sm btn-danger delete-ticket-plan"><i class="fa fa-trash"></i> Remove</button>
          </div>
        @endforeach
        <button type="button" role="button" id="add-new-ticket-plan" class="btn w-100 btn-primary btn-sm mb-2">
          <i class="fa fa-plus"></i>
        </button>
      </div>

      <button class="btn btn-primary"><i class="fa fa-paper-plane me-2"></i>Create Ticket</button>
    </form>
  </section>

@endsection