<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembelian Komponen Elektronika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5 mb-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card border-0 mx-auto" style="max-width: 600px;">
            <div class="card-header text-white text-center">
                <h4 class="mb-0 fw-bold">Pembelian Komponen Elektronika</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" required>
                        <label for="nama"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="whatsapp" placeholder="No WhatsApp" name="whatsapp" required>
                        <label for="whatsapp"><i class="fab fa-whatsapp me-2"></i>No WhatsApp</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap" name="alamat" style="height: 100px" required></textarea>
                        <label for="alamat"><i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap</label>
                    </div>

                    <div class="accordion" id="komponenAccordion">
                        <!-- Jenis 1 -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJenis1" aria-expanded="true" aria-controls="collapseJenis1">
                                    <i class="fas fa-microchip me-2"></i> Jenis 1
                                </button>
                            </h2>
                            <div id="collapseJenis1" class="accordion-collapse collapse show" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="komponen-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-medium">Komponen A</span>
                                            <div class="small text-muted">Rp. 0</div>
                                        </div>
                                        <div class="input-group qty-input">
                                            <button class="btn" type="button" onclick="decreaseValue('komponen_a_jenis1')"><i class="fas fa-minus"></i></button>
                                            <input type="text" class="form-control text-center" name="komponen_a_jenis1" id="komponen_a_jenis1" value="0" oninput="validateInput('komponen_a_jenis1')" onblur="validateInput('komponen_a_jenis1')">
                                            <button class="btn" type="button" onclick="increaseValue('komponen_a_jenis1')"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <div class="komponen-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-medium">Komponen B</span>
                                            <div class="small text-muted">Rp. 0</div>
                                        </div>
                                        <div class="input-group qty-input">
                                            <button class="btn" type="button" onclick="decreaseValue('komponen_b_jenis1')"><i class="fas fa-minus"></i></button>
                                            <input type="text" class="form-control text-center" name="komponen_b_jenis1" id="komponen_b_jenis1" value="0" oninput="validateInput('komponen_b_jenis1')" onblur="validateInput('komponen_b_jenis1')">
                                            <button class="btn" type="button" onclick="increaseValue('komponen_b_jenis1')"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jenis 2 -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJenis2" aria-expanded="false" aria-controls="collapseJenis2">
                                    <i class="fas fa-memory me-2"></i> Jenis 2
                                </button>
                            </h2>
                            <div id="collapseJenis2" class="accordion-collapse collapse" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="komponen-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-medium">Komponen A</span>
                                            <div class="small text-muted">Rp. 0</div>
                                        </div>
                                        <div class="input-group qty-input">
                                            <button class="btn" type="button" onclick="decreaseValue('komponen_a_jenis2')"><i class="fas fa-minus"></i></button>
                                            <input type="text" class="form-control text-center" name="komponen_a_jenis2" id="komponen_a_jenis2" value="0" oninput="validateInput('komponen_a_jenis2')" onblur="validateInput('komponen_a_jenis2')">
                                            <button class="btn" type="button" onclick="increaseValue('komponen_a_jenis2')"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <div class="komponen-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-medium">Komponen B</span>
                                            <div class="small text-muted">Rp. 0</div>
                                        </div>
                                        <div class="input-group qty-input">
                                            <button class="btn" type="button" onclick="decreaseValue('komponen_b_jenis2')"><i class="fas fa-minus"></i></button>
                                            <input type="text" class="form-control text-center" name="komponen_b_jenis2" id="komponen_b_jenis2" value="0" oninput="validateInput('komponen_b_jenis2')" onblur="validateInput('komponen_b_jenis2')">
                                            <button class="btn" type="button" onclick="increaseValue('komponen_b_jenis2')"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert-total text-center fw-bold mt-4 mb-4">
                        <i class="fas fa-shopping-cart me-2"></i> Total Harga: Rp. 0
                    </div>

                    <button type="button" class="btn btn-warning w-100 mb-3 py-2" data-bs-toggle="modal" data-bs-target="#qrisModal">
                        <i class="fas fa-qrcode me-2"></i> QRIS
                    </button>
                    <!-- Modal Konfirmasi Sebelum Kirim -->
                    <div class="modal fade" id="confirmSubmitModal" tabindex="-1" aria-labelledby="confirmSubmitModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title" id="confirmSubmitModalLabel"><i class="fas fa-question-circle me-2"></i>Konfirmasi Pesanan</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p class="mb-0">Apakah Anda yakin ingin menyelesaikan pesanan ini?</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-success" id="confirmSubmitBtn">Ya, Lanjutkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- QRIS Modal -->
                    <div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="qrisModalLabel"><i class="fas fa-qrcode me-2"></i>Scan QRIS</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-4">
                                    <img src="{{ asset('images/qris.png') }}" alt="QRIS Code" class="img-fluid mx-auto d-block mb-3" style="width: 70%;">
                                    <p class="mb-0 text-muted">Scan kode QR menggunakan aplikasi e-wallet Anda</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label class="btn upload-btn w-100 position-relative">
                        <i class="fas fa-upload me-2"></i> Upload Bukti Bayar
                        <input type="file" name="bukti_bayar" class="d-none">
                        <span class="file-name d-block mt-2 small text-muted">Belum ada file dipilih</span>
                    </label>

                    <div class="mt-4 mb-3">
                        <p class="mb-2 fw-medium">Metode Pengiriman:</p>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check shipping-option ps-0">
                                <input class="form-check-input" type="radio" name="pengiriman" value="diantar" id="diantar">
                                <label class="form-check-label d-flex align-items-center p-2" for="diantar">
                                    <i class="fas fa-truck me-2 text-primary"></i> Pesanan Diantar
                                </label>
                            </div>
                            <div class="form-check shipping-option ps-0">
                                <input class="form-check-input" type="radio" name="pengiriman" value="ambil" id="ambil">
                                <label class="form-check-label d-flex align-items-center p-2" for="ambil">
                                    <i class="fas fa-store me-2 text-primary"></i> Ambil di Toko
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success submit-btn w-100 mt-3">
                        <i class="fas fa-paper-plane me-2"></i> KIRIM PESANAN
                    </button>
                    <!-- Modal Konfirmasi Pesanan -->
                    <div class="modal fade" id="pesananModal" tabindex="-1" aria-labelledby="pesananModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title" id="pesananModalLabel"><i class="fas fa-exclamation-circle me-2"></i> Konfirmasi Pesanan</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body text-start p-4">
                                    <p class="mb-3">Terimakasih telah melakukan pemesanan, Harap konfirmasi pesanan anda ke WhatsApp Admin agar dapat diproses.</p>
                                    <p><strong>Format Konfirmasi:</strong></p>
                                    <p>Nama: (Nama Anda)<br>Alamat: (Alamat Anda)<br>Pengambilan: Diantar/Ambil di Toko</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" id="backToOrderBtn" class="btn btn-secondary">
                                        <i class="fas fa-rotate-left me-2"></i> Kembali Memesan
                                    </button>
                                    <a id="whatsappLink" href="#" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp me-2"></i>Konfirmasi Pesanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function increaseValue(id) {
        let input = document.getElementById(id);
        let value = parseInt(input.value) || 0;
        input.value = value + 1;
    }

    function decreaseValue(id) {
        let input = document.getElementById(id);
        let value = parseInt(input.value) || 0;
        if (value > 0) {
            input.value = value - 1;
        }
    }

    function validateInput(id) {
        let input = document.getElementById(id);
        let value = input.value;

        value = value.replace(/[^0-9]/g, '');

        let number = parseInt(value);

        if (isNaN(number) || number < 0) {
            input.value = 0;
        } else {
            input.value = number;
        }
    }

    document.querySelector('input[type="file"]').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
        e.target.parentElement.querySelector('.file-name').textContent = fileName;
    });

    document.addEventListener('DOMContentLoaded', function () {
    let tempData = {}; // Data disimpan sementara

    // Saat tombol "KIRIM PESANAN" diklik
    document.querySelector('.submit-btn').addEventListener('click', function (event) {
        event.preventDefault();

        let nama = document.getElementById('nama').value;
        let alamat = document.getElementById('alamat').value;
        let pengiriman = document.querySelector('input[name="pengiriman"]:checked')?.value || "Belum Dipilih";

        if (!nama || !alamat || pengiriman === "Belum Dipilih") {
            alert("Harap lengkapi semua data sebelum mengirim!");
            return;
        }

        // Simpan data untuk nanti
        tempData = { nama, alamat, pengiriman };

        // Tampilkan modal konfirmasi custom
        let confirmModal = new bootstrap.Modal(document.getElementById('confirmSubmitModal'));
        confirmModal.show();
    });

    // Ketika user klik "Ya, Lanjutkan" di modal konfirmasi
    document.getElementById('confirmSubmitBtn').addEventListener('click', function () {
        let { nama, alamat, pengiriman } = tempData;

        let message = `Halo Admin, saya ingin konfirmasi pesanan.\n\nNama: ${nama}\nAlamat: ${alamat}\nPengambilan: ${pengiriman}`;
        let whatsappURL = `https://wa.me/6281293768288?text=${encodeURIComponent(message)}`;

        document.getElementById('whatsappLink').href = whatsappURL;

        // Tutup modal konfirmasi
        bootstrap.Modal.getInstance(document.getElementById('confirmSubmitModal')).hide();

        // Tampilkan modal konfirmasi WhatsApp
        let pesananModal = new bootstrap.Modal(document.getElementById('pesananModal'));
        pesananModal.show();
    });

    document.querySelector('#pesananModal .btn-close').addEventListener('click', function () {
    setTimeout(() => {
        location.reload();
    }, 300); // kasih jeda sedikit agar animasi modal selesai
});

    document.getElementById('backToOrderBtn').addEventListener('click', function () {
    location.reload(); // Reload halaman
});

    // Saat klik WhatsApp
    document.getElementById('whatsappLink').addEventListener('click', function () {
        bootstrap.Modal.getInstance(document.getElementById('pesananModal')).hide();
    });
});

    </script>
</body>
</html>