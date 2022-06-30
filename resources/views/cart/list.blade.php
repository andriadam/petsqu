@extends('layouts.app')

@section('content')
<div style="" class="text-center mt-5">
  <div class="row">
    @if ($message = Session::get('successOrder'))
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Pesanan Berhasil dibuat</h4>
      <p>Silahkan lakukan pembayaran sejumlah Rp. {{ number_format($message, 0, 0, '.') }} melalui BCA : 26532567326</p>
      <hr>
      <p class="mb-0">Konfirmasi pembayaran melalui Nomor whatsapp<a
          href="https://api.whatsapp.com/send?phone=6289602748612">0812921738</a></p>
    </div>
    @endif
    @include('components.alert')
  </div>
  <h1>Keranjang</h1>
  <div class="col-sm-12">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Sub Harga</th>
          <th scope="col">Option</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($cartItems as $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->name }}</td>
          <td>Rp. {{ number_format($item->price, 0, 0, '.') }}</td>
          <td>
            <form action="{{ route('cart.update') }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $item->id}}">
              <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" />
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </td>
          <td>
            Rp. {{ number_format($item->price*$item->quantity, 0, 0, '.') }}
          </td>
          <td>
            <form action="{{ route('cart.remove') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $item->id }}" name="id">
              <button class="btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6">
            <p>Keranjang belanja anda kosong</p>
          </td>
        </tr>
        @endforelse
      </tbody>
      <tfoot>
        <th colspan="4">
          <h4> Total </h4>
        </th>
        <th colspan="2">
          <h4>Rp. {{ number_format(Cart::getTotal(), 0, 0, '.'); }}</h4>
        </th>
      </tfoot>
    </table>
    <div class="d-flex justify-content-end">
      <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary"
          onclick="return confirm('Apakah sudah yakin dengan pesanan anda?')">Buat Pesanan</button>
      </form>
    </div>
  </div>
</div>
@endsection