<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
        --primary-color: #4723D9;
        --light-color: #f6f6f9;
        --dark-color: #363949;
        --danger-color: #ff7782;
        --success-color: #41f1b6;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        padding: 1rem;
        background-color: white;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--light-color);
    }

    .logo img {
        width: 40px;
        height: 40px;
    }

    .menu-items {
        margin-top: 2rem;
    }

    .menu-items a {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.8rem;
        color: var(--dark-color);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .menu-items a:hover {
        background-color: var(--light-color);
        border-radius: 5px;
    }

    .menu-items a.active {
        background-color: var(--primary-color);
        color: white;
        border-radius: 5px;
    }

    .main-content {
        margin-left: 250px;
        padding: 2rem;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background-color: var(--light-color);
        border-radius: 5px;
    }

    .search-box input {
        border: none;
        background: none;
        outline: none;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .card {
        background-color: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .table-container {
        background-color: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid var(--light-color);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-danger {
        background-color: var(--danger-color);
        color: white;
    }

    .btn-success {
        background-color: var(--success-color);
        color: white;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        width: 90%;
        max-width: 500px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid var(--light-color);
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="/api/placeholder/40/40" alt="Logo">
            <h2>Admin Panel</h2>
        </div>
        <div class="menu-items">
            <a href="#" class="active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="#">
                <i class="fas fa-images"></i>
                <span>Foto Kegiatan</span>
            </a>
            <a href="#">
                <i class="fas fa-box"></i>
                <span>Produk</span>
            </a>
            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari...">
            </div>
            <div class="user-profile">
                <img src="/api/placeholder/40/40" alt="Profile">
                <span>Admin</span>
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Total Produk</h3>
                <p>150</p>
            </div>
            <div class="card">
                <h3>Total Foto</h3>
                <p>300</p>
            </div>
            <div class="card">
                <h3>Pengunjung</h3>
                <p>1,500</p>
            </div>
        </div>

        <div class="table-container">
            <div class="header">
                <h2>Daftar Produk</h2>
                <button class="btn btn-primary" onclick="openModal('add')">
                    <i class="fas fa-plus"></i> Tambah Produk
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    <!-- Data will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle">Tambah Produk</h2>
            <form id="productForm">
                <div class="form-group">
                    <label for="productName">Nama Produk</label>
                    <input type="text" id="productName" required>
                </div>
                <div class="form-group">
                    <label for="productCategory">Kategori</label>
                    <input type="text" id="productCategory" required>
                </div>
                <div class="form-group">
                    <label for="productPrice">Harga</label>
                    <input type="number" id="productPrice" required>
                </div>
                <div class="form-group">
                    <label for="productImage">Gambar Produk</label>
                    <input type="file" id="productImage" accept="image/*">
                </div>
                <div class="action-buttons">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="closeModal()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Sample data
    let products = [{
            id: 1,
            name: 'Produk 1',
            category: 'Kategori A',
            price: 100000
        },
        {
            id: 2,
            name: 'Produk 2',
            category: 'Kategori B',
            price: 150000
        },
        {
            id: 3,
            name: 'Produk 3',
            category: 'Kategori A',
            price: 200000
        }
    ];

    // Function to display products
    function displayProducts() {
        const tableBody = document.getElementById('productTableBody');
        tableBody.innerHTML = '';

        products.forEach((product, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${product.name}</td>
                    <td>${product.category}</td>
                    <td>Rp ${product.price.toLocaleString()}</td>
                    <td class="action-buttons">
                        <button class="btn btn-success" onclick="openModal('edit', ${product.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger" onclick="deleteProduct(${product.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
            tableBody.appendChild(row);
        });
    }

    // Function to open modal
    function openModal(type, id = null) {
        const modal = document.getElementById('productModal');
        const modalTitle = document.getElementById('modalTitle');
        const form = document.getElementById('productForm');

        modal.style.display = 'block';

        if (type === 'edit' && id) {
            const product = products.find(p => p.id === id);
            modalTitle.textContent = 'Edit Produk';
            document.getElementById('productName').value = product.name;
            document.getElementById('productCategory').value = product.category;
            document.getElementById('productPrice').value = product.price;
            form.dataset.editId = id;
        } else {
            modalTitle.textContent = 'Tambah Produk';
            form.reset();
            delete form.dataset.editId;
        }
    }

    // Function to close modal
    function closeModal() {
        const modal = document.getElementById('productModal');
        modal.style.display = 'none';
    }

    // Function to handle form submission
    document.getElementById('productForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = {
            name: document.getElementById('productName').value,
            category: document.getElementById('productCategory').value,
            price: parseInt(document.getElementById('productPrice').value)
        };

        if (this.dataset.editId) {
            // Edit existing product
            const id = parseInt(this.dataset.editId);
            const index = products.findIndex(p => p.id === id);
            products[index] = {
                ...products[index],
                ...formData
            };
        } else {
            // Add new product
            const newId = products.length > 0 ? Math.max(...products.map(p => p.id)) + 1 : 1;
            products.push({
                id: newId,
                ...formData
            });
        }

        displayProducts();
        closeModal();
    });

    // Function to delete product
    function deleteProduct(id) {
        if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
            products = products.filter(p => p.id !== id);
            displayProducts();
        }
    }

    // Initial display
    displayProducts();
    </script>
</body>

</html>
