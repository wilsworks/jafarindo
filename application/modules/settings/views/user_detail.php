
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php echo $title; ?>
    <small><?php if(isset($new_user)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New User'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit User'; } ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('settings/settings_crud/0-0')?>" tooltip="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><?php echo $title; ?></a></li>
        <li class="active"><?php if(isset($new_user)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New User'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit User'; } ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">User's Detail</h3>
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
							echo form_open_multipart('settings/add_user','class="form-horizontal" role="form"');
						} else {
							echo form_open_multipart('settings/edit_user/save','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'id' => $user->id
							);
							echo form_hidden($hidden_data_user);
						}
					?>
							
					<!-- Login Detail -->
					<?php if($this->session->userdata('priviledge')==1){ ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Priviledge</label>
							<div class="col-sm-3">
								<select name="priviledge" class="form-control">
									<?php foreach($all_priviledge as $client=>$id) { ?>
										<?php if(isset($user)) { ?>
											<?php if($client == $user->priviledge) { ?>
												<?php echo '<option value = "'.$client.'" selected="selected">'.$id;' </option>'?>
											<?php } else { ?>
												<?php echo '<option value = "'.$client.'">'.$id;' </option>'?>
											<?php } ?>
										<?php } else { ?>
											<?php echo '<option value = "'.$client.'">'.$id;' </option>'?>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
					<?php } ?>
							
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama" <?php if(!isset($new_user)){ echo 'value="'.$user->nama.'"'; } ?> autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" placeholder="example@example.com" name="email" <?php if(!isset($new_user)){ echo 'value="'.$user->email.'" disabled="disabled"'; } ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="username" <?php if(!isset($new_user)){ echo 'value="'.$user->username.'" disabled="disabled"'; } ?>>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Re-type Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="re_password">
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
											<p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i> Are you sure you want to delete the user?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
											<button type="button" class="btn btn-primary">Delete</button>
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



