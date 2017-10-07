		<div class="row">
          <div class="col-lg-12">
            <h1><?php echo $title; ?></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-cogs"></i>&nbsp;&nbsp;Settings</li>
			  <li class="active"><i class="fa fa-users"></i>&nbsp;&nbsp;User List</li>
            </ol>
          </div>
        </div>
		
		<div class="row">
          <div class="col-lg-12">
			<?php if(!empty($status)){ ?>
					<div class="<?php echo $alert; ?> alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $status; ?>
					</div>					
			<?php } ?>
            <div class="panel panel-primary">
              <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseUserList">
						<h4 class="panel-title"><a class="accordion-toggle"> User List</a></h4>
			  </div>
			  <div id="collapseUserList" class="panel-collapse collapse in">
				  <div class="panel-body">
				  <a href="<?php echo site_url('settings/settings_crud/0-1') ?>" class="btn btn-primary" role="button"><i class="fa fa-plus"></i> New User</a><br><br>
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
							<thead>
								<tr>
									<th>No&nbsp;</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Email</th>
									<th>User Group</th>
									<th>Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $i=1;foreach ($daftar as $row){?>
								<tr>
									<td align="center"><?php echo $i; $i++;?></td>
									<td><?php echo $row->nama;?></td>
									<td><?php echo $row->username;?></td>
									<td><?php echo $row->email;?></td>
									<td><?php 	if ($row->priviledge==1){
													$priviledges = "Super Admin";
												}elseif ($row->priviledge==2){
													$priviledges = "Admin";
												}elseif($row->priviledge==3){
													$priviledges = "Operator";
												}else{
													$priviledges = "User";
												}
												echo $priviledges;?>
									</td>
									<td><?php if($this->session->userdata('priviledge')=='1'){?>
									<a href="<?php echo site_url('settings/settings_crud/'.$row->id.'-2'); ?>" rel="tooltip-top" title="Edit">
									<img src="<?php echo base_url();?>themes/admin/img/i_edit.png">
									</a>&nbsp;
									<a href="<?php echo site_url('settings/settings_crud/'.$row->id.'-3'); ?>" rel="tooltip-top" title="Delete">
									<img src="<?php echo base_url();?>themes/admin/img/cross_circle.png">
									</a>
											<?php } else {
												echo "N/A";
											}?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
				  </div>
				</div>
            </div>
			<p class="footer" align="right">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
          </div>
        </div>	