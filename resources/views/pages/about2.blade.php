
@extends('layouts.master')

@section('content')
    <div class="container mt-2">
        <h3>Selamat datang!!</h3>
        <h3>Perkenalkan saya {{ $nama }}, dari kelas {{ $kelas }} dengan nim {{ $nim }}</h3>
    </div>
@endsection
