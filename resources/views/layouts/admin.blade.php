<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.css"
        integrity="sha512-ZCCAQejiYJEz2I2a9uYA3OrEMr8ZN4BGTwlVYNxsYopLS/WH2bey53SObOKRF4ciHo5gqxgVP/muDloHvWZXHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/toastr/toastr.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        <div class="main-container">
            <div class="dasboard-container mt-4">
                @include('layouts.admin_partial.sidebar')
                @yield('admin_content')
            </div>
        </div>
        <!-- jQuery -->
        <script src="https://kit.fontawesome.com/f698781556.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('backend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="{{ asset('backend') }}/plugins/raphael/raphael.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="{{ asset('backend/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>

        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{asset('backend/dist/js/demo.js')}}"></script> --}}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('backend/dist/js/pages/dashboard2.js') }}"></script>
        <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('backend') }}/dist/js/adminlte.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{ asset('backend') }}/dist/js/demo.js"></script> --}}
        <!-- Page specific script -->

        <script type="text/javascript">
            $(document).on('click', '.button', function(e) {
                event.preventDefault();
                var link = $(this).attr("href");
                swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this data!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal('Your data is safe!');
                    }
                })
            });
        </script>
        <script>
            @if (Session::has('messege'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('messege') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('messege') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('messege') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('messege') }}");
                        break;
                }
            @endif
        </script>

        <script>
            $(function() {
                // Summernote
                $('.textarea').summernote()

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            })
        </script>
    </body>

    </html>
