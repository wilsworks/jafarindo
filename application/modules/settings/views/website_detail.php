
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php echo $title; ?>
    <small><?php if(isset($edit_profile)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New User'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit User'; } ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('settings/settings_crud/0-0')?>" tooltip="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><?php echo $title; ?></a></li>
        <li class="active"><?php if(isset($edit_profile)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New User'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit User'; } ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Website's Detail</h3>

                </div><!-- /.box-header -->
                <div class="box-body">
	                <div class="row">
						<div class="col-xs-12">
							<div class="col-xs-12">
								<h3><i class="fa fa-globe"></i> Global Setting Website</h3>
								<hr>
							</div>
							<div class="col-xs-12">
							<label class="col-sm-2 control-label">Brand</label>
							<div class="col-sm-5">
								<div class="colom-disable">
									<?php echo $daftar->brand;?>
								</div>
							</div>
							</div>
							<div class="col-xs-12">
							<label class="col-sm-2 control-label">Tagline</label>
							<div class="col-sm-5">
								<div class="colom-disable">
									<?php echo $daftar->tagline;  ?>
								</div>
							</div>
							</div>

							<div class="col-xs-12">
								<label class="col-sm-2 control-label">Corporate</label>
								<div class="col-sm-5">
									<div class="colom-disable">
										<?php echo $daftar->corp_name;  ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<label class="col-sm-2 control-label">Short Description</label>
								<div class="col-sm-5">
									<div class="colom-disable">
										<?php echo $daftar->short_desc;?>
									</div>
								</div>
							</div>

							<div class="col-xs-12">
								<label class="col-sm-2 control-label">Long Description</label>
								<div class="col-sm-5">
									<div class="colom-disable">
										<?php echo $daftar->long_desc;  ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<HR>
								<div class="pull-right">
			                    <a href="<?php echo site_url('settings/settings_global')?>" tooltip="Edit Global Setting">
			                    <button class="btn btn-box-tool"><i class="fa fa-pencil"> Edit Global Setting</i></button>
			                    </a>
			                  	</div>
				            </div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="col-xs-12">
							<h3><i class="fa fa-envelope"></i> Contact Setting</h3>
							<hr>
						</div>
						
						<div class="col-xs-12">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-5">
							<div class="colom-disable">
								<?php echo $daftar->phone1;  ?>
							</div>
						</div>
						</div>

						<div class="col-xs-12">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-5">
								<div class="colom-disable">
									<?php echo $daftar->email1;  ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<label class="col-sm-2 control-label">Address</label>
							<div class="col-sm-5">
								<div class="colom-disable">
									<?php echo $daftar->address;  ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<HR>
							<div class="pull-right">
							<a href="<?php echo site_url('settings/settings_contact/0-0')?>" tooltip="Edit Contact">
		                    <button class="btn btn-box-tool"><i class="fa fa-pencil"> Edit Contact</i></button>
		                    </a>
		                  	</div>
			            </div>

					</div>


					<div class="col-xs-12">
						<div class="col-xs-12">
							<h3><i class="fa fa-users"></i> Social Media</h3>
							<hr>
						</div>
						<?php foreach ($sosmed as $sm) {?>
						<div class="col-xs-12">
							<label class="col-sm-2 control-label"><?php echo $sm->name;?></label>
							<div class="col-sm-5">
								<div class="colom-disable">
									<?php echo $sm->link;  ?>
								</div>
							</div>
						</div>
						<?php }?>

						<div class="col-xs-12">
							<HR>
							<div class="pull-right">
								<a href="<?php echo site_url('settings/settings_sosmed/0-0')?>" tooltip="Edit Social Media">
			                    <button class="btn btn-box-tool"><i class="fa fa-pencil"> Edit Social Media</i></button>
			                    </a>
		                  	</div>
			            </div>
					</div>
                </div><!-- /.box-body -->

                <div class="box-footer clearfix">
                </div><!-- /.box-footer -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->



