<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data_toko = [
            'nama_toko' => 'Tulis Nama Kamu',
            'alamat_toko' => 'Jl. Terus Jadian Kagak',
            'status_toko' => 'Belum Pasti'
        ];

        // kita gunakan Eloquent ORM (Model Product dari Modul 8 & 9)
        $data_product = Product::orderBy('id_product', 'desc')->paginate(10);

        return view('pages.Product.show', [
            'data_toko' => $data_toko,
            'data_produk' => $data_product,
        ]);
    }

    public function addProduct(){
        return view('pages.Product.addProduct');
    }

    public function store(Request $request){
        // kita akan melakukan validasi setiap data yang diinputkan
        $request->validate([
            'name_product' => 'required|min:4|max:20',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|integer|min:0',
            'desc_product' => 'required',
        ],[
            'name_product.min' => 'Nama produk minimal 4 karakter.',
            'name_product.max' => 'Nama produk maksimal 20 karakter.',
            'name_product.required' => 'Nama produk wajib diisi.',
            'stock_product.required' => 'Stok produk wajib diisi.',
            'stock_product.integer' => 'Stok produk harus berupa angka bulat.',
            'stock_product.min' => 'Stok produk tidak boleh kurang dari 0.',
            'price_product.required' => 'Harga produk wajib diisi.',
            'price_product.integer' => 'Harga produk harus berupa angka bulat.',
            'price_product.min' => 'Harga produk tidak boleh kurang dari 0.',
            'desc_product.required' => 'Deskripsi produk wajib diisi.',
        ]);

        // kita tambahkan data yang diinputkan ke dalam database
        Product::create([
            'name_product' => $request->name_product,
            'stock_product' => $request->stock_product,
            'price_product' => $request->price_product,
            'desc_product' => $request->desc_product,
            'id_category' => rand(1,3), // kita gunakan fungsi random untuk menambahkan category
        ]);

        // kita akan memberikan pesan ketika data berhasil diinputkan
        return redirect('/product')->with('message','Data Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // query untuk menampilkan detail data sesuai id menggunakan Eloquent ORM
        $produk_detail = Product::findOrFail($id);

        return view('pages.Product.detail', [
            'detail_produk' => $produk_detail,
        ]);
    }

    public function edit($id)
    {
        $data_product = Product::findOrFail($id);

        return view('pages.Product.editProduct', [
            'updated_produk' => $data_product,
        ]);
    }

    public function update($id, Request $request){
        // kita akan melakukan validasi setiap data yang diinputkan pada form edit
        $request->validate([
            'name_product' => 'required|min:4|max:20',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|integer|min:0',
            'desc_product' => 'required',
        ],[
            'name_product.min' => 'Nama produk minimal 4 karakter.',
            'name_product.max' => 'Nama produk maksimal 20 karakter.',
            'name_product.required' => 'Nama produk wajib diisi.',
            'stock_product.required' => 'Stok produk wajib diisi.',
            'stock_product.integer' => 'Stok produk harus berupa angka bulat.',
            'stock_product.min' => 'Stok produk tidak boleh kurang dari 0.',
            'price_product.required' => 'Harga produk wajib diisi.',
            'price_product.integer' => 'Harga produk harus berupa angka bulat.',
            'price_product.min' => 'Harga produk tidak boleh kurang dari 0.',
            'desc_product.required' => 'Deskripsi produk wajib diisi.',
        ]);

        // query untuk merubah data menggunakan Eloquent ORM
        Product::findOrFail($id)->update([
            'name_product' => $request->name_product,
            'stock_product' => $request->stock_product,
            'price_product' => $request->price_product,
            'desc_product' => $request->desc_product,
        ]);

        return redirect('/product')->with('message', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // query untuk hapus data dari database
        Product::findOrFail($id)->delete();

        return redirect('/product')->with('message', 'Data Berhasil Dihapus');
    }
}