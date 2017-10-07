<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stories extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_content');
	}
	

	function stories_crud($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL news_configS
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_stories_active();
						$this->menu_handler->set_menu('data_list','Stories',$data,2,3);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD data
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_data'] = true;
						$this->menu_handler->set_menu('data_detail','Stories',$data,2,3);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT data
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_data = $this->mdl_content->get_stories($status[0]);
						$data['data'] = $edit_data[0];
						$this->menu_handler->set_menu('data_detail','Stories',$data,2,3);
					} else {
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE data MASUK TRASH
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_stories_active();
						$this->mdl_content->delete_stories($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_stories_active();
						$data['status'] = 'Data has been deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('data_list','Stories',$data,2,3);

					}else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH data
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_stories_deactive();
						$this->menu_handler->set_menu('data_trash','Stories Trash',$data,2,4);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK RESTORE data
					if($get_priviledge=='1'){
						$this->mdl_content->restore_stories($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_stories_deactive();								
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('data_trash','Stories Trash',$data,2,4);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 6: // UNTUK DELETE data PERMANEN
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_stories_deactive();
						$this->mdl_content->delete_stories_permanent($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_stories_deactive();
						$data['status'] = 'Data has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('data_trash','Stories Trash',$data,2,4);
					}else {
						$this->menu_handler->error();
					}
					break;
			
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_stories_active();
						$this->menu_handler->set_menu('data_list','Stories',$data,2,3);
					}else {
						$this->menu_handler->error();
					}
					break;
		}
	}

	

	
	function add_stories(){
		$get_priviledge = $this->session->userdata('priviledge');
		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
		$data['new_data'] = true;
		if($get_priviledge=='1'){
			$result = $this->mdl_content->add_stories();
			$data['daftar'] = $this->mdl_content->get_all_stories_active();
			if($result == 1){
				$data['daftar'] = $this->mdl_content->get_all_stories_active();
				$data['status'] = "Data has been added.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('data_list','Stories',$data,2,3);
			} else if($result == 2){
				$data['status'] = "Sorry, Title has been used";
				$data['alert'] = 'alert alert-danger';
				$this->menu_handler->set_menu('data_detail','Stories',$data,2,3);
			} else {
				$data['alert'] = 'alert alert-danger';
				$data['status'] = "Please check again!!!";
				$this->menu_handler->set_menu('data_detail','Stories',$data,2,3);
			}
		}  else {
			$this->menu_handler->error();
		}
	}
	
	function edit_stories($status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			$result = $this->mdl_content->edit_stories($this->input->post('id'));
			if($result==1){
				$data['daftar'] = $this->mdl_content->get_all_stories_active();
				$data['status'] = "Data has been updated.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('data_list','Stories',$data,2,3);
			} else {
				$data['status'] = "Please check again!!!";
				$data['alert'] = 'alert alert-danger';
				$this->edit_news_config($this->input->post('id'),$data);
				$this->menu_handler->set_menu('data_detail','data',$data,2,3);
			}
		}else {
			$this->menu_handler->error();
		}
	}
}