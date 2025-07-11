<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        // Filter by category if provided
        if ($request->has('kategori') && $request->kategori != 'semua') {
            $query->where('kategori', $request->kategori);
        }

        $produk = $query->get();

        return view('admin.produk.index', [
            'produk'           => $produk,
            'selectedKategori' => $request->kategori ?? 'semua',
        ]);
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul'    => 'required',
            'kategori' => 'required',
            'harga'    => 'required',
            'image'    => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'desc'     => 'required|min:20',
            'tags'     => 'nullable|array', // Add validation for tags
        ];

        $messages = [
            'judul.required'    => 'Judul wajib diisi!',
            'kategori.required' => 'Kategori wajib diisi!',
            'harga.required'    => 'Harga wajib diisi!',
            'image.required'    => 'Gambar wajib diisi!',
            'desc.required'     => 'Deskripsi wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Clean harga (price) value - remove thousand separators
        $harga = str_replace('.', '', $request->harga);

        // Image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/produk', $fileName);

        # Artikel
        $storage = "storage/content-produk";
        $dom     = new \DOMDocument();

        # untuk menonaktifkan kesalahan libxml standar dan memungkinkan penanganan kesalahan pengguna.
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        # Menghapus buffer kesalahan libxml
        libxml_clear_errors();

        # Baca di https://dosenit.com/php/fungsi-libxml-php
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype            = $groups['mime'];
                $fileNameContent     = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filePath            = ("$storage/$fileNameContentRand.$mimetype");
                $image               = Image::make($src)->resize(1440, 720)->encode($mimetype, 100)->save(public_path($filePath));
                $new_src             = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        // Process tags
        $tags = $request->has('tags') ? json_encode($request->tags) : json_encode([]);

        Produk::create([
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul, '-'),
            'kategori' => $request->kategori,
            'harga'    => $harga, // Add price field
            'image'    => $fileName,
            'desc'     => $dom->saveHTML(),
            'tags'     => $tags, // Add tags field
        ]);

        return redirect(route('produk'))->with('success_add', 'Data berhasil di simpan');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('admin.produk.edit', [
            'produk' => $produk,
        ]);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        // Tentukan aturan validasi
        $rules = [
            'judul'    => 'required',
            'harga'    => 'required',
            'kategori' => 'required',
            'image'    => 'nullable|max:10000|mimes:jpg,jpeg,png,webp', // Ganti 'required' dengan 'nullable'
            'desc'     => 'required|min:20',
            'tags'     => 'nullable|array', // Add validation for tags
        ];

        $messages = [
            'judul.required'    => 'Judul wajib diisi!',
            'kategori.required' => 'Kategori wajib diisi!',
            'harga.required'    => 'Harga wajib diisi!',
            'image.max'         => 'Ukuran gambar maksimal 10MB!',
            'image.mimes'       => 'Format gambar harus jpg, jpeg, png, atau webp!',
            'desc.required'     => 'Deskripsi wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Clean harga (price) value - remove thousand separators
        $harga = str_replace('.', '', $request->harga);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (\File::exists('storage/produk/' . $produk->image)) {
                \File::delete('storage/produk/' . $produk->image);
            }
            // Simpan gambar baru
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/produk', $fileName);
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $fileName = $produk->image;
        }

        // Artikel
        $storage = "storage/content-produk";
        $dom     = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype            = $groups['mime'];
                $fileNameContent     = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filePath            = ("$storage/$fileNameContentRand.$mimetype");
                $image               = Image::make($src)->resize(1200, 1200)->encode($mimetype, 100)->save(public_path($filePath));
                $new_src             = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        // Process tags
        $tags = $request->has('tags') ? json_encode($request->tags) : json_encode([]);

        $produk->update([
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'harga'    => $harga,    // Add price field
            'image'    => $fileName, // Gunakan nama file yang baru atau lama
            'desc'     => $dom->saveHTML(),
            'tags'     => $tags, // Add tags field
        ]);

        return redirect(route('produk'))->with('success_edit', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (\File::exists('storage/produk/' . $produk->image)) {
            \File::delete('storage/produk/' . $produk->image);
        }

        $produk->delete();

        return redirect(route('produk'))->with('success_delete', 'Data berhasil dihapus');
    }
}
