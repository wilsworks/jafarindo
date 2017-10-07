<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
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
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Administrator Trash</h3>
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
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>User Group</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     	<?php $i=1;foreach ($daftar as $row){?>
								<tr>
									<td class="center"><?php echo $i; $i++;?></td>
									<td class="center"><?php echo $row->nama;?></td>
									<td class="center"><?php echo $row->username;?></td>
									<td class="center"><?php echo $row->email;?></td>
									<td class="center"><?php 	if ($row->priviledge==1){
													$priviledges = "Super Admin";
												}elseif ($row->priviledge==2){
													$priviledges = "Admin";
												}else{
													$priviledges = "User";
												}
												echo $priviledges;?>
									</td>
									<td class="center"><?php if($this->session->userdata('priviledge')=='1'){?>
									<a href="<?php echo site_url('settings/settings_crud/'.$row->id.'-5'); ?>" rel="tooltip-top" title="Restore">
										<i class="fa fa-undo"></i>
									</a>&nbsp;
									<a href="<?php echo site_url('settings/settings_crud/'.$row->id.'-6'); ?>" rel="tooltip-top" title="Delete Permanent">
									 <i class="fa  fa-remove"></i>
									</a>
											<?php } else {
												echo "N/A";
											}?>
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

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
     