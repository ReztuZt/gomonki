<!-- Main content -->
<form id="invoiceForm" method="post" action="<?= base_url('invoice/tambah_aksi'); ?>">

    <section class="content ">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Peserta</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_magang">Id Magang</label>
                                <input type="text" class="form-control" name="id_magang" id="id_magang" value="<?= isset($peserta->id_magang) ? $peserta->id_magang : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="magang_nip">NIP</label>
                                <input type="text" class="form-control" name="magang_nip" id="magang_nip" value="<?= isset($peserta->magang_nip) ? $peserta->magang_nip : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="magang_nama">Nama</label>
                                <input type="text" class="form-control" name="magang_nama" id="magang_nama" value="<?= isset($peserta->magang_nama) ? $peserta->magang_nama : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="magang_alamat">Alamat</label>
                                <input type="text" class="form-control" name="magang_alamat" id="magang_alamat" value="<?= isset($peserta->magang_alamat) ? $peserta->magang_alamat : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="magang_telp">Telepon</label>
                                <input type="text" class="form-control" name="magang_telp" id="magang_telp" value="<?= isset($peserta->magang_telp) ? $peserta->magang_telp : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="magang_email">Email</label>
                                <input type="text" class="form-control" name="magang_email" id="magang_email" value="<?= isset($peserta->magang_email) ? $peserta->magang_email : '' ?>" readonly>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- </form> -->
                    </div>
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="program_nama">Nama</label>
                                <select class="form-control" id="program_nama" name="program_nama">
                                    <?php foreach ($programs as $program) : ?>
                                        <option value="<?php echo $program['program_nama']; ?>"><?php echo $program['program_nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="program_harga">Harga</label>
                                <input type="text" class="form-control" name="program_harga" id="program_harga">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Metode Pembayaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-university mr-1"></i> Bank</strong>
                            <p class="text-muted">BCA, Rek: 3920753638</p>
                            <hr>

                            <strong><i class="fas fa-user mr-1"></i> Atas Nama</strong>
                            <p class="text-muted">Yudhatama Fajar Nugroho</p>
                            <hr>

                            <strong><i class="far fa-sticky-note mr-1"></i> Notes</strong>
                            <p class="text-muted">Silakan lakukan pembayaran sesuai dengan instruksi di atas. Mohon konfirmasi setelah melakukan pembayaran. Terima kasih.</p>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary px-5 mb-5">Submit</button>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#program_nama').change(function() {
            var nama = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("invoice/fungsi_get_data_program"); ?>',
                data: {
                    program_nama: nama
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#program_harga').val(data.program_harga);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>