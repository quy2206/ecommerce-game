<!-- jQuery -->
<script src="/adminSide/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/adminSide/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="/adminSide/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/adminSide/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/adminSide/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/adminSide/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminSide/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/adminSide/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/adminSide/plugins/moment/moment.min.js"></script>
<script src="/adminSide/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminSide/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- overlayScrollbars -->
<script src="/adminSide/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminSide/dist/js/adminlte.js"></script>
<script src="/adminSide/dist/js/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminSide/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="/adminSide/dist/js/pages/dashboard.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });


    });
    //Date and time picker
    $('#beginDate').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });
    $('#endDate').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });

</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
@yield('javascript')
@stack('js')
