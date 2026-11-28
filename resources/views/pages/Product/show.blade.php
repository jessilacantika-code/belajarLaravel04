@extends('layouts.master')

@section('content')
<h1>Daftar produk kami</h1>
<hr>
<a href="/product/addProduct" class="btn btn-primary mb-3">Tambah Data</a>
@if (session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="card">
    <div class="card-header">
        Produk Kami
    </div>
    <div class="alert alert-primary">
        <b>Nama Toko : </b> {{$data_toko['nama_toko']}}
        <br>
        <b>Alamat Toko : </b> {{$data_toko['alamat_toko']}}
        <br>
        <b>Status Toko : </b> {{$data_toko['status_toko']}}
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_produk as $item)
                <tr>
                    <th scope="row">{{($data_produk->perPage() * ($data_produk->currentPage()-1)) +
                        $loop->iteration}}</th>
                    <td>{{$item->name_product}}</td>
                    <td>{{$item->stock_product}}</td>
                    <td>Rp. {{number_format($item->price_product, 0, ',', '.')}}</td>
                    <td>{{$item->desc_product}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapus{{$item->id_product}}">
                            Hapus
                        </button>
                        <a href="/product/{{$item->id_product}}/edit" class="btn btn-warning">Edit</a>
                        <a href="/product/{{$item->id_product}}" class="btn btn-info">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $data_produk->links('pagination::bootstrap-5') }}
            Halaman : {{ $data_produk->currentPage() }} <br />
            Jumlah Data : {{ $data_produk->total() }} <br />
            Data Per Halaman : {{ $data_produk->perPage() }} <br />
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($data_produk as $item)
<div class="modal fade" id="hapus{{$item->id_product}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="/product/{{$item->id_product}}" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">KONFIRMASI ULANG !!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data {{$item->name_product}} ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus Data</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection