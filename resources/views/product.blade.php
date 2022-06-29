@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
  <h1 class="mb-3">Daftar Produk</h1>
  <div class="row">
    @forelse ($products as $product)
    <div class="col-sm-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $product->product_name }}</h5>
          <h6>Rp. {{ number_format($product->price, 0, 0, '.') }}</h6>
          <p class="card-text">{{ $product->product_description }}</p>
          <a href="#" class="btn btn-primary">Masukan Keranjang</a>
        </div>
      </div>
    </div>
    @empty
    <p class="text-center text-white">Tidak ada produk.</p>
    @endforelse
  </div>
</div>
@endsection