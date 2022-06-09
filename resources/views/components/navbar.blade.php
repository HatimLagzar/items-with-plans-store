<nav class="navbar navbar-expand-lg" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">{{ __('Home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ __('Register') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ __('Contact') }}</a>
        </li>
      </ul>
    </div>
  </div>
</nav>