
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php echo $title; ?>
    <small><?php if(isset($new_user)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New Social Media'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Social Media'; } ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('settings/settings_crud/0-0')?>" tooltip="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><?php echo $title; ?></a></li>
        <li class="active"><?php if(isset($new_user)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New Social Media'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Social Media'; } ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Contact's Detail</h3>
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
						if(isset($new_user)) {
							echo form_open_multipart('settings/add_contact','class="form-horizontal" role="form"');
						} else {
							echo form_open_multipart('settings/edit_contact/save','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'id' => $contact->id
							);
							echo form_hidden($hidden_data_user);
						}
					?>
							
							
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Contact name" name="profil" <?php if(!isset($new_user)){ echo 'value="'.$contact->profil.'"'; } ?> autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Value</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Value of Contact" name="value" <?php if(!isset($new_user)){ echo 'value="'.$contact->value.'"'; } ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">fa-icon</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="icon of contact (phpone)" name="fa_icon" <?php if(!isset($new_user)){ echo 'value="'.$contact->fa_icon.'"'; } ?>>
						</div>
					</div>
			
				
					<!-- delete confirm -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								</div>
								<div class="modal-body">
									<p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i> Are you sure you want to delete the contact item?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-primary"><Delete</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div>

					<!-- button save new user -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;
							<?php if(!isset($new_user)){ ?>
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"> Delete</button>
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



