<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/admin/assets/images/logo_min.png'); ?>">
  <title>ExKost Admin</title>
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url('assets/admin/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- This page CSS -->
  <!-- chartist CSS -->
  <link href="<?php echo base_url('assets/admin/assets/plugins/chartist-js/dist/chartist.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css'); ?>" rel="stylesheet">
  <!--c3 CSS -->
  <link href="<?php echo base_url('assets/admin/assets/plugins/c3-master/c3.min.css'); ?>" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url('assets/admin/css/style.css'); ?>" rel="stylesheet">
  <!-- Dashboard 1 Page CSS -->
  <link href="<?php echo base_url('assets/admin/css/pages/dashboard.css'); ?>" rel="stylesheet">
  <!-- You can change the theme colors from here -->
  <link href="<?php echo base_url('assets/admin/css/colors/default-dark.css'); ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">

  <?php foreach ($admin as $dataadmin)
  {
  ?>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Exkost</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                  <a class="navbar-brand" href="index.html">
                      <!-- Logo icon --><b>
                          <img src="<?php echo base_url('assets/admin/assets/images/logo_min.png'); ?>" height="60px" width="80px" alt="homepage"/>
                      </b>
                      <!--End Logo icon -->
                      <!-- Logo text -->
                      <span>
                        <img src="<?php echo base_url('assets/admin/assets/images/logo_max.png'); ?>" height="60px" width="180px" alt="homepage"/>
                      </span>
                  </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== 
                        <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                         ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                          <p><?php echo $dataadmin->nama_admin; ?></p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-dark" href="#"><img src="<?php echo base_url('assets/admin/assets/images/iconprofile.png'); ?>" alt="user" class="profile-pic" /></a>
                        </li>
                    </ul>
                </div>
            </nav>

        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                  <ul id="sidebarnav">
                      <li class="dropdown-btn"> <a class="waves-effect waves-dark" href="<?php echo base_url('Admin/topup_user'); ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Top-Up User</span></a></li>
                      <li> <a class="waves-effect waves-dark" href="<?php echo base_url('Admin/transfer_pelelang'); ?>" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Transfer Pelelang</span></a></li>
                      <li> <a class="waves-effect waves-dark" href="<?php echo base_url('Admin/edit_jenis'); ?>" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Edit Jenis Barang</span></a></li>
                  </ul>
                  <div class="text-center m-t-30">
                      <a href="<?php echo base_url('Admin/logout'); ?>" class="btn waves-effect waves-light btn-info hidden-md-down"><i class="mdi mdi-logout-variant"></i> Logout</a>
                  </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Jenis Barang</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <!--center class="m-t-30"-->
                                  <form class="form-horizontal form-material" name="form_plus" method="post" action="<?php echo base_url('Admin/proses_cjenis'); ?>">
                                      <div class="form-group">
                                          <label class="col-md-12">Tambah Jenis Barang</label>
                                          <div class="col-md-12">
                                              <input type="text" name="nama_jenis" placeholder="Nama Jenis" class="form-control form-control-line">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                              <button class="btn btn-success"><i class="mdi mdi-plus-box"></i> Tambah</button>
                                          </div>
                                      </div>
                                  </form>
                                <!--/center-->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <?php
                    if (isset($msg)) {
                      if ($msg=='sukses') {
                      ?>
                      <!-- Modal -->
                      <div class="modal fade" id="isuccess" tabindex="-1" role="dialog" aria-labelledby="isuccessLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="isuccessLabel">Tambah Jenis Barang</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Sukses menambahkan jenis barang : </p>
                              <h4><?php echo $nj; ?></h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      }elseif ($msg=='ada') {
                      ?>
                      <!-- Modal -->
                      <div class="modal fade" id="isuccess" tabindex="-1" role="dialog" aria-labelledby="isuccessLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="isuccessLabel">Tambah Jenis Barang</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Jenis barang : </p>
                              <h4><?php echo $nj; ?></h4>
                              <p>Sudah ada</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      }elseif ($msg=='suksesu') {
                      ?>
                      <!-- Modal -->
                      <div class="modal fade" id="isuccess" tabindex="-1" role="dialog" aria-labelledby="isuccessLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="isuccessLabel">Edit Jenis Barang</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Sukses mengedit jenis barang : </p>
                              <h4><?php echo $nj; ?></h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      }elseif ($msg=='suksesd') {
                      ?>
                      <!-- Modal -->
                      <div class="modal fade" id="isuccess" tabindex="-1" role="dialog" aria-labelledby="isuccessLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="isuccessLabel">Hapus Jenis Barang</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Sukses menghapus jenis barang : </p>
                              <h4><?php echo $nj; ?></h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      }
                    }
                    ?>
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                      <?php foreach ($jenis as $j): ?>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" name="form_edit<?php echo $j->id_jenis_barang; ?>" method="post" action="<?php echo base_url('Admin/proses_ujenis'); ?>">
                                    <div class="form-group">
                                        <label class="col-md-12">ID Jenis : <?php echo $j->id_jenis_barang; ?></label>
                                        <div class="col-md-12">
                                            <input type="text" name="nama_jenis" placeholder="Nama Jenis Barang" class="form-control form-control-line" value="<?php echo $j->nama_jenis_barang; ?>" required>
                                            <input type="hidden" name="id_jenis" value="<?php echo $j->id_jenis_barang; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success"><i class="mdi mdi-plus-box"></i> Update</button>
                                            <a href="#" data-toggle="modal" data-target="#del<?php echo $j->id_jenis_barang; ?>"><i class="mdi mdi-delete"></i> Hapus</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- Modal -->
                                <div class="modal fade" id="del<?php echo $j->id_jenis_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="delLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="delLabel">Hapus Jenis Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Anda yakin akan menghapus jenis barang : </p>
                                        <p><?php echo $j->nama_jenis_barang; ?></p>
                                      </div>
                                      <div class="modal-footer">
                                        <a href="<?php echo base_url('Admin/proses_djenis/'.$j->id_jenis_barang); ?>">
                                          <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2020 Admin Exkost
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
        <!-- ============================================================== -->
    </div>

    <?php
    }
    ?>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/admin/assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo base_url('assets/admin/assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url('assets/admin/js/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/admin/js/waves.js'); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('assets/admin/js/sidebarmenu.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/admin/js/custom.min.js'); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/admin/assets/plugins/chartist-js/dist/chartist.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'); ?>"></script>
    <!--c3 JavaScript -->
    <script src="<?php echo base_url('assets/admin/assets/plugins/d3/d3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/plugins/c3-master/c3.min.js'); ?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/admin/js/dashboard.js'); ?>"></script>

    <script>
    $(document).ready(function(){
      $("#isuccess").ready(function(){
        $("#isuccess").modal("toggle");
      });
    });
    </script>
</body>

</html>
