
<link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/plugins/datatables/dataTables.bootstrap.css">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title; ?>
    <small>list</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard/dashboard_crud/0-0')?>" rel="tooltip-top" title="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#"><?php echo $title; ?></a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <?php if(isset($profile)){?>
        <div class="box box-warning">
          <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>themesAdmin/dist/img/user1-128x128.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $user->nama;?></h3>
                  <p class="text-muted text-center"> <?php echo $profile->fullname;?></p>
                   <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Telp</b> <a class="pull-right"><?php echo $profile->phone;?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right"><?php echo $user->email;?></a>
                    </li>
                    
                  </ul>  
              </div>
              <div class="col-md-8">
                <ul class="nav nav-stacked">
                  <li>
                    <strong><i class="fa fa-flag-o margin-r-5"></i> Tempat Lahir</strong>
                    <p class="text-muted"><h5><?php if(isset($profile)){echo $profile->pob;}else{echo "-";}?></h5></p>
                  </li>
                  <li>
                    <strong><i class="fa fa-birthday-cake margin-r-5"></i> Tanggal lahir</strong>
                    <p class="text-muted">
                    <h5>
                    <?php if(isset($profile)){
                      $date = new DateTime($profile->dob);
                      echo $date->format('l, jS F Y');
                    }else{echo "-";}?>
                    </h5>

                    </p>
                  </li>

                  <li>
                    <strong><i class="fa fa-intersex margin-r-5"></i> Jenis Kelamin</strong>
                    <p class="text-muted">
                        <h5><?php if(isset($profile)){ if($profile->gender=='M'){echo "Laki Laki";}else{echo "Perempuan";}}else{echo "-";}?></h5>
                    </p>
                  </li>
                  <li><strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                    <p class="text-muted">
                        <h5><?php if(isset($profile)){ echo $profile->address; }else{ echo "-"; }?>.</h5>
                    </p>
                  </li>
                  <li>
                    <strong><i class="fa fa-calendar-o margin-r-5"></i> Last Update</strong>
                      <p class="text-muted">
                          <h5>
                          <?php if(isset($profile)){
                              $date = new DateTime($profile->changedDate);
                              echo $date->format('g:ia \o\n l jS F Y');   
                          }?>   
                          </h5>
                      </p>                  
                  </li>
                </ul>
              </div>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix"> 
            <div class="box-tools pull-right">
              <a href="<?php echo site_url('profile/profile_crud/0-2')?>">
              <button type="button" class="btn btn-primary" ><i class="fa fa-pencil"> Ubah Profil</i>
              </button>
              </a>
            </div>
           </div><!-- /.box-footer -->
        </div><!-- /.box -->

      <?php }else{?>

            <div class="text-center text-deep-gray" >
            <h2><i class="fa fa-2x fa-user"></i></h2>
            <h2> Hi, <?php echo $this->session->userdata('nama'); ?> </h2>
            <h4>Anda belum melakukan pengaturan pada profil anda,<br>Mohon untuk melengkapinya<br>sebagai syarat lolos Administrasi</h4>
            <br>
            <a href="<?php echo site_url('profile/profile_crud/0-1')?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i>&nbsp;Atur Profil</button>
            </a>

            </div>
      <?php }?>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->


<script>
function sendimg(a){
  document.getElementById("delData").href=a.id;
}
</script>

     

