<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jafarindo" />
    <meta name="keywords" content="jafarindo" />
    <meta name="author" content="http://wils.works">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jafarindo | Administrator Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/plugins/datepicker/datepicker3.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-tgransition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('dashboard/dashboard_crud/0-0')?>" class="logo">
          <span class="logo-mini"><b>J</b>F</span><!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-lg"><b>Jafarindo</b></span><!-- logo for regular state and mobile devices -->
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>  <a href="<?php echo site_url('welcome')?>">Visit Webpage</a>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>themes/dist/img/user1-128x128.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>themesAdmin/dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">
                    <p>
                      <strong><?php echo $this->session->userdata('nama'); ?> </strong>
                      <small> <?php if($this->session->userdata('priviledge')=='1') {echo "Super Administrator";} 
                      else if($this->session->userdata('priviledge')=='3'){echo "Calon Siswa";}?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Akun</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" data-toggle="modal" data-target="#logoutMessage"  id="<?php echo site_url('login/logout'); ?>" onClick="logoutJS(this);" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>

      <aside class="main-sidebar">
        <section class="sidebar">
       
          <?php if($this->session->userdata('priviledge')==1){ ?>
          <ul class="sidebar-menu">
            <li class="header">MENU ADMINISTRATOR</li>
            <li class="<?php echo $nav[0];?>">
              <a href="<?php echo site_url('dashboard/dashboard_crud/0-0')?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
              <li class="<?php echo $nav[3];?>" >
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Product</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $sub_nav[5];?>"><a href="<?php echo site_url('product/categories_crud/0-0')?>"><i class="fa fa-list-ul"></i> Categories List</a></li>
                <li class="<?php echo $sub_nav[6];?>"><a href="<?php echo site_url('product/categories_crud/0-4')?>"><i class="fa fa-trash"></i> Category Trash</a></li>
                <li class="<?php echo $sub_nav[7];?>"><a href="<?php echo site_url('product/categories_crud/0-0')?>"><i class="fa fa-list-ul"></i> Product List</a></li>
                <li class="<?php echo $sub_nav[8];?>"><a href="<?php echo site_url('product/categories_crud/0-4')?>"><i class="fa fa-trash"></i> Product Trash</a></li>
              </ul>
              
            </li>
            <li class="<?php echo $nav[1];?>">
              <a href="#">
                <i class="fa fa-file-text-o"></i>
                <span>Highlights</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $sub_nav[1];?>"><a href="<?php echo site_url('highlights/highlight_crud/0-0')?>"><i class="fa fa-list-ul"></i> Highlights List</a></li>
                <li class="<?php echo $sub_nav[2];?>"><a href="<?php echo site_url('highlights/highlight_crud/0-4')?>"><i class="fa fa-trash"></i> Trash</a></li>
              </ul>
            </li>

             <li class="<?php echo $nav[2];?>">
              <a href="#">
                <i class="fa fa-file-text-o"></i>
                <span>Stories</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $sub_nav[3];?>"><a href="<?php echo site_url('stories/stories_crud/0-0')?>"><i class="fa fa-list-ul"></i> Story List</a></li>
                <li class="<?php echo $sub_nav[4];?>"><a href="<?php echo site_url('stories/stories_crud/0-4')?>"><i class="fa fa-trash"></i> Trash</a></li>
              </ul>
            </li>

             <li class="<?php echo $nav[5];?>">
              <a href="#">
                <i class="fa fa-file-text-o"></i>
                <span>Sliders</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $sub_nav[11];?>"><a href="<?php echo site_url('sliders/sliders_crud/0-0')?>"><i class="fa fa-list-ul"></i> Sliders List</a></li>
                <li class="<?php echo $sub_nav[12];?>"><a href="<?php echo site_url('sliders/sliders_crud/0-4')?>"><i class="fa fa-trash"></i> Trash</a></li>
              </ul>
            </li>

            



          
            <li class="<?php echo $nav[4];?>">
              <a href="#">
                <i class="fa fa-gears"></i> <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $sub_nav[9];?>">
                  <a href="#"><i class="fa fa-lock"></i> Administrator <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('settings/settings_crud/0-0')?>"><i class="fa fa-list"></i> List </a></li>
                    <li><a href="<?php echo site_url('settings/settings_crud/0-4')?>"><i class="fa fa-trash"></i> Trash </a></li>
                    
                  </ul>


                </li>
                <li class="<?php echo $sub_nav[10];?>">
                  <a href="#"><i class="fa fa-globe"></i> Website <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('sliders/sliders_crud/0-0')?>"><i class="fa fa-gear"></i> Slider </a></li>
                    <li><a href="<?php echo site_url('settings/settings_profile/0-0')?>"><i class="fa fa-gear"></i> Banner </a></li>
                    <li><a href="<?php echo site_url('settings/settings_profile/0-0')?>"><i class="fa fa-gear"></i> Profile </a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <?php }?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        {content}
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://bambuwulung.com">PT Prisma Teknologi Mandiri</a>.</strong> All rights reserved.
      </footer>

      <div class="modal modal-info fade" id="logoutMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Keluar</h4>
              </div>
              <div class="modal-body">
                <p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i>&nbsp;&nbsp;&nbsp;Apakah Anda yakin ingin keluar dari akun anda?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <a id="logoutLink" href="#"><button type="button" class="btn btn-outline">Setuju</button></a>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>themesAdmin/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>themesAdmin/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>themesAdmin/dist/js/demo.js"></script>
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
  <script src="<?php echo base_url(); ?>themesAdmin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
            });
        });

        //Date picker
        $('#dateEndPicker').datepicker({
          autoclose: true
        });

        $('#dateStartPicker').datepicker({
          autoclose: true
        });

        $('#dateGraduatePicker').datepicker({
          autoclose: true
        });


    </script>

    <script>
    function logoutJS(a){
      document.getElementById("logoutLink").href=a.id;
    }
    </script>
  </body>
</html>

