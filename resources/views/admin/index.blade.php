<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Pertanian</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
        /* Warna utama yang lebih lembut */
        --primary-color: #3B82F6;
        --secondary-color: #2563EB;
        --accent-color: #93C5FD;
        --hover-color: #1D4ED8;

        /* Background yang lebih nyaman di mata */
        --bg-color: #F8FAFC;
        --sidebar-bg: #1E293B;
        --card-bg: #ffffff;

        /* Teks yang lebih kontras tapi tetap nyaman */
        --text-light: #F1F5F9;
        --text-primary: #0F172A;
        --text-secondary: #475569;

        /* Warna pendukung */
        --border-color: #E2E8F0;
        --success-color: #059669;
        --danger-color: #DC2626;
    }

    body {
        display: flex;
        background-color: var(--bg-color);
        min-height: 100vh;
    }

    .sidebar {
        width: 280px;
        background: linear-gradient(180deg, var(--sidebar-bg) 0%, #334155 100%);
        padding: 20px;
        box-shadow: 4px 0 15px rgba(0, 0, 0, 0.08);
        position: fixed;
        height: 100vh;
        overflow-y: auto;
    }

    .logo-container {
        display: flex;
        align-items: center;
        padding: 20px 15px;
        margin-bottom: 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-container img {
        width: 45px;
        height: 45px;
        margin-right: 15px;
    }

    .logo-container h2 {
        color: var(--text-light);
        font-size: 1.6rem;
        font-weight: 600;
        background: linear-gradient(45deg, #93C5FD, #60A5FA);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .nav-section {
        margin-bottom: 25px;
    }

    .nav-title {
        color: var(--accent-color);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 0 15px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        margin-bottom: 8px;
        cursor: pointer;
        border-radius: 12px;
        transition: all 0.3s ease;
        color: var(--text-light);
        opacity: 0.85;
    }

    .menu-item:hover {
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.15), rgba(37, 99, 235, 0.15));
        opacity: 1;
        transform: translateX(5px);
    }

    .menu-item.active {
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.2), rgba(37, 99, 235, 0.2));
        color: white;
        opacity: 1;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.1);
    }

    .menu-item img {
        width: 20px;
        margin-right: 12px;
    }

    .menu-item span {
        font-weight: 500;
    }

    .menu-item .menu-title {
        margin-left: 12px;
        font-size: 1rem;
    }

    .main-content {
        flex: 1;
        padding: 25px;
        margin-left: 280px;
    }

    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 25px;
        border-radius: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.15);
    }

    .dashboard-header h2 {
        color: white;
        font-size: 1.8rem;
    }

    .tambah-data {
        background-color: rgba(255, 255, 255, 0.95);
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        cursor: pointer;
        color: var(--primary-color);
        text-decoration: none;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .tambah-data:hover {
        background-color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .content-box {
        background-color: var(--card-bg);
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }

    .content-box h3 {
        color: var(--text-primary);
        margin-bottom: 25px;
        font-size: 1.4rem;
        font-weight: 600;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    table th {
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 16px;
        font-weight: 500;
    }

    th:first-child {
        border-radius: 8px 0 0 8px;
    }

    th:last-child {
        border-radius: 0 8px 8px 0;
    }

    table td {
        padding: 16px;
        color: var(--text-secondary);
        border: 1px solid var(--border-color);
        background-color: var(--card-bg);
    }

    tr:hover td {
        background-color: #F8FAF9;
    }

    td:first-child {
        border-radius: 8px 0 0 8px;
    }

    td:last-child {
        border-radius: 0 8px 8px 0;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .edit-btn {
        background-color: var(--primary-color);
    }

    .delete-btn {
        background-color: var(--danger-color);
    }

    .action-btn:hover {
        transform: translateY(-2px);
        filter: brightness(1.1);
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 80px;
        }

        .logo-container h2,
        .menu-item span,
        .nav-title {
            display: none;
        }

        .main-content {
            margin-left: 80px;
        }

        .menu-item {
            justify-content: center;
        }

        .menu-item img {
            margin-right: 0;
        }
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('assets/images/icon.png') }}" alt="Agriculture Logo">
            <h2>Panel Admin</h2>
        </div>

        <div class="nav-section">
            <h3 class="nav-title">Menu</h3>
            <div class="menu-item active">
                <img src="/api/placeholder/20/20" alt="News Icon">
                <span class="menu-title">Berita Pertanian</span>
            </div>
            <div class="menu-item">
                <img src="/api/placeholder/20/20" alt="Photos Icon">
                <span class="menu-title">Dokumentasi</span>
            </div>
            <div class="menu-item">
                <img src="/api/placeholder/20/20" alt="Products Icon">
                <span class="menu-title">Produk Tani</span>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="dashboard-header">
            <h2>Dashboard Pertanian</h2>
            <a href="#" class="tambah-data">+ Tambah Data</a>
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
                    <tr>
                        <td>1</td>
                        <td>Pertanian yang Ideal</td>
                        <td>21-09-2025</td>
                        <td>Pertanian Ideal adalah sistem pertanian yang berkelanjutan...</td>
                        <td>
                            <img src="/api/placeholder/50/50" alt="Foto Pertanian" style="border-radius: 8px;">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn edit-btn">Edit</button>
                                <button class="action-btn delete-btn">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
