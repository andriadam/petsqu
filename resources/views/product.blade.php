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
          <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="id">
            <input type="hidden" value="{{ $product->product_name }}" name="name">
            <input type="hidden" value="{{ $product->price }}" name="price">
            <input type="hidden" value="1" name="quantity">
            <div class="d-grid gap-2">
              <button class="btn btn-primary">Tambah ke keranjang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @empty
    <p class="text-center text-white">Tidak ada produk.</p>
    @endforelse
  </div>
</div>
@endsection