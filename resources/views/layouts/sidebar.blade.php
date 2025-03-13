<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo-container">
        <img src="{{ asset('assets/images/icon.png') }}" alt="Agriculture Logo">
        <h2>Panel Admin</h2>
    </div>

    <div class="nav-section">
        <h3 class="nav-title">Menu</h3>
        <div class="menu-item active">
            <img src="{{ asset('assets/icons/news.png') }}" alt="News Icon">
            <a href="{{route('blog')}}" class="menu-title">Berita Pertanian</a>
        </div>
        <div class="menu-item">
            <img src="{{ asset('assets/icons/gallery.png') }}" alt="Photos Icon">
            <span class="menu-title">Dokumentasi</span>
        </div>
        <di class="menu-item">
            <img src="{{ asset('assets/icons/order.png') }}" alt="Products Icon">
            <a href="{{route('produk')}}" class="menu-title">Produk Tani</a>
        </di>
    </div>
</div>

<script>
// Script untuk membuat navbar active sesuai dengan halaman yang dikunjungi
document.addEventListener('DOMContentLoaded', function() {
    // Ambil semua menu item
    const menuItems = document.querySelectorAll('.menu-item');

    // Fungsi untuk menghapus class active dari semua menu
    function removeActiveClass() {
        menuItems.forEach(item => {
            item.classList.remove('active');
        });
    }

    // Tambahkan event listener untuk setiap menu item
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // Hapus class active dari semua menu
            removeActiveClass();

            // Tambahkan class active ke menu yang diklik
            this.classList.add('active');
        });
    });

    // Deteksi halaman saat ini dan tandai menu yang sesuai
    // Gunakan URL path untuk menentukan halaman aktif
    const currentPath = window.location.pathname;

    if (currentPath.includes('berita') || currentPath === '/' || currentPath === '/home') {
        // Berita Pertanian default active
        removeActiveClass();
        menuItems[0].classList.add('active');
    } else if (currentPath.includes('dokumentasi') || currentPath.includes('gallery')) {
        // Dokumentasi active
        removeActiveClass();
        menuItems[1].classList.add('active');
    } else if (currentPath.includes('produk') || currentPath.includes('products')) {
        // Produk Tani active
        removeActiveClass();
        menuItems[2].classList.add('active');
    }
});
</script>
