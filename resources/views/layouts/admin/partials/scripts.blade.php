<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{ asset('admin/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins.js') }}"></script>
<script src="{{ asset('admin/js/app.js') }}"></script>

<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key="></script> -->
<script src="{{ asset('admin/js/helpers/gmaps.min.js') }}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{ asset('admin/js/pages/index.js') }}"></script>
<script src="{{ asset('admin/js/helpers/ckeditor/ckeditor.js') }}"></script>

<!-- iCheck -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script> --}}

@yield('js')
@yield('js2')