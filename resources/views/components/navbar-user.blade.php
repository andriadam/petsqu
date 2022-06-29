<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">PetShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('product*') ? 'active' : '' }}" href="/product">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('register*') ? 'active' : '' }}" href="/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('login*') ? 'active' : '' }}" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('cart*') ? 'active' : '' }}" href="/keranjang">Keranjang</a>
        </li>
      </ul>
    </div>
  </div>
</nav>