<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <base href="{{asset("")}}"/>
    <title>HR | @yield('title')</title>
@yield('css')
<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}"/>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset("plugins/toastr/toastr.min.css")}}">
    <style>
        .hide-loading {
            display: none !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="position-absolute w-100 h-100 d-flex align-items-center loading hide-loading"
     style="z-index: 9999;top: 0;background: #5e67697a">
    <div class="text-center w-100">
        <img src="{{asset("loading.gif")}}" alt="">
    </div>
</div>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-slide="true" href="#" role="button" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i></a>
            </li>
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">@csrf</form>

            {{-- <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                  class="fas fa-th-large"></i></a>
            </li> --}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar m-0">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">EXAMPLES</li>
                    <li class="nav-item">
                        <a href="/home" class="nav-link @if($selected=='home') active @endif">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Tổng quan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/cv" class="nav-link @if($selected=='cv') active @endif">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Danh sách ứng viên

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/overview" class="nav-link @if($selected=='cvdrop') active @endif">
                            <i class="nav-icon fab fa-stack-overflow"></i>
                            <p>
                                Trạng thái ứng viên
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/timeinterview" class="nav-link @if($selected=='timeinterview') active @endif">
                            <i class="nav-icon fas fa-user-clock"></i>
                            <p>
                                Lịch phỏng vấn
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/job" class="nav-link @if($selected=='job') active @endif">
                            <i class="nav-icon fas fa-asterisk"></i>
                            <p>
                                Job
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/tag" class="nav-link @if($selected=='tag') active @endif">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Tags
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Talen pool</li>
                    @foreach(\App\Job::where('talenpools_id',0)->get() as $item)
                        <li class="nav-item">
                            <a href="{{url("overview")}}/{{$item->name}}"
                               class="nav-link @if($selected == $item->name) active @endif">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{$item->name}}</p>
                                <span class="badge badge-info right">{{count($item->getjob)}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>

        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    {{-- <footer class="main-footer"> --}}
    {{-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io"></a>.</strong> --}}

    {{-- <div class="float-right d-none d-sm-inline-block"> --}}
    {{-- <b>Version</b> 3.0.4 --}}
    {{-- </div> --}}
    {{-- </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap -->
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("dist/js/adminlte.js")}}"></script>
<!-- Toastr -->
<script src="{{asset("plugins/toastr/toastr.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showload() {
        $('.loading').removeClass("hide-loading");
    }

    function hideload() {
        $('.loading').addClass("hide-loading");
    }
</script>
@yield('js')
<!-- REQUIRED SCRIPTS -->

</body>
</html>
