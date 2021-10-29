</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Semesta 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('sys/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/dashboard/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/dashboard/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/dashboard/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/dashboard/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/dashboard/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/dashboard/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/chart/chart-bar-grade-subjects.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/chart/chart-bar-grade-class.js"></script>

<!-- jsCSV -->
<script src="<?= base_url('assets/dashboard/') ?>js/jscsv.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/jscsv-export-table.js"></script>

<!-- jsPDF Plugin -->
<script src="<?= base_url('assets/dashboard/') ?>js/jspdf.umd.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/jspdf.plugin.autotable.js"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    function genPDF() {
        var doc = new jspdf.jsPDF();

        doc.autoTable({
            html: '#dataTable'
        })

        doc.save('table.pdf');
    }
</script>

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('manage/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('manage/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

<!-- Upload Photos JS -->
<script>
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("Selected").html(fileName);
    });
</script>

</body>

</html>