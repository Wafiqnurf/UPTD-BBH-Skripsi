@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="dashboard-header">
        <h2>Tambah Data Baru</h2>
        <a href="{{ route('produk') }}" class="tambah-data">Kembali</a>
    </div>

    <div class="form-container">
        <form action="{{ route('produk.store') }}" id="addDataForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Nama Produk</label>
                <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror"
                    required value="{{ old('judul') }}">
                @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category Selection -->
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror"
                    required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="sayuran" {{ old('kategori') == 'sayuran' ? 'selected' : '' }}>Sayuran</option>
                    <option value="tanaman-obat" {{ old('kategori') == 'tanaman-obat' ? 'selected' : '' }}>Tanaman Obat
                    </option>
                    <option value="tanaman-hias" {{ old('kategori') == 'tanaman-hias' ? 'selected' : '' }}>Tanaman Hias
                    </option>
                    <option value="buah" {{ old('kategori') == 'buah' ? 'selected' : '' }}>Buah</option>
                    <option value="benih" {{ old('kategori') == 'benih' ? 'selected' : '' }}>Benih</option>
                </select>
                @error('kategori')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price Field with Rupiah format -->
            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror"
                        placeholder="0" value="{{ old('harga') }}" required onkeyup="formatRupiah(this)">
                </div>
                @error('harga')
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

            <!-- Tags Selection -->
            <div class="form-group">
                <label>Tags</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag_baru" value="baru"
                        {{ is_array(old('tags')) && in_array('baru', old('tags')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag_baru">Baru</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag_terlaris" value="terlaris"
                        {{ is_array(old('tags')) && in_array('terlaris', old('tags')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag_terlaris">Terlaris</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag_unggulan" value="unggulan"
                        {{ is_array(old('tags')) && in_array('unggulan', old('tags')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag_unggulan">Unggulan</label>
                </div>
                @error('tags')
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

function formatRupiah(input) {
    // Remove non-digit characters
    let value = input.value.replace(/[^,\d]/g, '').toString();

    // Format the number with thousand separators
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    // Update the input value
    input.value = value;
}

// Convert formatted value back to number before form submission
document.getElementById('addDataForm').addEventListener('submit', function(e) {
    let hargaInput = document.getElementById('harga');
    // Convert from formatted Rupiah to plain number
    let plainValue = hargaInput.value.replace(/\./g, '');

    // Create a hidden input to store the plain number value
    let hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'harga_plain';
    hiddenInput.value = plainValue;

    // Add the hidden input to the form
    this.appendChild(hiddenInput);
});
</script>
@endsection
