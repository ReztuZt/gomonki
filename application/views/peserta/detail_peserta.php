<div class="card">
    <div class="card-header">
        <button data-toggle="modal" data-target="#detail<?= $peserta->id_magang ?>" class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i> Edit Data</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="text-center mb-4">
            <h5>Informasi Pembayaran Peserta Magang</h5>
        </div>
        <div>
            <p><strong>Nama:</strong> <?= $peserta->magang_nama ?></p>
            <p><strong>Alamat:</strong> <?= $peserta->magang_alamat ?></p>
            <p><strong>No Telepon:</strong> <?= $peserta->magang_telp ?></p>
            <p><strong>Email:</strong> <?= $peserta->magang_email ?></p>
            <p><strong>Pembayaran:</strong> <?= $peserta->magang_payment ?></p>
            <p><strong>Harga:</strong> <?= $peserta->magang_harga ?></p>
            <p><strong>Deskripsi:</strong> <?= $peserta->magang_deskripsi ?></p>
        </div>
    </div>
    <!-- Form untuk memilih bulan -->
    <div class="card-footer">
        <form action="<?= base_url('peserta/invoice/' . $peserta->id_magang) ?>" method="post">
            <div class="form-group">
                <label for="bulan">Pilih Bulan:</label>
                <select name="bulan" id="bulan" class="form-control">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <!-- Tambahkan opsi untuk bulan lainnya di sini -->
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Invoice</button>
        </form>
        <a href="<?= base_url('peserta/riwayat_invoice/' . $peserta->id_magang) ?>" class="btn btn-info btn-sm"><i class="fas fa-history"></i> Riwayat Invoice</a>
    </div>
</div>

<!-- Modal untuk mengedit data peserta magang -->
<div class="modal fade" id="detail<?= $peserta->id_magang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); border: none; border-radius: 10px;">
            <div class="modal-header" style="background-color: #007bff; color: #fff; border-radius: 10px 10px 0 0;">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fas fa-detail me-2"></i> Edit Data Peserta
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="<?= base_url('peserta/update2/' . $peserta->id_magang) ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPayment">Status Pembayaran</label>
                                <input type="text" id="inputPayment" name="inputPayment" class="form-control" value="<?= $peserta->magang_payment ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputTenggat">Tenggat Pembayaran</label>
                                <input type="date" id="inputTenggat" name="inputTenggat" class="form-control" value="<?= $peserta->tenggat_pembayaran ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputHarga">Harga</label>
                                <input type="text" id="inputHarga" name="inputHarga" class="form-control" value="<?= $peserta->magang_harga ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputDeskripsi">Deskripsi</label>
                                <textarea id="inputDeskripsi" name="inputDeskripsi" class="form-control"><?= $peserta->magang_deskripsi ?></textarea>
                            </div>
                            <!-- Tambahkan input untuk data lainnya sesuai kebutuhan -->
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="resetForm">Reset</button>
                <button type="submit" form="editForm" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>