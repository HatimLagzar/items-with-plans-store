@if (session('error'))
  <div class="alert alert-danger border-0 w-100 mb-0" style="border-radius: 0">
    {{ session('error') }}
  </div>
@endif