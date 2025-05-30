<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', [
            'artikels' => Blog::all(),
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul'   => 'required',
            'tanggal' => 'required',
            'image'   => 'required|max:20000|mimes:jpg,jpeg,png,webp',
            'desc'    => 'required|min:20',
        ];

        $messages = [
            'judul.required'   => 'Judul wajib diisi!',
            'tanggal.required' => 'Tanggal wajib diisi!',
            'image.required'   => 'Judul wajib diisi!',
            'desc.required'    => 'Judul wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/artikel', $fileName);

        # Artikel
        $storage = "storage/content-artikel";
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

        Blog::create([
            'judul'   => $request->judul,
            'tanggal' => $request->tanggal,
            'slug'    => Str::slug($request->judul, '-'),
            'image'   => $fileName,
            'desc'    => $dom->saveHTML(),
        ]);

        return redirect(route('blog'))->with('success_add', 'Data berhasil di simpan');
    }

    public function edit($id)
    {
        $artikel = Blog::find($id);
        return view('admin.blog.edit', [
            'artikel' => $artikel,
        ]);
    }

    public function update(Request $request, $id)
    {
        $artikel = Blog::find($id);

        // Tentukan aturan validasi
        $rules = [
            'judul'   => 'required',
            'tanggal' => 'required',
            'image'   => 'nullable|max:20000|mimes:jpg,jpeg,png,webp', // Ganti 'required' dengan 'nullable'
            'desc'    => 'required|min:20',
        ];

        $messages = [
            'judul.required'   => 'Judul wajib diisi!',
            'tanggal.required' => 'Tanggal wajib diisi!',
            'image.max'        => 'Ukuran gambar maksimal 10MB!',
            'image.mimes'      => 'Format gambar harus jpg, jpeg, png, atau webp!',
            'desc.required'    => 'Deskripsi wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (\File::exists('storage/artikel/' . $artikel->image)) {
                \File::delete('storage/artikel/' . $artikel->image);
            }
            // Simpan gambar baru
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/artikel', $fileName);
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $fileName = $artikel->image;
        }

        // Artikel
        $storage = "storage/content-artikel";
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

        $artikel->update([
            'judul'   => $request->judul,
            'tanggal' => $request->tanggal,
            'image'   => $fileName, // Gunakan nama file yang baru atau lama
            'desc'    => $dom->saveHTML(),
        ]);

        return redirect(route('blog'))->with('success_edit', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $artikel = Blog::find($id);
        if (\File::exists('storage/artikel/' . $artikel->image)) {
            \File::delete('storage/artikel/' . $artikel->image);
        }

        $artikel->delete();

        return redirect(route('blog'))->with('success_delete', 'Data berhasil dihapus');
    }
}
