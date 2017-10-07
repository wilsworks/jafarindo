<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="bambuwulung powered by PROLOGI" />
	  <meta name="keywords" content="bambu, wulung, bambuwulung, komunitas, kebudayaan" />
    <meta name="author" content="PROLOGI">

    <title>Jaffarindo</title>
	  <link rel="shortcut icon" href="<?php echo base_url(); ?>logo.png" type="image/x-icon" />
	  <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>themes/admin/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>themes/admin/css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
		<!-- <img lass="profile-img"  src="<?php echo base_url(); ?>themes/admin/img/avatar_2x.png"></img> -->
      <div class="row login-container" >
        <div class="col-md-12">
        <?php echo form_open('login/check','class="form-signin" role="form"');
          $false_login = $this->session->flashdata('false_login');
          $username = $this->session->flashdata('username');
        ?> 
          <div class="form-background">
          <h4 class="text-center">Login Form</h4>
          <hr>

          <?php if(!empty($false_login)){ ?>
          <div class="alert alert-danger">
          <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>

          <?php echo $false_login; ?>
          </div>
          <?php } ?>
          <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <button class="btn btn-lg btn-success btn-block" type="submit">Masuk</button>
          <hr>
          <div class="text-center"><span>jaffarindo.com</span></div>
          </div>
          
          <div class="text-center text-gray"><br>&copy; 2016, Prisma Teknologi Mandiri.<br>All right reserved</div>
          </form>

        </div>


      </div>
    </div> <!-- /container -->

	<!-- JavaScript -->
   <script src="<?php echo base_url(); ?>themes/admin/js/jquery-1.10.2.js"></script>
   <script src="<?php echo base_url(); ?>themes/admin/js/bootstrap.js"></script>
	 <script src="<?php echo base_url(); ?>themes/admin/js/bstretch/jquery/jquery.js"></script>
   <script src="<?php echo base_url(); ?>themes/admin/js/bstretch/jquery.backstretch.js"></script>
   <script>
        // $.backstretch([
        //   "<?php echo base_url(); ?>themes/admin/img/bg1.png",
        //   "<?php echo base_url(); ?>themes/admin/img/bg2.png",
        //   "<?php echo base_url(); ?>themes/admin/img/bg3.png"
        // ], {
        //     fade: 750,
        //     duration: 4000
        // });
    </script>
  </body>
</html>