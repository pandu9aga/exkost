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
                        <h3 class="text-themecolor">Transfer Pelelang</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales overview chart -->
                <!-- ============================================================== -->
                <?php
                foreach ($transfer as $data) {
                ?>

                <!-- kotak -->
                <div class="row border-top border-left border-right border-bottom pt-2">
                  <div class="col-md-3">
                    <!-- Button trigger modal -->
                    <a  data-toggle="modal" data-target="#buktitransfer<?php echo $data->id_barang; ?>">
                      <img src="<?php echo base_url('assets/transfer/'.$data->bukti_transfer); ?>" alt="bukti transfer" width="225" height="155">
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="buktitransfer<?php echo $data->id_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="buktiTransferLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="buktiTransferLabel">Bukti Transfer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <img src="<?php echo base_url('assets/transfer/'.$data->bukti_transfer); ?>" width="450" height="310">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <?php
                    $CI =& get_instance();
                    $CI->load->model('Transfer_model');
                    $high = $CI->Transfer_model->getHighfortrans($data->id_barang)->result();
                    foreach ($high as $val) {
                    ?>
                    <p>Nama akun : <?php echo $data->nama_akun; ?></p>
                    <p>Nomor rekening : <?php echo $data->rekening_akun; ?></p>
                    <p>Nominal : Rp. <?php echo $val->jumlah_tawaran; ?></p>
                    <p>Nama Barang : <?php echo $data->nama_barang; ?></p>
                  </div>
                  <div class="col-md-2 pl-5">
                    <br> <br>
                    <?php
                    if ($data->status_transfer=='') {
                    ?>
                    <p>Upload Bukti</p>
                    <a href="<?php echo base_url('Admin/detail_transfer/'.$data->id_transfer); ?>">
                      <button class="btn btn-primary" type="button" name="sub_topup">Upload</button>
                    </a>
                    <?php
                    } elseif ($data->status_transfer=='kirim') {
                    ?>
                    <p>Tunggu Konfirmasi</p>
                    <a href="<?php echo base_url('Admin/detail_transfer/'.$data->id_transfer); ?>">
                      <button class="btn btn-primary" type="button" name="sub_topup">Detail</button>
                    </a>
                    <?php
                    } elseif ($data->status_transfer=='terima') {
                    ?>
                    <p>Transfer Sukses</p>
                    <a href="<?php echo base_url('Admin/detail_transfer/'.$data->id_transfer); ?>">
                      <button class="btn btn-primary" type="button" name="sub_topup">Detail</button>
                    </a>
                    <?php
                    } elseif ($data->status_transfer=='gagal') {
                    ?>
                    <p>Transfer Gagal</p>
                    <a href="<?php echo base_url('Admin/detail_transfer/'.$data->id_transfer); ?>">
                      <button class="btn btn-primary" type="button" name="sub_topup">Detail</button>
                    </a>
                    <?php
                    }
                    ?>
                  </div>
                </div> <br>
                <?php
                }
                 ?>
                <!-- akhir kotak -->
                <?php
                } ?>

          <!-- akhir kotak -->
          <div>
            <?php
              echo $pagination;
            ?>
          </div>
          <br>
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
</body>

</html>
