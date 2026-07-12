<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya | Donat-in azza</title>
    
    <style>
        :root {
            /* Variabel Warna Utama */
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
            
            /* Tipografi */
            --font-sans: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --font-serif: 'Georgia', 'Times New Roman', serif;
            
            /* Layout & Efek */
            --sidebar-width: 280px;
            --transition-smooth: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            --shadow-sm: 0 4px 15px rgba(255, 77, 141, 0.05);
            --shadow-md: 0 10px 30px rgba(255, 77, 141, 0.12);
            --radius-md: 20px;
            --radius-pill: 100px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: var(--font-sans); 
            color: var(--dark); 
            background-color: #F8F9FA; /* Sedikit abu-abu agar card lebih menonjol */
            overflow-x: hidden; 
        }
        h1, h2, h3, h4 { font-family: var(--font-serif); font-weight: 700; color: var(--dark); }
        a { text-decoration: none; color: inherit; }
        button { cursor: pointer; font-family: inherit; }

        .dashboard-layout { display: flex; min-height: 100vh; }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--light);
            box-shadow: 2px 0 20px rgba(0,0,0,0.03);
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: var(--transition-smooth);
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--pink-50);
            text-align: center;
        }

        .sidebar-header .logo { font-size: 1.5rem; color: var(--pink-500); }
        .sidebar-header .logo span { color: var(--gold); }
        
        .user-snippet {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 1.5rem;
            background: var(--pink-50);
            margin: 1rem;
            border-radius: 16px;
        }
        .user-snippet img { width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid var(--pink-300); }
        .user-snippet-info h4 { font-family: var(--font-sans); font-size: 0.95rem; margin-bottom: 2px; }
        .user-snippet-info p { font-size: 0.8rem; color: var(--pink-700); font-weight: 600; margin: 0; }

        .nav-menu { padding: 0 1rem; list-style: none; flex: 1; }
        .nav-item { margin-bottom: 0.5rem; }
        .nav-link {
            display: flex; align-items: center; gap: 15px; padding: 1rem 1.5rem;
            border-radius: 12px; color: var(--dark-light); font-weight: 600; transition: var(--transition-smooth);
        }
        .nav-link:hover, .nav-link.active { background-color: var(--pink-50); color: var(--pink-500); }
        .nav-link.active { border-right: 4px solid var(--pink-500); }

        /* Main Content Styles */
        .main-content {
            flex: 1; margin-left: var(--sidebar-width); padding: 2rem 3rem; transition: var(--transition-smooth);
            max-width: 1200px;
        }

        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; }
        .mobile-toggle { display: none; background: none; border: none; font-size: 1.5rem; color: var(--pink-500); }
        .page-title h2 { font-size: 1.8rem; margin-bottom: 0.2rem; }
        .page-title p { color: var(--dark-light); font-size: 0.95rem; }

        .card {
            background: var(--light); border-radius: var(--radius-md); padding: 2rem;
            box-shadow: var(--shadow-sm); border: 1px solid rgba(255, 77, 141, 0.05);
            margin-bottom: 2rem;
        }

        .section-view { display: none; animation: fadeIn 0.4s ease; }
        .section-view.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        /* Forms */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group.full-width { grid-column: 1 / -1; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--dark-light); font-size: 0.9rem; }
        
        .form-control {
            width: 100%; padding: 0.9rem 1.2rem; border: 2px solid var(--pink-100);
            border-radius: 12px; font-family: inherit; font-size: 0.95rem; background: var(--light);
            transition: var(--transition-smooth); color: var(--dark);
        }
        .form-control:focus { outline: none; border-color: var(--pink-500); box-shadow: 0 0 0 3px rgba(255, 77, 141, 0.1); }
        textarea.form-control { resize: vertical; min-height: 100px; }

        /* Input dengan Ikon (untuk Password) */
        .input-icon-wrapper { position: relative; }
        .input-icon-wrapper .form-control { padding-right: 3rem; }
        .password-toggle {
            position: absolute; right: 1rem; top: 50%; transform: translateY(-50%);
            background: none; border: none; font-size: 1.1rem; color: var(--dark-light); cursor: pointer;
        }

        /* Profile Picture Editor */
        .profile-pic-container {
            display: flex; align-items: center; gap: 2rem; margin-bottom: 2rem;
            padding-bottom: 2rem; border-bottom: 1px solid var(--pink-100);
        }
        .profile-pic-wrapper {
            position: relative; width: 120px; height: 120px; border-radius: 50%;
            border: 4px solid var(--pink-100); overflow: hidden; background: var(--pink-50);
            display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--pink-300);
        }
        .profile-pic-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        .pic-overlay {
            position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255, 77, 141, 0.8);
            color: white; font-size: 0.8rem; text-align: center; padding: 5px 0;
            cursor: pointer; transform: translateY(100%); transition: var(--transition-smooth); font-weight: 600;
        }
        .profile-pic-wrapper:hover .pic-overlay { transform: translateY(0); }
        .pic-instructions p { color: var(--dark-light); font-size: 0.9rem; margin-bottom: 10px; }

        /* Buttons */
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 0.8rem 1.8rem; border-radius: var(--radius-pill); font-weight: 600; font-size: 0.95rem;
            border: none; transition: var(--transition-smooth);
        }
        .btn-primary { background: var(--pink-500); color: var(--light); box-shadow: var(--shadow-sm); }
        .btn-primary:hover { background: var(--pink-700); transform: translateY(-2px); box-shadow: var(--shadow-md); }
        .btn-outline { background: transparent; color: var(--pink-500); border: 2px solid var(--pink-500); }
        .btn-outline:hover { background: var(--pink-50); transform: translateY(-2px); }

        /* Toast Notification */
        .toast {
            position: fixed; bottom: -100px; left: 50%; transform: translateX(-50%);
            background-color: var(--dark); color: var(--light); padding: 1rem 2rem;
            border-radius: var(--radius-pill); box-shadow: var(--shadow-md); z-index: 3000;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55); font-weight: 600;
            display: flex; align-items: center; gap: 10px;
        }
        .toast.success { background-color: #4CAF50; }
        .toast.show { bottom: 30px; }

        /* Table & Badges for Orders */
        .table-responsive { overflow-x: auto; }
        .order-table { width: 100%; border-collapse: collapse; margin-top: 0.5rem; }
        .order-table th, .order-table td { padding: 1rem; text-align: left; border-bottom: 1px solid var(--pink-50); }
        .order-table th { font-weight: 600; color: var(--dark-light); background: var(--pink-50); font-size: 0.9rem; white-space: nowrap;}
        .order-table td { font-size: 0.95rem; vertical-align: middle; }
        .order-table tbody tr:hover { background: #FDFDFD; }

        .badge { padding: 0.4rem 1rem; border-radius: var(--radius-pill); font-size: 0.8rem; font-weight: 700; display: inline-block; }
        .badge-proses { background: #FFF3CD; color: #856404; }
        .badge-perjalanan { background: #D1ECF1; color: #0C5460; }
        .badge-selesai { background: #D4EDDA; color: #155724; }

        @media (max-width: 992px) {
            .sidebar { left: -100%; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0; padding: 1.5rem; }
            .mobile-toggle { display: block; }
            .form-grid { grid-template-columns: 1fr; }
            .profile-pic-container { flex-direction: column; text-align: center; }
            
            /* Overlay untuk menutup sidebar di mobile */
            .overlay { display: none; position: fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:90; }
            .overlay.show { display: block; }
        }
    </style>
</head>
<body>

    <div class="dashboard-layout">
        <!-- Overlay Mobile -->
        <div class="overlay" id="sidebarOverlay"></div>

        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">🍩 Donat-in<span> azza</span></a>
            </div>
            
            <div class="user-snippet">
                <img src="{{ $user->profile_pic ? asset('storage/'.$user->profile_pic) : 'https://placehold.co/100x100/FFE3EE/FF4D8D?text='.substr($user->name, 0, 2) }}" alt="Profile" id="sidebarAvatar">
                <div class="user-snippet-info">
                    <h4 id="sidebarName">{{ $user->name }}</h4>
                    <p>Member Manis 🌟</p>
                </div>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active" data-target="profile-section">
                        <span>👤</span> Profil Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-target="security-section">
                        <span>🔒</span> Pengaturan Keamanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-target="orders-section">
                        <span>🛍️</span> Riwayat Pesanan
                    </a>
                </li>
            </ul>
            
            <div style="padding: 1.5rem; margin-top: auto; display: flex; flex-direction: column; gap: 10px;">
                <a href="{{ url('/') }}" class="btn btn-primary" style="width: 100%; text-align: center;">
                    <span>🏠</span> Pesan Donat (Beranda)
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline" style="width: 100%; border-color: var(--pink-300); color: var(--pink-500);">
                        <span>🚪</span> Keluar Akun
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content">
            <div class="topbar">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <button class="mobile-toggle" id="mobileToggle">☰</button>
                    <div class="page-title">
                        <h2 id="pageTitleText">Pengaturan Profil</h2>
                        <p>Atur informasi pribadimu di sini biar pesanan makin lancar.</p>
                    </div>
                </div>
                <!-- Mini avatar for topbar -->
                <div style="display: flex; align-items: center; gap: 10px; background: var(--light); padding: 5px 15px 5px 5px; border-radius: 50px; box-shadow: var(--shadow-sm); border: 1px solid var(--pink-50);">
                    <img src="{{ $user->profile_pic ? asset('storage/'.$user->profile_pic) : 'https://placehold.co/100x100/FFE3EE/FF4D8D?text='.substr($user->name, 0, 2) }}" alt="Avatar" id="topbarAvatar" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                    <span style="font-weight: 600; font-size: 0.9rem; color: var(--dark-light);">Hai, {{ explode(' ', trim($user->name))[0] }}!</span>
                </div>
            </div>

            <!-- SECTION 1: PROFIL -->
            <section id="profile-section" class="section-view active">
                <div class="card">
                    <form id="profileForm" action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Area Edit Foto Profil -->
                        <div class="profile-pic-container">
                            <div class="profile-pic-wrapper">
                                <img src="{{ $user->profile_pic ? asset('storage/'.$user->profile_pic) : 'https://placehold.co/200x200/FFE3EE/FF4D8D?text='.substr($user->name, 0, 2) }}" alt="Foto Profil" id="previewImage">
                                <label for="profileUpload" class="pic-overlay">
                                    📷 Ganti Foto
                                </label>
                                <input type="file" name="profile_pic" id="profileUpload" accept="image/png, image/jpeg" style="display: none;">
                            </div>
                            <div class="pic-instructions">
                                <h3 style="margin-bottom: 5px;">Foto Profil</h3>
                                <p>Disarankan pakai foto yang kece dengan ukuran maksimal 2MB. Format: JPG, PNG.</p>
                                <div style="display: flex; gap: 10px;">
                                    <button type="button" class="btn btn-outline" style="padding: 0.4rem 1rem; font-size: 0.85rem;" onclick="document.getElementById('profileUpload').click()">Pilih Gambar</button>
                                    <button type="button" class="btn" style="background: #F1F3F5; color: var(--dark-light); padding: 0.4rem 1rem; font-size: 0.85rem;" onclick="removeImage()">Hapus</button>
                                </div>
                            </div>
                        </div>

                        <!-- Form Data Diri -->
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" id="inputNama" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email Aktif</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            
                            <div class="form-group full-width">
                                <label>Bio Singkat <span style="font-weight: normal; color: #999;">(Tampil di review/testimoni)</span></label>
                                <input type="text" name="bio" id="inputBio" class="form-control" value="{{ $user->bio }}">
                            </div>

                            <div class="form-group full-width">
                                <label>Alamat Pengiriman Utama</label>
                                <textarea name="address" id="inputAlamat" class="form-control" placeholder="Tulis alamat lengkap lengkap dengan patokan...">{{ $user->address }}</textarea>
                            </div>
                        </div>

                        <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                            <button type="submit" class="btn btn-primary">💾 Simpan Perubahan Profil</button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- SECTION 2: KEAMANAN & PASSWORD -->
            <section id="security-section" class="section-view">
                <div class="card" style="max-width: 600px;">
                    <h3 style="margin-bottom: 0.5rem;">Ubah Password</h3>
                    <p style="color: var(--dark-light); font-size: 0.9rem; margin-bottom: 2rem;">Pastikan password barumu cukup kuat (kombinasi huruf dan angka).</p>
                    
                    @if($errors->any())
                        <div style="color: red; margin-bottom: 1rem; font-size: 0.9rem;">{{ $errors->first() }}</div>
                    @endif

                    <form id="passwordForm" action="{{ route('customer.password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Password Saat Ini</label>
                            <div class="input-icon-wrapper">
                                <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama" required>
                                <button type="button" class="password-toggle">👁️</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>
                            <div class="input-icon-wrapper">
                                <input type="password" name="password" id="newPwd" class="form-control" placeholder="Minimal 6 karakter" minlength="6" required>
                                <button type="button" class="password-toggle">👁️</button>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 2.5rem;">
                            <label>Konfirmasi Password Baru</label>
                            <div class="input-icon-wrapper">
                                <input type="password" name="password_confirmation" id="confirmPwd" class="form-control" placeholder="Ketik ulang password baru" minlength="6" required>
                                <button type="button" class="password-toggle">👁️</button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%;">🔒 Update Password</button>
                    </form>
                </div>
            </section>

            <!-- SECTION 3: RIWAYAT PESANAN -->
            <section id="orders-section" class="section-view">
                <div class="card">
                    <h3 style="margin-bottom: 0.5rem;">Riwayat Pesanan Saya</h3>
                    <p style="color: var(--dark-light); font-size: 0.9rem; margin-bottom: 1.5rem;">Pantau status pesanan donatmu di sini ya kak.</p>
                    
                    <div class="table-responsive">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>Tanggal</th>
                                    <th>Detail Pesanan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td style="color: var(--pink-500); font-weight: 600;">{{ $order->invoice_id }}</td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div style="font-weight: 600;">{{ $order->menu->name ?? 'Menu Dihapus' }}</div>
                                        <div style="font-size: 0.8rem; color: var(--dark-light);">{{ $order->quantity }} Box (Isi {{ $order->size }}) - {{ $order->service_type }}</div>
                                    </td>
                                    <td style="font-weight: 600;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($order->status == 'Proses')
                                            <span class="badge badge-proses">Diproses Dapur</span>
                                        @elseif($order->status == 'Perjalanan')
                                            <span class="badge badge-perjalanan">Dalam Perjalanan</span>
                                        @else
                                            <span class="badge badge-selesai">Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; padding: 2rem;">Belum ada pesanan nih kak. Yuk pesan sekarang!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Elemen Toast Notification -->
    <div id="toast" class="toast">
        <span id="toastIcon">✨</span> <span id="toastMsg">Tersimpan!</span>
    </div>

    <!-- Modal Konfirmasi Keluar Khusus -->
    <div id="logoutModal" style="display: none; position: fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center;">
        <div style="background: white; padding: 2rem; border-radius: 20px; max-width: 400px; text-align: center; animation: fadeIn 0.3s;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">🍩</div>
            <h3 style="color: var(--pink-500); margin-bottom: 10px;">Mau Keluar Sekarang?</h3>
            <p style="color: var(--dark-light); margin-bottom: 20px;">Nanti jangan lupa balik lagi pesen donatnya ya kak!</p>
            <div style="display: flex; gap: 10px;">
                <button class="btn btn-outline" style="flex: 1;" onclick="document.getElementById('logoutModal').style.display='none'">Batal</button>
                <button class="btn btn-primary" style="flex: 1;" onclick="window.location.href='#'">Keluar</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // --- Navigasi Tab ---
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('.section-view');
            const pageTitleText = document.getElementById('pageTitleText');
            
            const titles = {
                'profile-section': 'Pengaturan Profil',
                'security-section': 'Keamanan Akun',
                'orders-section': 'Riwayat Pesanan'
            };

            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const target = link.getAttribute('data-target');
                    if(!target) return; // Untuk menu yang hanya menampilkan toast (Riwayat Pesanan)
                    
                    e.preventDefault();
                    
                    // Reset active states
                    navLinks.forEach(l => l.classList.remove('active'));
                    sections.forEach(s => s.classList.remove('active'));
                    
                    // Set active
                    link.classList.add('active');
                    document.getElementById(target).classList.add('active');
                    pageTitleText.innerText = titles[target];
                    
                    // Tutup sidebar di mobile
                    if(window.innerWidth <= 992) toggleMobileMenu();
                });
            });

            // --- Mobile Sidebar Toggle ---
            const mobileToggle = document.getElementById('mobileToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            function toggleMobileMenu() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            }

            mobileToggle.addEventListener('click', toggleMobileMenu);
            overlay.addEventListener('click', toggleMobileMenu);

            // --- Fungsi Toast Notification ---
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toastMsg');
            const toastIcon = document.getElementById('toastIcon');
            let toastTimer;

            window.showToast = function(message, isSuccess = true) {
                clearTimeout(toastTimer);
                toastMsg.innerText = message;
                toastIcon.innerText = isSuccess ? '✅' : 'ℹ️';
                
                if(isSuccess) toast.classList.add('success');
                else toast.classList.remove('success');
                
                toast.classList.add('show');
                toastTimer = setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            };

            // Handle session flash messages
            @if(session('success_profile'))
                showToast("{{ session('success_profile') }}");
            @endif
            @if(session('success_password'))
                showToast("{{ session('success_password') }}");
            @endif

            // --- Logika Edit Foto Profil (Hanya Preview) ---
            const profileUpload = document.getElementById('profileUpload');
            const previewImage = document.getElementById('previewImage');
            const sidebarAvatar = document.getElementById('sidebarAvatar');
            const topbarAvatar = document.getElementById('topbarAvatar');
            const defaultAvatar = "https://placehold.co/200x200/FFE3EE/FF4D8D?text=DK";

            profileUpload.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validasi ukuran (contoh: max 2MB)
                    if(file.size > 2 * 1024 * 1024) {
                        showToast("Ukuran foto terlalu besar. Maks 2MB ya kak!", false);
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imgData = event.target.result;
                        previewImage.src = imgData;
                        sidebarAvatar.src = imgData;
                        topbarAvatar.src = imgData;
                        showToast("Foto profil berhasil diubah sementara (belum disimpan)");
                    }
                    reader.readAsDataURL(file);
                }
            });

            window.removeImage = function() {
                // Just clear preview if user wants to reset before saving
                previewImage.src = "{{ $user->profile_pic ? asset('storage/'.$user->profile_pic) : 'https://placehold.co/200x200/FFE3EE/FF4D8D?text='.substr($user->name, 0, 2) }}";
                profileUpload.value = '';
                showToast("Foto dikembalikan ke awal");
            };

            // Toggle Eye Password is kept
            document.querySelectorAll('.password-toggle').forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.innerText = '🙈';
                    } else {
                        input.type = 'password';
                        this.innerText = '👁️';
                    }
                });
            });

            // Forms are submitted traditionally now, so we removed the preventDefault block
        });
    </script>
</body>
</html>