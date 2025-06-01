// document.addEventListener("DOMContentLoaded", function () {
//     const menuItems = document.querySelectorAll(".menu-item");
//     const modal = document.querySelector(".modal");
//     const modalTitle = document.getElementById("modal-title");
//     const modalBody = document.getElementById("modal-body");
//     const closeBtn = document.querySelector(".close-modal"); // Ambil tombol close di awal

//     // Optional: navbar toggle dan menu (cek kalau ada)
//     const navbarToggle = document.querySelector(".navbar-toggle");
//     const navbarMenu = document.querySelector(".navbar-menu");

//     // Event tombol close modal
//     closeBtn.addEventListener("click", closeModal);

//     // Klik di luar modal = tutup modal
//     window.addEventListener("click", function (e) {
//         if (e.target === modal) {
//             closeModal();
//         }
//     });

//     // Tekan tombol Escape = tutup modal
//     document.addEventListener("keydown", function (e) {
//         if (e.key === "Escape" && modal.style.display === "flex") {
//             closeModal();
//         }
//     });

//     menuItems.forEach((item) => {
//         item.addEventListener("click", function (e) {
//             e.preventDefault();

//             // Tutup navbar mobile (jika ada)
//             if (navbarMenu) navbarMenu.classList.remove("active");
//             if (navbarToggle) navbarToggle.classList.remove("active");

//             const text = this.textContent.trim();

//             // Jika klik "Beranda", scroll ke atas lalu return
//             if (text === "Beranda") {
//                 window.scrollTo({ top: 0, behavior: "smooth" });
//                 return;
//             }

//             let titleContent = "";
//             let bodyContent = "";

//             if (text === "Tentang Kami") {
//                 titleContent = `<h2>Tentang Jamu Kita</h2>`;
//                 bodyContent = `
//                     <p class="modal-description">
//                         Jamu Kita adalah platform digital yang menghubungkan tradisi jamu Indonesia dengan teknologi modern. 
//                         Kami berkomitmen untuk melestarikan warisan nenek moyang sambil memberdayakan UMKM lokal.
//                     </p>
//                     <div class="feature-grid">
//                         <div class="feature-card">
//                             <span class="feature-icon">🌿</span>
//                             <div class="feature-title">100% Natural</div>
//                             <div class="feature-text">Bahan herbal pilihan berkualitas tinggi</div>
//                         </div>
//                         <div class="feature-card">
//                             <span class="feature-icon">🏪</span>
//                             <div class="feature-title">Dukung UMKM</div>
//                             <div class="feature-text">Memberdayakan pengrajin jamu lokal</div>
//                         </div>
//                         <div class="feature-card">
//                             <span class="feature-icon">📱</span>
//                             <div class="feature-title">Digital Platform</div>
//                             <div class="feature-text">Kemudahan pesan online</div>
//                         </div>
//                         <div class="feature-card">
//                             <span class="feature-icon">✨</span>
//                             <div class="feature-title">Inovasi Modern</div>
//                             <div class="feature-text">Resep tradisional dengan sentuhan modern</div>
//                         </div>
//                     </div>
//                 `;
//             } else if (text === "Cara Order") {
//                 titleContent = `<h2>Cara Memesan</h2>`;
//                 bodyContent = `
//                     <p class="modal-description">
//                         Proses pemesanan yang mudah dan aman untuk mendapatkan jamu berkualitas langsung ke rumah Anda.
//                     </p>
//                     <div class="order-steps">
//                         <div class="order-step">
//                             <div class="step-title">Pilih Produk</div>
//                             <div class="step-description">Browse koleksi jamu tradisional dan modern kami, baca deskripsi dan manfaat setiap produk</div>
//                         </div>
//                         <div class="order-step">
//                             <div class="step-title">Tambah ke Keranjang</div>
//                             <div class="step-description">Pilih jumlah yang diinginkan dan tambahkan produk favorit Anda ke keranjang belanja</div>
//                         </div>
//                         <div class="order-step">
//                             <div class="step-title">Checkout & Bayar</div>
//                             <div class="step-description">Isi data pengiriman, pilih metode pembayaran (Transfer Bank, E-wallet, COD)</div>
//                         </div>
//                         <div class="order-step">
//                             <div class="step-title">Konfirmasi</div>
//                             <div class="step-description">Terima konfirmasi pesanan via WhatsApp/Email dan tracking pengiriman</div>
//                         </div>
//                         <div class="order-step">
//                             <div class="step-title">Terima Pesanan</div>
//                             <div class="step-description">Produk jamu segar siap dinikmati! Paket dikemas aman dan higienis</div>
//                         </div>
//                     </div>
//                 `;
//             } else if (text === "Kontak Kami") {
//                 titleContent = `<h2>Hubungi Kami</h2>`;
//                 bodyContent = `
//                     <p class="modal-description">
//                         Tim customer service kami siap membantu Anda 24/7. Jangan ragu untuk menghubungi kami!
//                     </p>
//                     <div class="contact-info">
//                         <div class="contact-item">
//                             <span class="contact-icon">📱</span>
//                             <div>
//                                 <div style="font-weight: 600; color: #f2e1c7;">WhatsApp</div>
//                                 <div style="color: rgba(242, 225, 199, 0.8);">+62 812-3456-7890</div>
//                             </div>
//                         </div>
//                         <div class="contact-item">
//                             <span class="contact-icon">📧</span>
//                             <div>
//                                 <div style="font-weight: 600; color: #f2e1c7;">Email</div>
//                                 <div style="color: rgba(242, 225, 199, 0.8);">info@jamukita.co.id</div>
//                             </div>
//                         </div>
//                         <div class="contact-item">
//                             <span class="contact-icon">📍</span>
//                             <div>
//                                 <div style="font-weight: 600; color: #f2e1c7;">Alamat</div>
//                                 <div style="color: rgba(242, 225, 199, 0.8);">Jl. Jamu Tradisional No. 123, Bekasi, Jawa Barat</div>
//                             </div>
//                         </div>
//                         <div class="contact-item">
//                             <span class="contact-icon">🕒</span>
//                             <div>
//                                 <div style="font-weight: 600; color: #f2e1c7;">Jam Operasional</div>
//                                 <div style="color: rgba(242, 225, 199, 0.8);">Senin - Minggu: 08:00 - 22:00 WIB</div>
//                             </div>
//                         </div>
//                     </div>
//                 `;
//             }

//             modalTitle.innerHTML = titleContent;
//             modalBody.innerHTML = bodyContent;

//             modal.style.display = "flex";
//             setTimeout(() => modal.classList.add("show"), 10);
//         });
//     });

//     function closeModal() {
//         modal.classList.remove("show");
//         setTimeout(() => {
//             modal.style.display = "none";
//         }, 300);
//     }
// });
