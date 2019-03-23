<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Jquery Core Js -->
{{--
<script src="{{ asset('master/plugins/jquery/jquery.min.js') }}"></script> --}}

<!-- Bootstrap Core Js -->
<script src="{{ asset('master/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('master/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('master/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('master/plugins/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('master/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('master/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('master/plugins/morrisjs/morris.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('master/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('master/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('master/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('master/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('master/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('master/plugins/flot-charts/jquery.flot.time.js') }}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('master/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('master/js/admin.js') }}"></script>
<script src="{{ asset('master/js/pages/index.js') }}"></script>

<script src="{{ asset('master/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('master/js/pages/forms/editors.js') }}"></script>

<!-- Toastr Js -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

</script>

<!-- Demo Js -->
<script src="{{ asset('master/js/demo.js') }}"></script>