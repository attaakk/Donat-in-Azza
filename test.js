
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
    
