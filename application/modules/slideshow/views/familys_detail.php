
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php echo $title; ?>
    <small><?php if(isset($new_familys)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New familys'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit familys'; } ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('settings/settings_crud/0-0')?>" tooltip="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url('familys/familys_crud/0-0')?>"><?php echo $title; ?></a></li>
        <li class="active"><?php if(isset($new_familys)) { echo '<i class="fa fa-user"></i>&nbsp;&nbsp;New familys'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit familys'; } ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">familys's Detail</h3>
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
						if(isset($new_familys)) {
							echo form_open_multipart('familys/add_familys','class="form-horizontal" role="form"');
						} else {
							echo form_open_multipart('familys/edit_familys/save','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'id' => $familys->parentId
							);
							echo form_hidden($hidden_data_user);
						}
					?>
							
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Jhon Doe"  name="name" <?php if(!isset($new_familys)){ echo 'value="'.$familys->name.'"'; } ?> autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">NIK</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Nomor Induk Kependudukan"  name="nik" <?php if(!isset($new_familys)){ echo 'value="'.$familys->nik.'"'; } ?> >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Hubungan</label>
						<div class="col-sm-5">
							<select name="sibling" class="form-control">

								<?php if(isset($new_familys)) { ?>
									<?php echo '<option value = "Ayah">Ayah</option>'?>
									<?php echo '<option value = "Ibu">Ibu</option>'?>
									<?php echo '<option value = "Saudara Laki-Laki">Saudara Laki-Laki</option>'?>
									<?php echo '<option value = "Saudara Perempuan">Saudara Perempuan</option>'?>

								<?php }else{ ?>
									<?php echo '<option value = "Ayah"';  if($familys->sibling=='Ayah'){echo 'selected="selected"';} echo'>Ayah</option>';?>
									<?php echo '<option value = "Ibu"';  if($familys->sibling=='Ibu'){echo 'selected="selected"';} echo'>Ibu</option>'?>
									<?php echo '<option value = "Saudara Laki-Laki"';  if($familys->sibling=='Saudara Laki-Laki'){echo 'selected="selected"';} echo'>Saudara Laki-Laki</option>'?>
									<?php echo '<option value = "Saudara Perempuan"';  if($familys->sibling=='Saudara Perempuan'){echo 'selected="selected"';} echo'>Saudara Perempuan</option>'?>
								<?php } ?>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Pekerjaan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Guru / PNS / Pekerja Swasta"  name="job" <?php if(!isset($new_familys)){ echo 'value="'.$familys->job.'"'; } ?> >
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label">Penghasilan <br>per Bulan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Rp. XXX.XXX,-"  name="income" <?php if(!isset($new_familys)){ echo 'value="'.$familys->income.'"'; } ?> >
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;
							<?php if(!isset($new_familys)){ ?>
							<button type='button' class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMessage" > Delete</button>
							<?php } else{ ?>
							<button type="reset" class="btn btn-danger btn-sm"> Clear</button>
							<?php } ?>
						</div>
					</div>

					
				
					<?php if(!isset($new_familys)){ ?>
					<div class="modal modal-warning fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								</div>
								<div class="modal-body">
									<p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i> Are you sure you want to delete the familys?</p>
								</div>
								<div class="modal-footer">
				                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
				                    <a href="<?php echo site_url('familys/familys_crud/'.$familys->familysId.'-3'); ?>"><button type="button" class="btn btn-outline">Delete</button></a>
				                </div>
								
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div>
					<?php } ?>

					<!-- button save new familys -->
					
						
						
						<?php echo form_close(); ?>
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->



