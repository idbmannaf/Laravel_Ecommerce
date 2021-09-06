<!-- Javascripts -->
<script src="{{ asset('assets/admin') }}/plugins/jquery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ asset('assets/admin') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ asset('assets/admin') }}/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/DataTables/datatables.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/main.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/pages/dashboard.js"></script>
<script src="{{ asset('assets/admin') }}/js/pages/datatables.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/toastr-master/build/toastr.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/lightbox/lightbox.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/lazyload/jquery.lazy.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>

<script>
    $(document).ready(function (){
        $('table').DataTable({
            "order": [[ 2, "asc" ]]
        });
        // $('table').dataTable({
        //     "order": [[ 2, "asc" ]],
        //     "paging": false,
        //     "searching": false,
        //     "fnDrawCallback": function(oSettings) {
        //         if ($('table tr').length < 11) {
        //             $('.dataTables_paginate').hide();
        //             $('.dataTables_length').hide();
        //             $('.dataTables_filter').hide();
        //         }
        //     }
        // });
        // For Toaster Notification Plugin
        <?php if (session('fail')): ?>
            toastr["error"]("<?php echo session('fail') ?>!");
        <?php endif; ?>
            <?php if (session('success')): ?>
            toastr["success"]("<?php echo session('success')?>!");
        <?php endif; ?>
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
</script>
@yield('script')
</body>
</html>
