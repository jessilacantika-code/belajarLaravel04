@extends('layouts.master')

@section('content')
<h1>Edit Produk</h1>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="/product/{{ $updated_produk->id_product }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name_product" class="form-label">Nama Produk</label>
                <input type="text" name="name_product" id="name_product" class="form-control" value="{{ old('name_product', $updated_produk->name_product) }}">
            </div>

            <div class="mb-3">
                <label for="stock_product" class="form-label">Stok</label>
                <input type="number" name="stock_product" id="stock_product" class="form-control" value="{{ old('stock_product', $updated_produk->stock_product) }}">
            </div>

            <div class="mb-3">
                <label for="price_product" class="form-label">Harga</label>
                <input type="number" name="price_product" id="price_product" class="form-control" value="{{ old('price_product', $updated_produk->price_product) }}">
            </div>

            <div class="mb-3">
                <label for="desc_product" class="form-label">Deskripsi</label>
                <textarea name="desc_product" id="desc_product" rows="3" class="form-control">{{ old('desc_product', $updated_produk->desc_product) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/product" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection