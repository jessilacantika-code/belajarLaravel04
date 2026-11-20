
@extends('layouts.master')

@section('content')
    <h2>Daftar produk kami</h2>
    <hr>

    <button class="btn btn-primary mb-3">Tambah Data</button>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item[0] }}</td>
                    <td>{{ $item[1] }}</td>
                    <td>Rp. {{ number_format($item[2], 0, ',', '.') }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Delete</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
