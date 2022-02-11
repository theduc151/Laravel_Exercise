{{-- declare all file script use global --}}
<script src="/plugins/jquery.min.js"></script>
<script src="/plugins/popper.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

{{-- toastr --}}
<script src="/plugins/toastr/toastr.min.js"></script>

<!-- declare variable global -->
<script>
    const BASE_URL = "{{ url('/') }}";
</script>

{{-- declare other file script use private --}}
@stack('js')

