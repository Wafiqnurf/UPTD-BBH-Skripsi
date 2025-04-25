<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Improved SEO Title with Keywords -->
    <title>
        UPTD Balai Benih Hortikultura - Inovasi Benih Unggul untuk Ketahanan
        Pangan Indonesia
    </title>

    <!-- Added Meta Description for Better Search Results -->
    <meta name="description"
        content="UPTD Balai Benih Hortikultura - Pusat pengembangan benih unggul hortikultura. Kami menyediakan benih berkualitas tinggi, layanan sertifikasi, konsultasi pertanian, dan riset inovatif untuk mendukung ketahanan pangan nasional." />

    <!-- Added Meta Keywords -->
    <meta name="keywords"
        content="benih hortikultura, benih unggul, ketahanan pangan, produksi benih, sertifikasi benih, inovasi pertanian, benih berkualitas" />

    <!-- Open Graph Meta Tags for Social Media Sharing -->
    <meta property="og:title" content="UPTD Balai Benih Hortikultura - Inovasi Benih Unggul" />
    <meta property="og:description"
        content="Pusat pengembangan benih unggul untuk mendukung ketahanan pangan Indonesia" />
    <meta property="og:type" content="website" />


    <link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </script>
</head>

<body>

    {{-- Content --}}
    @yield('content')
    <footer id="kontak" aria-label="Contact and Footer Information">
        <div class="footer-section">
            <h3>Tentang Kami</h3>
            <p>
                UPTD Balai Benih Hortikultura berkomitmen untuk mengembangkan dan
                melestarikan benih berkualitas tinggi.
            </p>
        </div>
        <div class="footer-section">
            <h3>Kontak</h3>
            <p>Jl. Ir. Soekarno km.23 Jatinangor-Sumedang 45363</p>
            <p>Telp: (022) 7911067</p>
            <p>Email: pulahta.bpbhat@gmail.com</p>
        </div>
        <div class="footer-section">
            <h3>Media Sosial</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/balaibenih.hortikultura.1"><i class="fab fa-facebook"></i></a>
                <a
                    href="https://www.instagram.com/bbhortikulturajabar?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                        class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="footer-section">
            <h3>Newsletter</h3>
            <form>
                <input type="email" placeholder="Email Anda" style="width: 100%; padding: 10px; margin-bottom: 10px" />
                <button type="submit" class="cta-button cta-primary" style="width: 100%">
                    Berlangganan
                </button>
            </form>
        </div>
    </footer>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
