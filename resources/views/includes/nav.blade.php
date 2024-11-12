<nav class="site-navigation text-right text-md-center" role="navigation">
  <ul class="site-menu js-clone-nav d-none d-lg-block">
    <!-- Home link - Active check -->
    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>

    @if(Auth::check())
      <!-- Main link - Active check -->
      <li class="{{ request()->is('main') ? 'active' : '' }}">
        <a href="{{ url('/main') }}" class="btn btn-primary">Main</a>
      </li>

      <!-- Logout button -->
      <form action="/logout" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>

    @else
      <!-- About link -->
      <li><a href="#about">About</a></li>
      <!-- Product link -->
      <li><a href="#products">Product</a></li>

      <!-- Login and Register links -->
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
    @endif
  </ul>
</nav>


       
