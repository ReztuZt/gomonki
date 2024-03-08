<div class="card">
    <div class="card-header">
        <button data-toggle="modal" data-target="#edit<?= $peserta->id_magang ?>" class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i> Edit Data</button>
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
    </div>

    <!-- Modal untuk mengedit data peserta magang -->
    <div class="modal fade" id="edit<?= $peserta->id_magang ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Peserta Magang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk mengedit data peserta magang -->
                    <form action="<?= base_url('peserta/update/' . $peserta->id_magang) ?>" method="post">
                        <div class="form-group">
                            <label for="magang_payment">Pembayaran:</label>
                            <input type="text" class="form-control" id="magang_payment" name="magang_payment" value="<?= $peserta->magang_payment ?>">
                        </div>
                        <div class="form-group">
                            <label for="magang_harga">Harga:</label>
                            <input type="text" class="form-control" id="magang_harga" name="magang_harga" value="<?= $peserta->magang_harga ?>">
                        </div>
                        <div class="form-group">
                            <label for="magang_deskripsi">Deskripsi:</label>
                            <select class="form-control" id="magang_deskripsi" name="magang_deskripsi">
                                <?php for ($i = 1; $i <= 12; $i++) : ?>
                                    <?php $bulan = date("F", mktime(0, 0, 0, $i, 1)); ?>
                                    <option value="Biaya Magang <?= $bulan . ' ' . date("Y") ?>" <?= $peserta->magang_deskripsi == "Biaya Magang $bulan " . date("Y") ? "selected" : "" ?>>Biaya Magang <?= $bulan . ' ' . date("Y") ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="magang_tgl">Tanggal:</label>
                            <input type="date" class="form-control" id="magang_tgl" name="magang_tgl" value="<?= $peserta->tgl_pembuatan ?>">
                        </div>
                        <!-- Tambahkan form untuk mengedit data lainnya sesuai kebutuhan -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>