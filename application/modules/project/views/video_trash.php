<link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/plugins/datatables/dataTables.bootstrap.css">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title; ?>
    <small>Trash</small>
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
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title; ?> Trash</h3>
          
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
                  <th>Photo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="row">
              <?php $i=1;foreach ($daftar as $row){?>
                  <div class="col col-md-4">
                    <img class="img-responsive" src="<?php if(!empty($driver_pp->pathUrl)){echo base_url().'driver_documents/'.$driver_pp->pathUrl;} else {echo base_url().'themesAdmin/dist/img/photo2.png' ;} ?>" alt="Photo">
                   
                      <strong>
                      <?php echo $row->name;?>
                      </strong>

                    <p>
                      <?php
                        if(strlen($row->description)>150){
                            echo substr($row->description,0,150).'...'; 
                        }else{
                            echo $row->description;
                        }
                      ?>

                      <div class="pull-right">
                        <a href="<?php echo site_url('project/infographic/'.$row->id.'-5'); ?>" rel="tooltip-top" title="Restore">
                          <button class="btn btn-box-tool" >
                            <i class="fa fa-rotate-left text-green"> Restore</i>
                          </button>
                        </a>
                        <a href="#" rel="tooltip-top" title="Delete Permanent">
                          <button class="btn btn-box-tool" >
                            <i class="fa fa-trash text-red" data-toggle="modal" data-target="#deleteMessage"  id="<?php echo site_url('project/infographic/'.$row->id.'-6'); ?>" onClick="sendimg(this);"> Delete</i>
                          </button>
                        </a>
                      </div>
                    </p>
                  </div>
                <?php if($i%3==0){ ?>
                      </div>
                  </td>
                </tr>
                <!-- TEST -->
                <tr>
                  <td>
                    <div class="row">
                <?php } ?>
              <?php $i++; } ?>

                </tbody>
              </table>
          </div>
        </div>
        <div class="box-footer clearfix">
        </div>
      </div>

      <div class="modal modal-danger fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i>&nbsp;&nbsp;&nbsp;Are you sure you want to delete the <?php echo $title;?>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
              <a id="delData" href="#"><button type="button" class="btn btn-outline">Delete</button></a>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
  </div><!-- /.row -->
</section><!-- /.content -->


<script>
function sendimg(a){
  document.getElementById("delData").href=a.id;
}
</script>

     

