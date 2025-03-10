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
                @if(isset($artikels) && count($artikels) > 0)
                <?php $i = 1; ?>
                @foreach ($artikels as $artikel)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->tanggal }}</td>
                    <td>{!! Str::limit(strip_tags($artikel->desc), 100) !!}</td>
                    <td>
                        <img src="{{ asset('storage/artikel/' . $artikel->image) }}" width="100">
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('blog.edit', $artikel->id) }}" class="action-btn edit-btn">Edit</a>
                            <form action="{{ route('blog.destroy', $artikel->id) }}" method="POST" class="d-inline">
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