@if (session('success'))
  <div class="alert alert-success border-0 w-100 mb-0" style="border-radius: 0">
    {{ session('success') }}
  </div>
@endif