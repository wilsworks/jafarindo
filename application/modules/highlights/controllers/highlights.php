<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class highlights extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_content');
	}
	

	function highlight_crud($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL news_configS
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_highlight_active();
						$this->menu_handler->set_menu('highlight_list','Highlights',$data,1,1);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD data
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_highlight'] = true;
						$this->menu_handler->set_menu('highlight_detail','Highlights',$data,1,1);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT data
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_data = $this->mdl_content->get_highlight($status[0]);
						$data['data'] = $edit_data[0];
						$this->menu_handler->set_menu('highlight_detail','Highlights',$data,1,1);
					} else {
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE data MASUK TRASH
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_highlight_active();
						$this->mdl_content->delete_highlight($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_highlight_active();
						$data['status'] = 'Data has been deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('highlight_list','Highlights',$data,1,1);

					}else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH data
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_highlight_deactive();
						$this->menu_handler->set_menu('highlight_trash','Highlight Trash',$data,1,2);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK RESTORE data
					if($get_priviledge=='1'){
						$this->mdl_content->restore_highlight($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_highlight_deactive();								
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('highlight_trash','Highlights Trash',$data,1,2);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 6: // UNTUK DELETE data PERMANEN
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_highlight_deactive();
						$this->mdl_content->delete_highlight_permanent($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_highlight_deactive();
						$data['status'] = 'Data has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('highlight_trash','Highlights Trash',$data,1,2);
					}else {
						$this->menu_handler->error();
					}
					break;
			
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_highlight_active();
						$this->menu_handler->set_menu('highlight_list','Highlights',$data,1,1);
					}else {
						$this->menu_handler->error();
					}
					break;
		}
	}

	

	
	function add_highlight(){
		$get_priviledge = $this->session->userdata('priviledge');
		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
		$data['new_highlight'] = true;
		if($get_priviledge=='1'){
			$result = $this->mdl_content->add_highlight();
			$data['daftar'] = $this->mdl_content->get_all_highlight_active();
			if($result == 1){
				$data['daftar'] = $this->mdl_content->get_all_highlight_active();
				$data['status'] = "Data has been added.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('highlight_list','Highlights',$data,1,1);
			} else if($result == 2){
				$data['status'] = "Sorry, Title has been used";
				$data['alert'] = 'alert alert-danger';
				$this->menu_handler->set_menu('highlight_detail','Highlights',$data,1,1);
			} else {
				$data['alert'] = 'alert alert-danger';
				$data['status'] = "Please check again!!!";
				$this->menu_handler->set_menu('highlight_detail','Highlights',$data,1,1);
			}
		}  else {
			$this->menu_handler->error();
		}
	}
	
	function edit_highlight($status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			$result = $this->mdl_content->edit_highlight($this->input->post('id'));
			if($result==1){
				$data['daftar'] = $this->mdl_content->get_all_highlight_active();
				$data['status'] = "Data has been updated.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('highlight_list','Highlights',$data,1,1);
			} else {
				$data['status'] = "Please check again!!!";
				$data['alert'] = 'alert alert-danger';
				$this->edit_news_config($this->input->post('id'),$data);
				$this->menu_handler->set_menu('news_config_detail','data',$data,1,1);
			}
		}else {
			$this->menu_handler->error();
		}
	}
}