<nav class="navbar navbar-expand-lg" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user() instanceof \App\Models\User)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tickets.index') }}">{{ __('My Tickets') }}</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="nav-link btn">{{ __('Logout') }}</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login-page') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register-page') }}">{{ __('Register') }}</a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}#contact">{{ __('Contact') }}</a>
        </li>
      </ul>
    </div>
  </div>
</nav>