</div>
<!-- /.content-wrapper -->
</div>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2023-2024 <a href="https://manimonki.studio">Gomonki</a>.</strong> R2
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Konten control sidebar di sini -->
</aside>
<!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables & Plugins -->
<script src="<?= base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<!-- <script>
    var daftarProgram = []; // Deklarasikan di luar fungsi $(document).ready()
    var totalHarga = 0; // Deklarasikan di luar fungsi $(document).ready()

    $(document).ready(function() {
        $('#tambah').click(function() {
            var programId = $('#program').val();
            var programNama = $('#program option:selected').text().split(' - ')[0];
            var jumlah = $('#jumlah').val();
            var harga = parseFloat($('#program option:selected').text().split(' - ')[1].replace('Rp', '').replace('.', '').replace(',', ''));

            // Validasi jumlah
            if (!isNaN(jumlah) && jumlah !== "" && parseInt(jumlah) > 0) {
                var total = jumlah * harga;

                // Tambahkan program ke daftarProgram
                daftarProgram.push({
                    id: programId,
                    nama: programNama,
                    jumlah: jumlah,
                    harga: harga,
                    total: total
                });

                // Perbarui daftar program yang telah dipilih
                updateDaftarProgram();

                // Perbarui total harga
                updateTotalHarga();
            } else {
                alert('Jumlah harus berupa angka dan tidak boleh 0 atau negatif.');
            }
        });
    });


    function updateDaftarProgram() {
        var listProgram = '';
        daftarProgram.forEach(function(program) {
            listProgram += '<li>' + program.nama + ' - Jumlah: ' + program.jumlah + '</li>';
        });
        $('#daftar-program').html(listProgram);
    }

    function updateTotalHarga() {
        totalHarga = 0;
        daftarProgram.forEach(function(program) {
            totalHarga += program.total;
        });
        $('#total-harga').text(formatRupiah(totalHarga));
    }

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return 'Rp' + ribuan;
    }
</script>

<script>
    // Fungsi untuk memperbarui nilai input form dengan program, jumlah, dan total
    function updateFormValues(program, jumlah, total) {
        $('input[name="invoice_desk"]').val(program); // Set nama program ke invoice_desk
        $('input[name="invoice_jumlah"]').val(jumlah);
        $('input[name="invoice_total"]').val(total);
    }

    $(document).ready(function() {
        $('#tambah').click(function() {
            var programNama = $('#program option:selected').text().split(' - ')[0];
            var jumlah = $('#jumlah').val();
            var harga = parseFloat($('#program option:selected').text().split(' - ')[1].replace('Rp', '').replace('.', '').replace(',', ''));

            // Hitung total
            var total = jumlah * harga;

            // Perbarui nilai form
            updateFormValues(programNama, jumlah, total);
        });
    });
</script> -->