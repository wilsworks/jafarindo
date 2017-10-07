<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Bambuwulung</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total News</span>
                  <span class="info-box-number"><?php echo $data_news; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-image"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Photographic</span>
                  <span class="info-box-number"><?php echo $data_photo; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-file-image-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Infographic</span>
                  <span class="info-box-number"><?php echo $data_info; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-video-camera"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Videographic</span>
                  <span class="info-box-number"><?php echo $data_video; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
          <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">News Top 5</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <?php if(!empty($status)){ ?>
              <div class="<?php echo $alert; ?> alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $status; ?>
              </div>          
              <?php } ?>
              
                     
              <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No&nbsp;</th>
                  <th>News</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($news as $row){?>
                <tr>
                  <td align="center"><?php echo $i; $i++;?></td>
                  <td>
                    
                      <span class="text-blue"><strong>
                      <?php echo $row->judul;?>
                      </strong></span>
                    <p>
                      <?php
                        if(strlen($row->isi)>150){
                            echo substr($row->isi,0,150).'...'; 
                        }else{
                            echo $row->isi;
                        }
                      ?>
                    </p>
                    <?php if($row->status=='A'){?> 
                      <span class="text-green"><?php echo 'Published'; ?></span> -
                    <?php }else{ ?>
                      <span class="text-orange"><?php echo 'Unpublish';?></span> -
                    <?php }?>
                    <span class="text-gray">
                    <?php  
                      $date2 = new DateTime($row->created_date);
                      echo $date2->format('jS F Y'); 
                    ?>
                    </span>

                    <div class="pull-right">
                       <i class="fa fa-eye text-blue"> <?php echo $row->view; ?>&nbsp;View</i>  
                    </div>
                    
                  
                  </td>
                  
                </tr>
                <?php } ?>
                </tbody>
              </table>
          </div><!-- /.table-responsive -->


            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
            </div><!-- /.box-footer -->
          </div><!-- /.box -->
          </div>
          </div>
          
        </section><!-- /.content -->

          <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>themesAdmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>