<?php
namespace App\Http\Controllers;

use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', [
            'artikels' => Blog::all(),
        ]);
    }
}
