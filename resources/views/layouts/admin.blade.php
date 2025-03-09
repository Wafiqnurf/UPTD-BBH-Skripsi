<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Pertanian</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>
    {{-- Navbar --}}
    @include('layouts.sidebar')
    {{-- Content --}}
    @yield('content')
</body>
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
</script><!-- Sweet Alert -->
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

< /html>
