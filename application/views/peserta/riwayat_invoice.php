<div class="card">
    <div class="card-header">
        <h5>Riwayat Invoice - <?= $peserta->magang_nama ?></h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($riwayat_invoice)) {
                    foreach ($riwayat_invoice as $index => $invoice) { ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $invoice->bulan ?></td>
                            <td><?= $invoice->status ?></td>
                        </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="3">Tidak ada riwayat invoice</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
