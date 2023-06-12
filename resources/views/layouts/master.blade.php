<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- font awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Script -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <title>@yield('title')</title>
</head>

<body>


    <body class="hold-transition sidebar-mini layout-fixed mx-2">
        <div class="wrapper">
            @if( Session::has('user'))
            <x-navbar></x-navbar>
            @endif

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Gnanimadam-63</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                @if( Session::has('user') && Session::get('user')['user_type']=='family head')
                @include('layouts.menu.family')

                @elseif(Session::has('user') && Session::get('user')['user_type']!='family head')
                @include('layouts.menu.staff')
             

                @else
                @include('layouts.menu.guest')

                @endif
                </div>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">
                @yield('content')
            </div>


            <!-- jQuery UI 1.11.4 -->
            <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- ChartJS -->
            <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
            <!-- Sparkline -->
            <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
            <!-- JQVMap -->
            <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
            <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
            <!-- jQuery Knob Chart -->
            <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
            <!-- daterangepicker -->
            <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
            <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <!-- Summernote -->
            <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
            <!-- overlayScrollbars -->
            <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('dist/js/adminlte.js') }}"></script>
            <script src="{{ asset('js/validation.js') }}"></script>
            <script>
                $.ajax({
                    url: "{{ route('message.getInboxMessages') }}",
                    success: function(result) {
                        var response = result; // Assuming the response is stored in the 'result' variable

                        // Loop through the response and append each item to the 'inbox_msg' element
                        $.each(response, function(index, item) {
                            var starIcon = item.read_status == "1" ? '<i class="fas fa-star"></i>' : '';
                            var html = '\
                                <div class="dropdown-divider"></div>\
                                <a href="#" class="dropdown-item">\
                                    <div class="media">\
                                        <img src="http://127.0.0.1:8000/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">\
                                        <div class="media-body">\
                                            <h3 class="dropdown-item-title">' + item.first_name + '\
                                                <span class="float-right text-sm text-danger">' + starIcon + '</span>\
                                            </h3>\
                                            <p class="text-sm">' + item.subject + '</p>\
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>' + item.time + ' ' +
                                item.date + '</p>\
                                        </div>\
                                    </div>\
                                </a>';

                            $('#inbox_msg').prepend(html);
                        });
                    }
                });

                var $isNew = $('#inbox_msg').find('i').length;
                if ($isNew) {
                    console.log('yes')
                }
            </script>

    </body>

</body>

</html>
