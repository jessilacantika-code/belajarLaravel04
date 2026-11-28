@extends('layouts.master')

@section('content')
<h1>Detail Produk</h1>
<hr>

<div class="card">
    <div class="card-header">
        Detail Produk
    </div>
    <div class="card-body">
        <div class="card mb-3" style="max-width: 720px;">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-light border-end" style="min-height: 220px;">
                    <span class="text-muted fs-4">400 × 400</span>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $detail_produk->name_product }}</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item px-0">Harga: Rp. {{ number_format($detail_produk->price_product, 0, ',', '.') }}</li>
                            <li class="list-group-item px-0">Stok: {{ $detail_produk->stock_product }} pcs</li>
                            <li class="list-group-item px-0">Deskripsi: {{ $detail_produk->desc_product }}</li>
                        </ul>
                        <a href="/product" class="btn btn-primary">Kembali ke product</a>
                    </div>
                </div>
            </div>
            @if ($detail_produk->created_at)
                <div class="card-footer bg-transparent border-0 text-muted small">
                    {{ $detail_produk->created_at }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection