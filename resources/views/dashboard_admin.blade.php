<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin | Donat-in azza</title>
    
    <style>
        /* ========================================================================== */
        /* VARIABEL TEMA & WARNA (Sesuai dengan website utama)                        */
        /* ========================================================================== */
        :root {
            --pink-50: #FFF0F5;   
            --pink-100: #FFE3EE;  
            --pink-300: #FF9EBE;  
            --pink-500: #FF4D8D;  
            --pink-700: #D92B6B;  
            --gold-light: #FBE7A1;
            --gold: #D4AF37;      
            --dark: #2D2A2B;      
            --dark-light: #5A5557;
            --light: #FFFFFF;
            
            --font-sans: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --font-serif: 'Georgia', 'Times New Roman', serif;
            
            --sidebar-width: 260px;
            --transition-smooth: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            
            --shadow-sm: 0 4px 15px rgba(255, 77, 141, 0.05);
            --shadow-md: 0 10px 30px rgba(255, 77, 141, 0.12);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-sans); color: var(--dark); background-color: #F8F9FA; overflow-x: hidden; }
        h1, h2, h3 { font-family: var(--font-serif); font-weight: 700; color: var(--dark); }
        a { text-decoration: none; color: inherit; }
        button { cursor: pointer; font-family: inherit; }

        /* ========================================================================== */
        /* LAYOUT & SIDEBAR                                                           */
        /* ========================================================================== */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--light);
            box-shadow: 2px 0 15px rgba(0,0,0,0.05);
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: var(--transition-smooth);
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--pink-100);
            text-align: center;
        }

        .sidebar-header .logo {
            font-family: var(--font-serif);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--pink-500);
        }
        .sidebar-header .logo span { color: var(--gold); }
        .sidebar-header .role { font-size: 0.85rem; color: var(--dark-light); margin-top: 5px; display: block; }

        .nav-menu {
            padding: 1.5rem 1rem;
            list-style: none;
            flex: 1;
        }

        .nav-item { margin-bottom: 0.5rem; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            color: var(--dark-light);
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .nav-link:hover, .nav-link.active {
            background-color: var(--pink-50);
            color: var(--pink-500);
        }

        .nav-link.active {
            border-left: 4px solid var(--pink-500);
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem 3rem;
            transition: var(--transition-smooth);
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .mobile-toggle { display: none; background: none; border: none; font-size: 1.5rem; color: var(--pink-500); }

        /* ========================================================================== */
        /* KOMPONEN (CARDS, BUTTONS, BADGES)                                          */
        /* ========================================================================== */
        .card {
            background: var(--light);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(255, 77, 141, 0.05);
        }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 0.6rem 1.2rem; border-radius: 100px; font-weight: 600; font-size: 0.95rem;
            border: none; transition: var(--transition-smooth);
        }
        .btn-primary { background: var(--pink-500); color: var(--light); box-shadow: var(--shadow-sm); }
        .btn-primary:hover { background: var(--pink-700); transform: translateY(-2px); }
        .btn-outline { background: transparent; color: var(--pink-500); border: 2px solid var(--pink-500); }
        .btn-outline:hover { background: var(--pink-50); }
        .btn-danger { background: #FF4D4D; color: white; }
        .btn-danger:hover { background: #D92B2B; }
        .btn-icon { padding: 0.5rem; border-radius: 50%; font-size: 1rem; width: 35px; height: 35px; }

        .badge {
            padding: 0.4rem 1rem; border-radius: 100px; font-size: 0.8rem; font-weight: 700; display: inline-block;
        }
        .badge-proses { background: #FFF3CD; color: #856404; }
        .badge-perjalanan { background: #D1ECF1; color: #0C5460; }
        .badge-selesai { background: #D4EDDA; color: #155724; }

        /* ========================================================================== */
        /* FORM & TABLE                                                               */
        /* ========================================================================== */
        .form-control {
            width: 100%; padding: 0.8rem 1rem; border: 2px solid var(--pink-100);
            border-radius: 12px; font-family: inherit; font-size: 0.95rem; background: var(--light);
            transition: var(--transition-smooth);
        }
        .form-control:focus { outline: none; border-color: var(--pink-500); box-shadow: 0 0 0 3px rgba(255, 77, 141, 0.1); }
        .form-group { margin-bottom: 1.2rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--dark-light); font-size: 0.9rem; }

        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #EEF0F2; }
        th { font-weight: 600; color: var(--dark-light); background: var(--pink-50); font-size: 0.9rem; white-space: nowrap;}
        td { font-size: 0.95rem; vertical-align: middle; }
        tbody tr:hover { background: #FDFDFD; }

        /* ========================================================================== */
        /* GRID LAYOUTS                                                               */
        /* ========================================================================== */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
        .stat-card { display: flex; align-items: center; gap: 1.5rem; }
        .stat-icon { width: 60px; height: 60px; border-radius: 16px; background: var(--pink-100); color: var(--pink-500); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; }
        .stat-info h4 { font-size: 0.9rem; color: var(--dark-light); font-family: var(--font-sans); margin-bottom: 0.2rem;}
        .stat-info p { font-size: 1.5rem; font-weight: 700; color: var(--dark); margin: 0;}

        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; }
        .menu-card { text-align: center; position: relative; overflow: hidden; }
        .menu-img { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin: 0 auto 1rem; background: var(--pink-50); border: 4px solid var(--pink-100); display:flex; align-items:center; justify-content:center; font-size: 3rem;}
        .menu-actions { position: absolute; top: 10px; right: 10px; display: flex; gap: 5px; }

        .section-view { display: none; animation: fadeIn 0.4s ease; }
        .section-view.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        /* ========================================================================== */
        /* MODALS & RESPONSIVE                                                        */
        /* ========================================================================== */
        .modal {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); backdrop-filter: blur(5px);
            z-index: 2000; display: flex; align-items: center; justify-content: center;
            opacity: 0; visibility: hidden; transition: var(--transition-smooth); padding: 1rem;
        }
        .modal.active { opacity: 1; visibility: visible; }
        .modal-content {
            background: var(--light); padding: 2rem; border-radius: 24px;
            width: 100%; max-width: 500px; transform: scale(0.9); transition: var(--transition-smooth);
            max-height: 90vh; overflow-y: auto;
        }
        .modal.active .modal-content { transform: scale(1); }
        .modal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
        .close-modal { background: var(--pink-50); border: none; width: 32px; height: 32px; border-radius: 50%; color: var(--pink-500); font-size: 1.2rem; cursor: pointer; }
        .close-modal:hover { background: var(--pink-100); }

        @media (max-width: 992px) {
            .sidebar { left: -100%; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0; padding: 1.5rem; }
            .mobile-toggle { display: block; }
            .overlay { display: none; position: fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:90; }
            .overlay.show { display: block; }
        }
    </style>
</head>
<body>

    <div class="admin-layout">
        <!-- Overlay untuk Mobile -->
        <div class="overlay" id="sidebarOverlay"></div>

        <!-- Sidebar Kiri -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">🍩 Donat-in<span> azza</span></div>
                <span class="role">Dapur Admin</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active" data-target="dashboard">
                        <span>📊</span> Ringkasan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-target="orders">
                        <span>🛵</span> Riwayat Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-target="menus">
                        <span>🍩</span> Manajemen Menu
                    </a>
                </li>
            </ul>
            <div style="padding: 1.5rem; border-top: 1px solid var(--pink-100); display: flex; flex-direction: column; gap: 10px;">
                <a href="{{ url('/') }}" class="btn btn-primary" style="width: 100%; text-align: center;">
                    <span>🏠</span> Pesan Donat (Beranda)
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline" style="width: 100%; border-color: var(--dark-light); color: var(--dark-light);">
                        <span>🚪</span> Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Konten Utama Kanan -->
        <main class="main-content">
            <div class="topbar">
                <button class="mobile-toggle" id="mobileToggle">☰</button>
                <div style="flex:1;">
                    <h2 id="pageTitle">Ringkasan Dasbor</h2>
                    <p style="font-size: 0.9rem; color: var(--dark-light);">Halo Minza! Selamat datang di Dapur.</p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span style="font-weight: 600; color: var(--pink-500);">Halo, {{ auth()->user()->name }}</span>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--pink-100); display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">👩‍🍳</div>
                </div>
            </div>

            <!-- VIEW 1: DASHBOARD (PENDAPATAN) -->
            <section id="dashboard" class="section-view active">
                <div class="stats-grid">
                    <div class="card stat-card">
                        <div class="stat-icon">💰</div>
                        <div class="stat-info">
                            <h4>Total Pendapatan (Bulan Ini)</h4>
                            <p id="totalRevenueDisplay">Rp 0</p>
                        </div>
                    </div>
                    <div class="card stat-card">
                        <div class="stat-icon" style="background: #E8F5E9; color: #4CAF50;">📦</div>
                        <div class="stat-info">
                            <h4>Pesanan Selesai</h4>
                            <p id="totalOrdersDisplay">0</p>
                        </div>
                    </div>
                    <div class="card stat-card">
                        <div class="stat-icon" style="background: #FFF3CD; color: #FFC107;">⏳</div>
                        <div class="stat-info">
                            <h4>Sedang Diproses</h4>
                            <p id="activeOrdersDisplay">0</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3 style="margin-bottom: 1rem;">Pendapatan Terakhir</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>ID Pesanan</th>
                                    <th>Menu (Qty)</th>
                                    <th>Total Nilai</th>
                                </tr>
                            </thead>
                            <tbody id="revenueTableBody">
                                <!-- Data dimuat oleh JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- VIEW 2: RIWAYAT PESANAN -->
            <section id="orders" class="section-view">
                <div class="card">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
                        <h3 style="margin: 0;">Daftar Pesanan Masuk</h3>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <label style="margin:0;">Urutkan:</label>
                            <select id="orderSort" class="form-control" style="width: auto; padding: 0.5rem 1rem;">
                                <option value="newest">Terbaru</option>
                                <option value="oldest">Terlama</option>
                                <option value="status">Berdasarkan Status</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Waktu & ID</th>
                                    <th>Pelanggan</th>
                                    <th>Pesanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="ordersTableBody">
                                <!-- Data pesanan dimuat via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- VIEW 3: MANAJEMEN MENU -->
            <section id="menus" class="section-view">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3>Katalog Menu Saat Ini</h3>
                    <button class="btn btn-primary" onclick="openMenuModal()">
                        <span>+</span> Tambah Menu Baru
                    </button>
                </div>

                <div class="menu-grid" id="menuGridContainer">
                    <!-- Kartu menu dimuat via JS -->
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================================================== -->
    <!-- MODALS AREA                                                                -->
    <!-- ========================================================================== -->
    
    <!-- Modal Tambah/Edit Menu -->
    <div class="modal" id="menuModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="menuModalTitle">Tambah Menu Baru</h3>
                <button class="close-modal" onclick="closeModals()">×</button>
            </div>
            <form id="menuForm">
                <input type="hidden" id="menuId">
                
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <div id="previewImage" style="width: 100px; height: 100px; border-radius: 50%; background: var(--pink-50); margin: 0 auto 10px; border: 2px dashed var(--pink-300); display: flex; align-items: center; justify-content: center; font-size: 2rem; overflow: hidden;">
                        📷
                    </div>
                    <label style="cursor: pointer; color: var(--pink-500); font-weight: 600; font-size: 0.9rem;">
                        <input type="file" id="menuImage" accept="image/*" style="display: none;" onchange="previewFile()">
                        Upload Foto Menu
                    </label>
                </div>

                <div class="form-group">
                    <label>Nama Donat</label>
                    <input type="text" id="menuName" class="form-control" required placeholder="Cth: Choco Melted">
                </div>
                
                <div class="form-group">
                    <label>Deskripsi Singkat</label>
                    <textarea id="menuDesc" class="form-control" required rows="3" placeholder="Jelaskan rasa donatnya..."></textarea>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Harga Dasar (Per Box isi 5)</label>
                        <input type="number" id="menuBasePrice" class="form-control" required placeholder="25000">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Harga Ekstra (Per Biji)</label>
                        <input type="number" id="menuExtraPrice" class="form-control" required placeholder="5000">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Simpan Menu</button>
            </form>
        </div>
    </div>

    <!-- Modal Detail Pesanan -->
    <div class="modal" id="orderDetailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Pesanan <span id="detailOrderId" style="color: var(--pink-500);"></span></h3>
                <button class="close-modal" onclick="closeModals()">×</button>
            </div>
            <div id="orderDetailContent" style="font-size: 0.95rem; line-height: 1.6;">
                <!-- Diisi via JS -->
            </div>
            
            <div class="form-group" style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #eee;">
                <label>Ubah Status Pesanan:</label>
                <div style="display: flex; gap: 10px;">
                    <select id="updateStatusSelect" class="form-control">
                        <option value="Proses">Sedang Diproses (Dapur)</option>
                        <option value="Perjalanan">Dalam Perjalanan (Kurir)</option>
                        <option value="Selesai">Selesai (Diterima)</option>
                    </select>
                    <button class="btn btn-primary" onclick="updateOrderStatus()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================================== -->
    <!-- JAVASCRIPT LOGIC                                                           -->
    <!-- ========================================================================== -->
    <script>
        // Data dari Laravel Backend
        let appData = @json($appData);

        // Format Rupiah
        const formatRp = (num) => 'Rp ' + num.toLocaleString('id-ID');
        // Format Tanggal
        const formatDate = (dateStr) => {
            const d = new Date(dateStr);
            return `${d.getDate().toString().padStart(2,'0')}/${(d.getMonth()+1).toString().padStart(2,'0')} ${d.getHours().toString().padStart(2,'0')}:${d.getMinutes().toString().padStart(2,'0')}`;
        };

        // Navigasi UI Mobile & Tab
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('mobileToggle');
        
        toggleBtn.onclick = () => { sidebar.classList.add('show'); overlay.classList.add('show'); };
        overlay.onclick = () => { sidebar.classList.remove('show'); overlay.classList.remove('show'); };

        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('.section-view');
        const pageTitle = document.getElementById('pageTitle');

        const titleMap = { 'dashboard': 'Ringkasan Dasbor', 'orders': 'Riwayat Pesanan', 'menus': 'Manajemen Menu' };

        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
                
                const targetId = link.getAttribute('data-target');
                sections.forEach(s => s.classList.remove('active'));
                document.getElementById(targetId).classList.add('active');
                
                pageTitle.innerText = titleMap[targetId];
                
                if(window.innerWidth <= 992) {
                    sidebar.classList.remove('show'); overlay.classList.remove('show');
                }
            });
        });

        // ==========================================================================
        // RENDER FUNGSI (Memasukkan data ke HTML)
        // ==========================================================================

        function renderDashboard() {
            let totalRev = 0, completed = 0, active = 0;
            const tableBody = document.getElementById('revenueTableBody');
            tableBody.innerHTML = '';
            
            // Urutkan dari yang terbaru
            const sortedOrders = [...appData.orders].sort((a,b) => new Date(b.date) - new Date(a.date));

            sortedOrders.forEach(order => {
                if(order.status === 'Selesai') {
                    totalRev += order.total;
                    completed++;
                } else {
                    active++;
                }

                // Tampilkan max 5 data terakhir di tabel ringkasan
                if(tableBody.children.length < 5 && order.status === 'Selesai') {
                    tableBody.innerHTML += `
                        <tr>
                            <td>${formatDate(order.date)}</td>
                            <td><span style="color:var(--pink-500); font-weight:bold;">${order.id}</span></td>
                            <td>${order.product} (${order.qty}x)</td>
                            <td style="font-weight:bold; color:var(--dark);">${formatRp(order.total)}</td>
                        </tr>
                    `;
                }
            });

            if(tableBody.children.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="4" style="text-align:center; color:var(--dark-light);">Belum ada pendapatan yang selesai.</td></tr>`;
            }

            document.getElementById('totalRevenueDisplay').innerText = formatRp(totalRev);
            document.getElementById('totalOrdersDisplay').innerText = completed;
            document.getElementById('activeOrdersDisplay').innerText = active;
        }

        function renderOrders() {
            const tableBody = document.getElementById('ordersTableBody');
            const sortMode = document.getElementById('orderSort').value;
            
            let sorted = [...appData.orders];
            if (sortMode === 'newest') sorted.sort((a,b) => new Date(b.date) - new Date(a.date));
            else if (sortMode === 'oldest') sorted.sort((a,b) => new Date(a.date) - new Date(b.date));
            else if (sortMode === 'status') {
                const statusWeight = { "Proses": 1, "Perjalanan": 2, "Selesai": 3 };
                sorted.sort((a,b) => statusWeight[a.status] - statusWeight[b.status]);
            }

            tableBody.innerHTML = '';
            if (sorted.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding: 2rem;">Belum ada pesanan.</td></tr>`;
                return;
            }

            sorted.forEach(order => {
                let badgeClass = '';
                if(order.status === 'Proses') badgeClass = 'badge-proses';
                if(order.status === 'Perjalanan') badgeClass = 'badge-perjalanan';
                if(order.status === 'Selesai') badgeClass = 'badge-selesai';

                tableBody.innerHTML += `
                    <tr>
                        <td>
                            <div style="font-weight:bold; color:var(--pink-500);">${order.id}</div>
                            <div style="font-size:0.8rem; color:var(--dark-light);">${formatDate(order.date)}</div>
                        </td>
                        <td>
                            <div style="font-weight:600;">${order.customer}</div>
                            <div style="font-size:0.8rem; color:var(--dark-light);">${order.wa}</div>
                        </td>
                        <td>
                            <div>${order.product} (Isi ${order.size})</div>
                            <div style="font-size:0.8rem; color:var(--dark-light);">${order.qty} Kotak - ${order.method}</div>
                        </td>
                        <td><span class="badge ${badgeClass}">${order.status}</span></td>
                        <td>
                            <button class="btn btn-outline btn-icon" title="Lihat/Edit Status" onclick="openOrderDetail('${order.id}')">👁️</button>
                            <button class="btn btn-danger btn-icon" title="Hapus Pesanan" onclick="deleteOrder('${order.id}')">🗑️</button>
                        </td>
                    </tr>
                `;
            });
        }

        function renderMenus() {
            const grid = document.getElementById('menuGridContainer');
            grid.innerHTML = '';
            
            appData.menus.forEach(menu => {
                // Pengecekan apakah gambar adalah emoji atau URL (Sederhana)
                const isEmoji = menu.img.length <= 4; 
                let imgContent = isEmoji ? menu.img : `<img src="${menu.img}" alt="${menu.name}" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">`;

                grid.innerHTML += `
                    <div class="card menu-card">
                        <div class="menu-actions">
                            <button class="btn btn-outline btn-icon" style="width:30px; height:30px; padding:0;" onclick="openMenuModal(${menu.id})" title="Edit">✏️</button>
                            <button class="btn btn-danger btn-icon" style="width:30px; height:30px; padding:0;" onclick="deleteMenu(${menu.id})" title="Hapus">🗑️</button>
                        </div>
                        <div class="menu-img">${imgContent}</div>
                        <h4 style="margin-bottom:0.5rem; font-size:1.1rem;">${menu.name}</h4>
                        <p style="font-size:0.85rem; color:var(--dark-light); margin-bottom:1rem; height:40px; overflow:hidden;">${menu.desc}</p>
                        <div style="background:var(--pink-50); padding:0.5rem; border-radius:8px; display:flex; justify-content:space-between; font-size:0.85rem;">
                            <span>Dasar: <strong>${formatRp(menu.basePrice)}</strong></span>
                            <span style="color:var(--pink-500);">+ <strong>${formatRp(menu.extraPrice)}</strong>/pc</span>
                        </div>
                    </div>
                `;
            });
        }

        // ==========================================================================
        // EVENT LISTENERS & CRUD LOGIC
        // ==========================================================================

        document.getElementById('orderSort').addEventListener('change', renderOrders);

        // --- Modals Logic ---
        function closeModals() {
            document.querySelectorAll('.modal').forEach(m => m.classList.remove('active'));
        }

        // --- MANAJEMEN MENU ---
        let currentMenuImageBase64 = null; // Menyimpan file upload lokal
        
        function previewFile() {
            const file = document.getElementById('menuImage').files[0];
            if (file) {
                const reader = new FileReader();
                reader.onloadend = function () {
                    currentMenuImageBase64 = reader.result;
                    document.getElementById('previewImage').innerHTML = `<img src="${reader.result}" style="width:100%; height:100%; object-fit:cover;">`;
                }
                reader.readAsDataURL(file);
            }
        }

        function openMenuModal(id = null) {
            document.getElementById('menuForm').reset();
            document.getElementById('previewImage').innerHTML = '📷';
            currentMenuImageBase64 = null;

            if (id) {
                document.getElementById('menuModalTitle').innerText = 'Edit Menu';
                const menu = appData.menus.find(m => m.id === id);
                document.getElementById('menuId').value = menu.id;
                document.getElementById('menuName').value = menu.name;
                document.getElementById('menuDesc').value = menu.desc;
                document.getElementById('menuBasePrice').value = menu.basePrice;
                document.getElementById('menuExtraPrice').value = menu.extraPrice;
                
                const isEmoji = menu.img.length <= 4;
                if(!isEmoji) {
                    currentMenuImageBase64 = menu.img;
                    document.getElementById('previewImage').innerHTML = `<img src="${menu.img}" style="width:100%; height:100%; object-fit:cover;">`;
                } else {
                    document.getElementById('previewImage').innerHTML = menu.img;
                }
            } else {
                document.getElementById('menuModalTitle').innerText = 'Tambah Menu Baru';
                document.getElementById('menuId').value = '';
            }
            document.getElementById('menuModal').classList.add('active');
        }

        document.getElementById('menuForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const id = document.getElementById('menuId').value;
            
            const newMenu = {
                id: id ? parseInt(id) : Date.now(),
                name: document.getElementById('menuName').value,
                desc: document.getElementById('menuDesc').value,
                basePrice: parseInt(document.getElementById('menuBasePrice').value),
                extraPrice: parseInt(document.getElementById('menuExtraPrice').value),
                img: currentMenuImageBase64 ? currentMenuImageBase64 : "🍩" // Default emoji jika tidak upload gambar
            };

            if (id) {
                const index = appData.menus.findIndex(m => m.id == id);
                appData.menus[index] = newMenu;
            } else {
                appData.menus.unshift(newMenu); // Tambah di awal
            }

            fetch("{{ route('admin.menus.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(newMenu)
            }).then(res => res.json()).then(data => {
                if(data.success) {
                    location.reload(); // Reload untuk mendapatkan ID asli dan data ter-update
                }
            });

            closeModals();
            renderMenus();
        });

        function deleteMenu(id) {
            if (confirm('Yakin ingin menghapus menu ini dari daftar?')) {
                appData.menus = appData.menus.filter(m => m.id !== id);
                
                fetch(`/admin/menus/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(res => res.json()).then(data => {
                    if(data.success) {
                        renderMenus();
                    }
                });
            }
        }

        // --- MANAJEMEN PESANAN ---
        let selectedOrderId = null;

        function openOrderDetail(id) {
            const order = appData.orders.find(o => o.id === id);
            selectedOrderId = id;
            
            document.getElementById('detailOrderId').innerText = order.id;
            document.getElementById('updateStatusSelect').value = order.status;

            let html = `
                <table style="width:100%; margin-bottom: 1rem;">
                    <tr><td style="color:var(--dark-light); width:40%; border:none; padding:5px 0;">Pelanggan</td><td style="font-weight:600; border:none; padding:5px 0;">: ${order.customer}</td></tr>
                    <tr><td style="color:var(--dark-light); border:none; padding:5px 0;">No. WhatsApp</td><td style="font-weight:600; border:none; padding:5px 0;">: <a href="https://wa.me/62${order.wa.substring(1)}" target="_blank" style="color:var(--pink-500);">+62 ${order.wa.substring(1)}</a></td></tr>
                    <tr><td style="color:var(--dark-light); border:none; padding:5px 0;">Waktu Pesan</td><td style="font-weight:600; border:none; padding:5px 0;">: ${formatDate(order.date)}</td></tr>
                    <tr><td style="color:var(--dark-light); border:none; padding:5px 0;">Tipe Layanan</td><td style="font-weight:600; border:none; padding:5px 0;">: ${order.method}</td></tr>
                </table>
                <div style="background: var(--pink-50); padding: 1rem; border-radius: 12px; margin-bottom: 1rem;">
                    <div style="font-weight:bold; margin-bottom: 5px;">Rincian Bawaan:</div>
                    <div>- ${order.product} (Isi ${order.size} pcs) x ${order.qty} Kotak</div>
                    <div style="margin-top: 5px; font-weight:bold; color:var(--pink-700);">Total Harga: ${formatRp(order.total)}</div>
                </div>
                <div>
                    <strong style="color:var(--dark-light);">Pesan Tambahan (Notes):</strong>
                    <p style="background:#f1f1f1; padding:10px; border-radius:8px; margin-top:5px; font-style:italic;">${order.notes ? `"${order.notes}"` : 'Tidak ada catatan.'}</p>
                </div>
            `;

            document.getElementById('orderDetailContent').innerHTML = html;
            document.getElementById('orderDetailModal').classList.add('active');
        }

        function updateOrderStatus() {
            const newStatus = document.getElementById('updateStatusSelect').value;
            const order = appData.orders.find(o => o.id === selectedOrderId);
            if(order) {
                order.status = newStatus;
                
                fetch(`/admin/orders/${order.id}/status`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({status: newStatus})
                }).then(res => res.json()).then(data => {
                    closeModals();
                    renderOrders();
                    renderDashboard(); // Update angka dasbor
                    
                    const toast = document.createElement('div');
                    toast.style.cssText = "position:fixed; bottom:20px; right:20px; background:var(--pink-500); color:white; padding:1rem; border-radius:8px; z-index:9999; box-shadow:0 5px 15px rgba(0,0,0,0.2); transition: 0.3s; animation: fadeIn 0.3s;";
                    toast.innerHTML = `Status pesanan <b>${order.id}</b> berhasil diubah menjadi <b>${newStatus}</b>.`;
                    document.body.appendChild(toast);
                    setTimeout(() => { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }, 3000);
                });
            }
        }

        function deleteOrder(id) {
            if (confirm(`Yakin ingin menghapus riwayat pesanan ${id} secara permanen? Data pendapatan juga akan terpengaruh.`)) {
                appData.orders = appData.orders.filter(o => o.id !== id);
                
                fetch(`/admin/orders/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(res => res.json()).then(data => {
                    renderOrders();
                    renderDashboard();
                });
            }
        }

        // ==========================================================================
        // INIT PADA SAAT HALAMAN DIMUAT
        // ==========================================================================
        window.onload = function() {
            renderDashboard();
            renderOrders();
            renderMenus();
        };
    </script>
</body>
</html>