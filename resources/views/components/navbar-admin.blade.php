<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">PetShopQu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" aria-current="page"
            href="/">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}" href="{{ route('admin.product.index') }}">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}" href="{{ route('admin.order.index') }}">Pembelian</a>
        </li>
      </ul>
      @auth
      <form class="d-flex ms-auto" action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-warning" type="submit">Logout</button>
      </form>
      @endauth
    </div>
  </div>
</nav>