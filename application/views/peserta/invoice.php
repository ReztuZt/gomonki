</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Silakan lakukan pembayaran sesuai dengan instruksi di bawah. Mohon konfirmasi setelah melakukan pembayaran. Terima kasih.
                    <div class="mt-3">
                        <?php if ($this->session->flashdata('pesan')) : ?>
                            <?= $this->session->flashdata('pesan') ?>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> MANIMONKI.
                                <!-- <a href="<?= base_url('peserta/tambah') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Peserta </a> -->
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Admin, Manimonki.</strong><br>
                                Jl. Satrio Wibowo Selatan No. 39A Purwosari<br>
                                Surakarta 57142<br>
                                Telepon: 0896-6274-4448<br>
                                Email: manimonki.solo@gmail.com
                            </address>
                        </div>
                        <!-- /.col -->

                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?php echo $peserta->magang_nama; ?></strong><br>
                                <?php echo $peserta->magang_alamat; ?></strong><br>
                                <?php echo $peserta->magang_telp; ?></strong><br>
                                <?php echo $peserta->magang_email; ?></strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice <?php echo $peserta->id_magang; ?></strong></b><br>
                            <br>
                            <b>Bank:</b> BCA<br>
                            <b>No. Rek:</b> 3920753638<br>
                            <b>Atas Nama:</b> Yudhatama Fajar Nugroho
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Cetak</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $no = 1;
                                foreach ($invoices as $ic) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ic->magang_nip; ?></td>
                                            <td><?= $ic->magang_nama; ?></td>
                                            <td><?= $ic->program_nama; ?></td>
                                            <td><?= $ic->program_harga; ?></td>
                                            <td>
                                                <div>
                                                    <button onclick="printAndDownloadPDF('<?= base_url('invoice/view_invoice/' . $id_magang) ?>')" class="btn btn-info btn-sm mb-1">
                                                        <i class="fas fa-print"></i> Print
                                                    </button>
                                                </div>
                                                <!-- <div>
                                                    <button>
                                                        <a href="<?= base_url('invoice/view_invoice/' . $id_magang) ?>" class="btn btn-info btn-sm mb-1 no-border">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
                                                    </button>
                                                </div> -->

                                            </td>
                                            <td>
                                                <a href="<?= base_url('invoice/edit_invoice/' . $ic->invoice_id) ?>" class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                                                <!-- Contoh tautan untuk menghapus data dengan mengirimkan id_magang sebagai parameter -->

                                                <a href="<?= base_url('invoice/delete/' . $ic->invoice_id . '?id_magang=' . $ic->id_magang) ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash-alt"></i></a>

                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach ?>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- this row will not appear when printing -->

                    <div class="row no-print">
                        <div class="col-12">
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                            <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Payment
                            </button> -->
                            <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button> -->

                            <a href="<?= base_url('invoice/tambah_invoice/' . $id_magang) ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Invoice</a>

                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    function printAndDownloadPDF(url) {
        // Membuka jendela baru untuk memuat URL PDF
        var newWindow = window.open(url, '_blank');
        // Menunggu jendela terbuka sebelum mencetak
        newWindow.onload = function() {
            // Mencetak dokumen
            newWindow.print();
            // Menutup jendela setelah pencetakan selesai
            setTimeout(function() {
                newWindow.close();
            }, 100);
        };
    }
</script>