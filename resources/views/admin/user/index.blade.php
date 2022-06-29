@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Pelanggan</h2>
</div>
<div class="row mt-4">
  <table class="table" id="table1">
    <thead>
      <tr>
        <th>No. </th>
        <th>Username</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->username }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->phone }}</td>
        <td>
          <form action="{{ route('admin.product.destroy', $row->id) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i
                class="bi bi-trash"></i>
              Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr colspan="6">
        <p>No user found</p>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection