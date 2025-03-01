<!-- Required vendors -->
<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>

<script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
{{-- <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script> --}}

<script src="{{ asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/js/sweetalert2.min.js')}}"></script>

<script>
    // Toastr Configuration
    toastr.options = {
        timeOut: 5000,
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: true,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: false
    };

    // Toastr Functions
    function showToastr(type, message, title = "") {
        switch (type) {
            case "success":
                toastr.success(message, title);
                break;
            case "error":
                toastr.error(message, title);
                break;
            case "warning":
                toastr.warning(message, title);
                break;
            case "info":
                toastr.info(message, title);
                break;
            default:
                toastr.info(message, title);
        }
    }

    // SweetAlert Functions
    function showSweetAlert(type, message, title = "") {
        switch (type) {
            case "success":
                Swal.fire({
                    icon: "success",
                    title: title,
                    text: message,
                    timer: 3000,
                    showConfirmButton: false
                });
                break;
            case "error":
                Swal.fire({
                    icon: "error",
                    title: title,
                    text: message,
                    showConfirmButton: true
                });
                break;
            case "warning":
                Swal.fire({
                    icon: "warning",
                    title: title,
                    text: message,
                    showConfirmButton: true
                });
                break;
            case "info":
                Swal.fire({
                    icon: "info",
                    title: title,
                    text: message,
                    timer: 3000,
                    showConfirmButton: false
                });
                break;
            default:
                Swal.fire({
                    icon: "info",
                    title: title,
                    text: message,
                    timer: 3000,
                    showConfirmButton: false
                });
        }
    }

    // Centralized Notification Handler
    function showNotification(type, messages, title = "") {
        if (Array.isArray(messages)) {
            if (type === "error") {
                showSweetAlert(type, messages.join("\n"), title);
            } else {
                messages.forEach(message => showToastr(type, message, title));
            }
        } else {
            if (type === "error") {
                showSweetAlert(type, messages, title);
            } else {
                showToastr(type, messages, title);
            }
        }
    }
</script>

@if(session('success'))
    <script>
        showNotification("success", "{{ session('success') }}", "Success");
    </script>
@endif

@if(session('errors'))
    <script>
        showNotification("error", [
            @foreach($errors->all() as $error)
                "{{ $error }}",
            @endforeach
        ], "Validation Errors");
    </script>
@endif

@stack('script')
