<script type="text/javascript">
	$(function(){
		$("#datepicker1" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-50:+0"
		});
		$("#datepicker1" ).change(function() {
			$("#datepicker1" ).datepicker( "option","dateFormat","yy-mm-dd" );
			});
		
	});
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php echo $title; ?>
    <small><?php if(isset($new_profile)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New profile'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit profile'; } ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard/dashboard_crud/0-0')?>" tooltip="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url('profile/profile_crud/0-0')?>"><?php echo $title; ?></a></li>
        <li class="active"><?php if(isset($new_profile)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New profile'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit profile'; } ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">profile's Detail</h3>
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
						if(isset($new_profile)) {
							echo form_open_multipart('profile/add_profile','class="form-horizontal" role="form"');
						} else {
							echo form_open_multipart('profile/edit_profile/save','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'id' => $profile->psId
							);
							echo form_hidden($hidden_data_user);
						}
					?>

					<div class="form-group">
						<label class="col-sm-2 control-label">Fullname</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="exp: John Doe"  name="fullname" <?php if(!isset($new_profile)){ echo 'value="'.$profile->fullname.'"'; } ?> autofocus>
						</div>
					</div>							

					<div class="form-group">
						<label class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" placeholder="exp: Jakarta / Tangerang / Depok" name="pob" <?php if(!isset($new_profile)){ echo 'value="'.$profile->pob.'" '; } ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="tanggal tahir" name="dob" <?php if(!isset($new_profile)){ echo 'value="'.$profile->dob.'" '; } ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-3">
							<select name="gender" class="form-control">
								<?php if(isset($new_profile)) { ?>
									<?php echo '<option value = "M">Male</option>'?>
									<?php echo '<option value = "F">Female</option>'?>
								<?php }else{ ?>
									<?php echo '<option value = "M"'; 
									if($profile->gender=='M'){ echo 'Selected="selected"';}
									?>
									<?php echo '>Male</option>'?>
									<?php echo '<option value = "F"'; 
									if($profile->gender=='F'){ echo 'Selected="selected"';}
									?>
									<?php echo'>Female</option>'?>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-5">
							<textarea type="text"class="form-control"  name="address"> <?php if(!isset($new_profile)){ echo $profile->address; } ?> </textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" placeholder="exp: +62 XXX XXX" name="phone" <?php if(!isset($new_profile)){ echo 'value="'.$profile->phone.'" '; } ?>>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;
							<?php if(!isset($new_profile)){ ?>
							<button type='button' class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMessage" > Delete</button>
							<?php } else{ ?>
							<button type="reset" class="btn btn-danger btn-sm"> Clear</button>
							<?php } ?>
						</div>
					</div>
					<?php if(!isset($new_profile)){ ?>
						<div class="modal modal-warning fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
									</div>
									<div class="modal-body">
										<p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i> Are you sure you want to delete the profile?</p>
									</div>
									<div class="modal-footer">
					                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
					                    <a href="<?php echo site_url('profile/profile_crud/'.$profile->profileId.'-3'); ?>" ><button type="button" class="btn btn-outline">Delete</button> </a>
					                </div>
									
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					<?php } ?>
						
					<?php echo form_close(); ?>
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->



