<!-- jQuery -->
<script src="vendors/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="vendors/datatables/jquery.dataTables.min.js"></script>
<script src="vendors/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="vendors/jszip/jszip.min.js"></script>
<script src="vendors/pdfmake/pdfmake.min.js"></script>
<script src="vendors/pdfmake/vfs_fonts.js"></script>
<script src="vendors/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="vendors/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vendors/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
</body>
</html>
