<ul class="auth-section nav flex-column">
  <li class="nav-item">
    &nbsp;
  </li>
  <li class="nav-item">
    <a class="nav-link {{Request::path() == 'user/account' ? 'active' : ''}} account-section-sidebar" href="{{ url('/user/account') }}">My Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{Request::path() == 'user/numbers' ? 'active' : ''}} account-section-sidebar" href="{{ url('/user/numbers') }}">My Numbers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{Request::path() == 'user/wins' ? 'active' : ''}} account-section-sidebar" href="{{ url('/user/wins') }}">Game Wins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{Request::path() == 'user/payments' ? 'active' : ''}} account-section-sidebar" href="{{ url('/user/payments') }}">Payments</a>
  </li>
</ul>