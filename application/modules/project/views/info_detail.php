
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php echo $title; ?>
    <small><?php if(isset($new_project)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New driver'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit driver'; } ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard/dashboard_crud/0-0')?>" tooltip="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url('project/photographic/0-0')?>"><?php echo $title; ?></a></li>
        <li class="active"><?php if(isset($new_project)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New Project'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Project'; } ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">driver's Detail</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
	                <?php	if(@$status){ ?>
					<div class="<?php echo $alert; ?> alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $status; ?>
					</div>
					<?php } ?>
                 
                 	<?php
						
                 		if(isset($new_project)) {
							echo form_open_multipart('project/do_upload','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'category' => $category,
								'new_project'=>true
							);
							echo form_hidden($hidden_data_user);
						} else {
							echo form_open_multipart('project/do_upload','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'id' => $project->id,
								'category' => $project->type,
								'new_project'=> false
							);
							echo form_hidden($hidden_data_user);
						}
					?>

					<div class="form-group">
						<label class="col-sm-2 control-label">Image File</label>
						<div class="col-sm-5">
							<input type="file" name="userfile"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Title</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="exp: Photo name"  name="name" <?php if(!isset($new_project)){ echo 'value="'.$project->name.'"'; } ?> autofocus>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-5">
							<textarea type="text" class="form-control"  name="description"> <?php if(!isset($new_project)){ echo $project->description; } ?> </textarea>
						</div>
					</div>
					
					<?php if(!isset($new_project)){ ?>
						<div class="modal modal-warning fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
									</div>
									<div class="modal-body">
										<p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i> Are you sure you want to delete the driver?</p>
									</div>
									<div class="modal-footer">
					                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
					                    <a href="<?php echo site_url('project/infographic/'.$project->id.'-3'); ?>"><button type="button" class="btn btn-outline">Delete</button></a>
					                </div>
									
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					<?php } ?>

					<!-- button save new driver -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;
							<?php if(!isset($new_project)){ ?>
							<button type='button' class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMessage" > Delete</button>
							<?php } else{ ?>
							<button type="reset" class="btn btn-danger btn-sm"> Clear</button>
							<?php } ?>
						</div>
					</div>
				
				
				<?php echo form_close(); ?>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div><!-- /.box-footer -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->



