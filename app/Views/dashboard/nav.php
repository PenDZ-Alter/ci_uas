<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">TI UIN Malang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Annas Bintar</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo site_url(''); ?>" class="nav-link <?= uri_string() === '' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">All Datas</li>
        <li class="nav-item">
          <a href="<?php echo site_url('view/alter'); ?>" class="nav-link <?= uri_string() === 'view/alter' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Alternatif
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('view/norm'); ?>" class="nav-link <?= uri_string() === 'view/norm' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Normalisasi Terbobot
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('view/pref'); ?>" class="nav-link <?= uri_string() === 'view/pref' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Nilai Preferensi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('view/res'); ?>" class="nav-link <?= uri_string() === 'view/res' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Hasil Akhir
            </p>
          </a>
        </li>
        <li class="nav-header">Data Management</li>
        <li class="nav-item">
          <a href="<?php echo site_url('forms/emp'); ?>" class="nav-link <?= uri_string() === 'forms/emp' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Data Karyawan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('forms/wp'); ?>" class="nav-link <?= uri_string() === 'forms/wp' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Pengkategorian Karyawan
            </p>
          </a>
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
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->