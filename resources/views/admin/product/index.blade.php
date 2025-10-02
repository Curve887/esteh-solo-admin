@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Produk</h3>
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Tambah Produk</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $i => $p)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $p->name }}</td>
                    <td>Rp{{ number_format($p->price) }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>
                        @if($p->image)
                            <img src="{{ asset('uploads/products/'.$p->image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy',$p->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
