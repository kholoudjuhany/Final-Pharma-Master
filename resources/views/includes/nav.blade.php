<nav class="site-navigation text-right text-md-center" role="navigation">
  <ul class="site-menu js-clone-nav d-none d-lg-block">
    <li class="active"><a href="{{ url('/') }}">Home</a></li>
    <li><a href="shop.html">About</a></li>
    <li><a href="about.html">Product</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
    <form action="/logout" method='Post'>
      @csrf
      <button>logout</button>

    </form>
  </ul>
</nav>
       
