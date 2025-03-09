@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="dashboard-header">
        <h2>Dashboard Pertanian</h2>
        <a href="{{route('blog.create')}}" class="tambah-data">+ Tambah Data</a>
    </div>

    <div class="content-box">
        <h3>Daftar Berita Pertanian</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($artikels as $artikel)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->tanggal}}</td>
                    <td>{{ $artikel->desc}}</td>
                    <td>
                        <img src="{{ asset('storage/artikel/' . $artikel->image) }}">
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button href="{{ route('blog.edit', $artikel->id) }}"
                                class="action-btn edit-btn">Edit</button>
                            <form action="{{ route('blog.destroy', $artikel->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="action-btn delete-btn">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection