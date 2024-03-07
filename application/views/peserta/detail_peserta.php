<div class="card">
    <div class="card-header">
        <a href="<?= base_url('peserta/ubahInvoice') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add Payment </a>
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
        </div>
    </div>
    <div class="card-footer">
        <a href="<?= base_url('peserta/invoice/' . $peserta->id_magang) ?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Invoice</a>
    </div>
</div>
</div>