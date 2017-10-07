<link rel="stylesheet" href="<?php echo base_url(); ?>themesAdmin/plugins/datepicker/datepicker3.css">
<link href="<?php echo base_url(); ?>themesFront/css/prettyPhoto.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>themes/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,|,ltr,rtl,|,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		content_css : "<?php echo base_url(); ?>themes/tinymce/examples/css/word.css",
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "<?php echo base_url(); ?>themes/tinymce/examples/lists/template_list.js",
		external_link_list_url : "<?php echo base_url(); ?>themes/tinymce/examples/lists/link_list.js",
		external_image_list_url : "<?php echo base_url(); ?>themes/tinymce/examples/lists/image_list.js",
		media_external_list_url : "<?php echo base_url(); ?>themes/tinymce/examples/lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <?php echo $title; ?>
    <small><?php if(isset($new_data)) { echo '<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Add News'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit News'; } ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('settings/settings_crud/0-0')?>" tooltip="Goto Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url('data/data_crud/0-0')?>"><?php echo $title; ?></a></li>
        <li class="active"><?php if(isset($new_data)) { echo '<i class="fa fa-plus"></i>&nbsp;&nbsp;Add News'; } else { echo '<i class="fa fa-edit"></i>&nbsp;&nbsp;Edit data'; } ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	    <!-- TABLE: LATEST ORDERS -->
            <div class="box box-primary">	
                <div class="box-header with-border">
                  <h3 class="box-title">Detail News</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
	                <?php	if(@$status){ ?>
					<div class="<?php echo $alert; ?> alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $status; ?>
					</div>
					<?php } ?>
                 
                 	<?php
						if(isset($new_data)) {
							echo form_open_multipart('stories/add_stories','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'new_data'=>true
							);
							echo form_hidden($hidden_data_user);
						} else {
							echo form_open_multipart('stories/edit_stories','class="form-horizontal" role="form"');
							$hidden_data_user = array(
								'id' => $data->story_id,
								'new_data'=> false
								
							);
							echo form_hidden($hidden_data_user);
						}
					?>



							
					<div class="form-group">
						<label class="col-sm-2 control-label">Title</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" placeholder="Title"  name="title" <?php if(!isset($new_data)){ echo 'value="'.$data->title.'"'; } ?> autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-5">
							<textarea type="text" class="form-control"  placeholder="Content of Data" name="description" ><?php if(!isset($new_data)){ echo $data->description; } ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Start Story</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" autocomplete="off" placeholder="Start date" id="dateStartPicker" name="start_date" <?php if(!isset($new_data)){ 
								$fStartDate = date("m/d/Y", strtotime($data->start_date));
								echo 'value="'.$fStartDate.'"'; 
								} ?> >
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">End Story</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" autocomplete="off" placeholder="End date"  id="dateEndPicker" name="end_date" <?php if(!isset($new_data)){ 
								$fEndDate = date("m/d/Y", strtotime($data->end_date));
								echo 'value="'.$fEndDate.'"'; 
								} ?> >
						</div>
					</div>

					<!-- button save new data -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;
							<?php if(!isset($new_data)){ ?>
							<button type='button' class="btn btn-danger" data-toggle="modal" data-target="#deleteMessage" > Delete</button>
							<?php } else{ ?>
							<button type="reset" class="btn btn-danger "> Clear</button>
							<?php } ?>
						</div>
					</div>

					


					<?php if(!isset($new_data)){ ?>
					<div class="modal modal-warning fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								</div>
								<div class="modal-body">
									<p class="error-text"><i class="fa fa-exclamation-triangle fa-2x"></i> Are you sure you want to delete the highlight?</p>
								</div>
								<div class="modal-footer">
				                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
				                    <a href="<?php echo site_url('highlights/highlight_crud/'.$data->id.'-3'); ?>"><button type="button" class="btn btn-outline">Delete</button></a>
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


<script type="text/javascript">
if (document.location.protocol == 'file:') {
	alert("The examples might not work properly on the local file system due to security settings in your browser. Please use a real webserver.");
}
</script>
<script src="<?php echo base_url(); ?>themesAdmin/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>themesFront/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url(); ?>themesFront/js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url(); ?>themesFront/js/main.js"></script>



