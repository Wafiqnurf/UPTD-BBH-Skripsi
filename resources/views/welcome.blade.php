    @extends('layouts.layouts')

    @section('content')
    <nav class="navbar" aria-label="Main Navigation">
        <div class="navbar-logo">
            <img src="{{ asset('assets/images/icon.png') }}" alt="Logo UPTD Balai Benih" />
        </div>
        <div class="navbar-links">
            <a href="#beranda">Beranda</a>
            <a href="#tentang">Tentang</a>
            <a href="#komoditas">Layanan</a>
            <a href="#produk">Produk</a>
            <a href="#galeri">Gallery</a>
            <a href="#kontak">Kontak</a>
        </div>
        <div class="hamburger-menu">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    <section id="beranda" class="hero" aria-labelledby="hero-title">
        <div class="hero-content">
            <h1 id="hero-title">Inovasi <span>Benih Unggul</span> Nasional</h1>
            <p>
                Mengembangkan dan Menyediakan Benih Berkualitas Tinggi untuk Mendukung
                Ketahanan Pangan Indonesia
            </p>
            <div class="hero-cta">
                <a href="#layanan" class="btn btn-primary">Jelajahi Layanan</a>
                <a href="#kontak" class="btn btn-secondary">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <section id="tentang" class="about-us-modern" aria-labelledby="about-title">
        <div class="about-container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title" id="about-title">Tentang Kami</h2>
                    <div class="about-description">
                        <p>
                            UPTD Balai Benih Hortikultura adalah lembaga pemerintah yang
                            berkomitmen penuh dalam pengembangan dan pelestarian benih
                            tanaman hortikultura.
                        </p>
                        <p>
                            Adapun juga beberapa Satuan Pelayanan yang terletak di beberapa
                            daerah seperti :<br />
                            - Satuan Pelayanan Margahayu Lembang<br />
                            - Satuan Pelayanan Cimangkok<br />
                            - Satuan Pelayanan Kasugengan<br />
                            - Satuan Pelayanan Salebu<br />
                            - Satuan Pelayanan Cikadu<br />
                            - Satuan Pelayanan Citatah<br />
                        </p>

                        <div class="about-highlights">
                            <div class="highlight-card">
                                <div class="highlight-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="highlight-text">
                                    <h4>Visi Nasional</h4>
                                    <p>
                                        Mendukung ketahanan pangan melalui inovasi benih unggul
                                    </p>
                                </div>
                            </div>

                            <div class="highlight-card">
                                <div class="highlight-icon">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <div class="highlight-text">
                                    <h4>Misi Berkelanjutan</h4>
                                    <p>
                                        Mengembangkan varietas benih berkualitas dan ramah
                                        lingkungan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-visual">
                    <div class="visual-grid">
                        <div class="visual-item">
                            <img src="{{ asset('assets/images/Bg.jpeg') }}" alt="Laboratorium Benih" />
                        </div>
                        <div class="visual-item">
                            <img src="{{ asset('assets/images/pelatihan kuljar.png') }}" alt="Laboratorium Benih" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Insert this section after the existing sections, before the gallery section -->
    <section class="commodities-modern" id="komoditas">
        <div class="commodities-container">
            <div class="section-header">
                <h2 class="section-title">Komoditas dan Layanan Kami</h2>
                <p class="section-description">
                    Inovasi berkelanjutan dalam pengembangan pertanian melalui teknologi
                    mutakhir dan keahlian komprehensif.
                </p>
            </div>

            <div class="commodities-grid">
                <div class="commodity-card">
                    <div class="commodity-icon">
                        <i class="fas fa-apple-alt"></i>
                    </div>
                    <h3 class="commodity-title">Komoditas Buah</h3>
                    <p class="commodity-description">
                        Pengembangan varietas buah unggul dengan fokus pada kualitas,
                        produktivitas, dan ketahanan.
                    </p>
                    <ul class="commodity-list">
                        <li class="commodity-list-item">Hasil Buah Berkualitas</li>
                        <li class="commodity-list-item">Benih Tanaman Unggulan</li>
                        <li class="commodity-list-item">Varietas Tropis Inovatif</li>
                    </ul>
                </div>

                <div class="commodity-card">
                    <div class="commodity-icon">
                        <i class="fas fa-carrot"></i>
                    </div>
                    <h3 class="commodity-title">Komoditas Sayuran</h3>
                    <p class="commodity-description">
                        Riset intensif untuk menciptakan varietas sayuran dengan
                        produktivitas tinggi dan nutrisi optimal.
                    </p>
                    <ul class="commodity-list">
                        <li class="commodity-list-item">Tanaman Sayuran Produktif</li>
                        <li class="commodity-list-item">Tanaman Sayuran Hidroponik</li>
                        <li class="commodity-list-item">Sayuran Tahan Penyakit</li>
                    </ul>
                </div>

                <div class="commodity-card">
                    <div class="commodity-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3 class="commodity-title">Biofarmatika</h3>
                    <p class="commodity-description">
                        Eksplorasi potensi tanaman dalam pengembangan solusi kesehatan dan
                        farmasi berkelanjutan.
                    </p>
                    <ul class="commodity-list">
                        <li class="commodity-list-item">Ekstrak Tanaman Obat</li>
                        <li class="commodity-list-item">Senyawa Aktif</li>
                        <li class="commodity-list-item">Fitofarmaka Inovatif</li>
                    </ul>
                </div>

                <div class="commodity-card">
                    <div class="commodity-icon">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <h3 class="commodity-title">Kultur Jaringan</h3>
                    <p class="commodity-description">
                        Teknologi mutakhir untuk reproduksi dan pengembangan tanaman
                        dengan presisi tinggi.
                    </p>
                    <ul class="commodity-list">
                        <li class="commodity-list-item">Reproduksi In-Vitro</li>
                        <li class="commodity-list-item">Seleksi Bibit</li>
                        <li class="commodity-list-item">Konservasi Genetik</li>
                    </ul>
                </div>

                <div class="commodity-card">
                    <div class="commodity-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3 class="commodity-title">Tanaman Hias</h3>
                    <p class="commodity-description">
                        Pengembangan varietas tanaman hias dengan estetika tinggi dan
                        adaptabilitas superior.
                    </p>
                    <ul class="commodity-list">
                        <li class="commodity-list-item">Aneka Bunga</li>
                        <li class="commodity-list-item">Tanaman Lansekap</li>
                        <li class="commodity-list-item">Varietas Eksotis</li>
                    </ul>
                </div>
            </div>

            <div class="commodities-cta">
                <a href="#kontak" class="btn-modern btn-primary-modern">
                    Konsultasi Ahli
                </a>
                <a href="#produk" class="btn-modern btn-secondary-modern">
                    Jelajahi Produk
                </a>
            </div>
        </div>
    </section>

    <section id="produk" class="products" aria-labelledby="products-title">
        <h2 class="section-title" id="products-title">Produk Kami</h2>
        <p>
            Berbagai varietas unggul yang telah kami kembangkan untuk mendukung
            produktivitas pertanian dengan teknologi mutakhir dan inovasi
            berkelanjutan.<br />
            <span>Pemesanan dapat dilakukan melalui instagram ataupun Whatsapp
                kami</span>
        </p>
        <p></p>
        <div class="products-grid">
            @foreach ($produk as $produk)
            <div class="product-card">
                <img src="{{ asset('storage/produk/' . $produk->image) }}" alt="Benih Alpukat" />
                <h3>{{ $produk->judul }}</h3>
                <p>
                    {!! Str::limit(strip_tags($produk->desc), 100) !!}
                </p>
            </div>
            @endforeach
    </section>

    <section id="galeri" class="gallery-container" aria-labelledby="gallery-title">
        <h2 class="gallery-title" id="gallery-title">Galeri Kegiatan</h2>
        <div class="gallery-grid" id="gallery-grid">
            @foreach ($artikels as $artikel )
            <div class="gallery-item">
                <img src="{{ asset('storage/artikel/' . $artikel->image) }}" alt="{{ $artikel->judul }}" />
                <div class="gallery-overlay">
                    <h3>{{ $artikel->judul }}</h3>
                    <p>
                        {!! Str::limit(strip_tags($artikel->desc), 100) !!}
                    </p>
                    <button class="gallery-zoom-btn">Lihat Detail</button>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <div id="gallery-modal" class="gallery-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <img id="modal-image" src="" alt="Gambar Detail" />
        </div>
    </div>
