@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="dashboard-header">
        <h2>Tambah Data Baru</h2>
        <a href="#" class="tambah-data" onclick="history.back()">Kembali</a>
    </div>

    <div class="form-container">
        <form id="addDataForm" onsubmit="return handleSubmit(event)">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <div class="file-input-container">
                    <label class="file-input-label">
                        Pilih File
                        <input type="file" id="foto" name="foto" class="file-input" accept="image/*"
                            onchange="handleFileSelect(event)" required>
                    </label>
                    <span class="file-name" id="fileName"></span>
                </div>
                <img id="imagePreview" class="preview-image" alt="Preview">
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
</script>
@endsection
