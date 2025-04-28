@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="dashboard-header">
        <h2>Dashboard Pertanian</h2>
        <a href="{{route('produk.create')}}" class="tambah-data">+ Tambah Data</a>
    </div>

    <div class="content-box">
        <div class="filters-container">
            <h3>Daftar Produk</h3>
            <div class="filter-options">
                <form action="{{ route('produk') }}" method="GET" class="filter-form">
                    <select name="kategori" id="kategori-filter" class="form-control" onchange="this.form.submit()">
                        <option value="semua" {{ $selectedKategori == 'semua' ? 'selected' : '' }}>Semua Kategori
                        </option>
                        <option value="sayuran" {{ $selectedKategori == 'sayuran' ? 'selected' : '' }}>Sayuran</option>
                        <option value="tanaman-obat" {{ $selectedKategori == 'tanaman-obat' ? 'selected' : '' }}>Tanaman
                            Obat</option>
                        <option value="tanaman-hias" {{ $selectedKategori == 'tanaman-hias' ? 'selected' : '' }}>Tanaman
                            Hias</option>
                        <option value="buah" {{ $selectedKategori == 'buah' ? 'selected' : '' }}>Buah</option>
                        <option value="benih" {{ $selectedKategori == 'benih' ? 'selected' : '' }}>Benih</option>
                    </select>
                </form>
            </div>
        </div>>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Tag</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($produk) && count($produk) > 0)
                <?php $i = 1; ?>
                @foreach ($produk as $produk)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $produk->judul }}</td>
                    <td>
                        @if($produk->kategori == 'sayuran')
                        Sayuran
                        @elseif($produk->kategori == 'tanaman-obat')
                        Tanaman Obat
                        @elseif($produk->kategori == 'tanaman-hias')
                        Tanaman Hias
                        @elseif($produk->kategori == 'buah')
                        Buah
                        @elseif($produk->kategori == 'benih')
                        Benih
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{!! Str::limit(strip_tags($produk->desc), 100) !!}</td>
                    <td>
                        @php
                        $tags = json_decode($produk->tags ?? '[]');
                        @endphp
                        @if(count($tags) > 0)
                        @foreach($tags as $tag)
                        <span class="tag-badge {{ $tag }}">
                            @if($tag == 'baru')
                            Baru
                            @elseif($tag == 'terlaris')
                            Terlaris
                            @elseif($tag == 'unggulan')
                            Unggulan
                            @else
                            {{ $tag }}
                            @endif
                        </span>
                        @endforeach
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        <img src="{{ asset('storage/produk/' . $produk->image) }}" width="100">
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('produk.edit', $produk->id) }}" class="action-btn edit-btn">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="action-btn delete-btn btn-delete"
                                    method="POST">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// SweetAlert untuk berbagai jenis pesan
@if(session('success_add'))
Swal.fire({
    icon: 'success',
    title: 'Data Berhasil Ditambahkan!',
    text: '{{ session('
    success_add ') }}',
});
@endif

@if(session('success_delete'))
Swal.fire({
    icon: 'success',
    title: 'Data Berhasil Dihapus!',
    text: '{{ session('
    success_delete ') }}',
});
@endif

@if(session('success_edit'))
Swal.fire({
    icon: 'success',
    title: 'Data Berhasil Diperbarui!',
    text: '{{ session('
    success_edit ') }}',
});
@endif

@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('
    success ') }}',
});
@endif

// Konfirmasi sebelum menghapus data
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();

        const form = this.closest('form');

        Swal.fire({
            title: "Apakah Yakin Ingin Menghapus?",
            text: "Data tidak dapat dikembalikan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus !",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection