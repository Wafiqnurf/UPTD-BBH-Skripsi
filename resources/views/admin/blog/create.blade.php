@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="dashboard-header">
        <h2>Tambah Data Baru</h2>
        <a href="{{ route('blog') }}" class="tambah-data">Kembali</a>
    </div>

    <div class="form-container">
        <form action="{{ route('blog.store') }}" id="addDataForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror"
                    required value="{{ old('judul') }}">
                @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror" required value="{{ old('tanggal') }}">
                @error('tanggal')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea id="desc" name="desc" class="form-control @error('desc') is-invalid @enderror" required
                    value="{{ old('desc') }}"></textarea>
                @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Foto</label>
                <div class="file-input-container">
                    <label class="file-input-label">
                        Pilih File
                        <input type="file" id="image" name="image"
                            class="file-input @error('image') is-invalid @enderror" accept="image/*"
                            onchange="handleFileSelect(event)" required>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </label>
                    <span class="file-name" id="fileName"></span>
                </div>
                <img id="imagePreview" class="preview-image" style="max-width: 200px; margin-top: 10px;" alt="Preview">
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="history.back()">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function handleFileSelect(event) {
    const file = event.target.files[0];
    document.getElementById('fileName').textContent = file.name;

    // Preview image
    const preview = document.getElementById('imagePreview');
    const reader = new FileReader();

    reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
    }

    reader.readAsDataURL(file);
}
@endsection
