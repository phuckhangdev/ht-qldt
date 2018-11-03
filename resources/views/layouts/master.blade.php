
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Quản Lý Đoàn Thể</title>

  <link rel="stylesheet" href="/css/app.css">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @role('admin')
          <h4 style='color: red'>TRANG QUẢN TRỊ CỦA ADMIN</h4>
      @endrole
      @role('manager')
          <h4 style='color: red'>TRANG QUẢN TRỊ CỦA QUẢN LÝ</h4>
      @endrole
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="./img/logo.png" alt="Logo DHBL" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">QUẢN LÝ ĐOÀN THỂ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ Auth::user()->tendoanvien.' ('.Auth::user()->chucvu.')' }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Tổng quan</p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Quản lý Đoàn viên
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Đoàn viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-trophy nav-icon"></i>
                  <p>Xếp loại</p>
                </a>
              </li>
            </ul>
          </li>
          @perm('ds-khen-thuong-ky-luat')
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-star-half-alt"></i>
              <p>
                Khen thưởng & kỷ luật
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-upload nav-icon"></i>
                  <p>Danh sách khen thưởng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-download nav-icon"></i> 
                  <p>Danh sách kỷ luật</p>
                </a>
              </li>
          @endperm
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-award nav-icon"></i>
                  <p>Khen thưởng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-ban nav-icon"></i>
                  <p>Kỷ luật</p>
                </a>
              </li>
          @perm('ds-khen-thuong-ky-luat')
            </ul>
          </li>
          @endperm
          @role('admin')
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Quản lý Chi đoàn
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <router-link to="/chidoan" class="nav-link">
                  <i class="fas fa-graduation-cap nav-icon"></i>
                  <p>Chi đoàn</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/doankhoato" class="nav-link">
                  <i class="fas fa-school nav-icon"></i>
                  <p>Đoàn khoa & Tổ</p>
                </router-link>
              </li>
          @endrole
            @perm('xep-loai-chi-doan')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-trophy nav-icon"></i>
                  <p>Xếp loại Chi đoàn</p>
                </a>
              </li>
            @endperm
          @role('admin')
            </ul>
          </li>
          @endrole
          @perm('ds-tham-gia-hoat-dong')
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Quản lý hoạt động
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Danh sách tham gia</p>
                </a>
              </li>
          @endperm
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-bolt nav-icon"></i>
                  <p>Danh sách hoạt động</p>
                </a>
              </li>
              @role('admin')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Cấp tổ chức</p>
                </a>
              </li>
              @endrole
          @perm('ds-tham-gia-hoat-dong')
            </ul>
          </li>
          @endperm

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>Văn bản Đoàn thể</p>
            </a>
          </li>
          @role('admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Quản lý người dùng</p>
            </a>
          </li>
          @endrole
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Tài khoản</p>
            </a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt red"></i>
                <p>Đăng xuất</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <router-view></router-view>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
</body>
</html>
