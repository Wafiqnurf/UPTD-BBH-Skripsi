<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Produk;

class AppController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'artikels' => Blog::all(),
            'produk'   => Produk::all(),
        ]);
    }
}
