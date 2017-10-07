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
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title; ?> List</h3>
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
                  <th>Content</th>
                </tr>
              </thead>
              <tbody>
               	<?php $i=1;foreach ($daftar as $row){?>
					   		<tr>
  								<td align="center"><?php echo $i; $i++;?></td>
                  <td>
                    <span class="text-blue">
                    <strong><?php echo $row->title;?>
                    </strong>
                    </span>
                    <p>
                      <?php
                        if(strlen($row->description)>150){
                            echo substr($row->description,0,150).'...'; 
                        }else{
                            echo $row->description;
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
                        <a href="#" rel="tooltip-top" title="Restore">
                          <button class="btn btn-box-tool" >
                            <i class="fa fa-refresh text-blue" data-toggle="modal" data-target="#restoreMessage"  id="<?php echo site_url('sliders/sliders_crud/'.$row->id.'-5'); ?>" onClick="restore_msg(this);"> Restore</i>
                          </button>
                        </a>

                        <a href="#" rel="tooltip-top" title="Permanent Delete">
                          <button class="btn btn-box-tool" >
                            <i class="fa fa-trash text-danger" data-toggle="modal" data-target="#deleteMessage"  id="<?php echo site_url('sliders/sliders_crud/'.$row->id.'-6'); ?>" onClick="sendimg(this);"> Delete</i>
                          </button>
                        </a>
                        
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




      <div class="modal modal-info fade" id="restoreMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Restore Confirmation</h4>
            </div>
            <div class="modal-body">
              <p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i>&nbsp;&nbsp;&nbsp;Are you sure you want to restore the News?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
              <a id="restoreData" href="#"><button type="button" class="btn btn-outline">Restore</button></a>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>


      <div class="modal modal-danger fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i>&nbsp;&nbsp;&nbsp;Are you sure you want to delete permanent the News?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
              <a id="delData" href="#"><button type="button" class="btn btn-outline">Delete</button></a>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
      
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->


<script>
function sendimg(a){
  document.getElementById("delData").href=a.id;
}

function restore_msg(a){
  document.getElementById("restoreData").href=a.id;
}
</script>

     

