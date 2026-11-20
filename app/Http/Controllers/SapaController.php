<?php

namespace App\Http\Controllers;

class SapaController extends Controller
{
    public function index()
    {
        $nama = 'Jessila cantikasari';

        return view('pages.sapa', [
            'nama' => $nama,
        ]);
    }
}
