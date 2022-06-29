@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Edit Produk</h2>
</div>
<div class="row text-end mt-4">
  <div class="col-md-8">
    <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3 row">
        <label for="product_name" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
          <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
            value="{{ old('product_name', $product->product_name) }}" id="product_name"
            placeholder="Masukan nama produk" required autofocus>
          @error('product_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="product_description" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
          <input type="text" name="product_description" class="form-control @error('product_description') is-invalid @enderror"
            value="{{ old('product_description', $product->product_description) }}">
          @error('product_description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
          <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
            value="{{ old('price', $product->price) }}" id="price" placeholder="Masukan harga" required>
          @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <div class="d-grid gap-2" class="col-sm-2 col-form-label">
          <button type="submit" class="btn btn-primary">Edit Data</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection