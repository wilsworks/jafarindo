<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class familys extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_content');
	}

	//function index()
	//{
		//$data['qty_month'] = '';
		//$this->menu_handler->set_menu('settings','Settings',$data,3,12);
	//}
	
	function familys_crud($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL familysS
					if($get_priviledge=='3'){

						$data['daftar'] = $this->mdl_content->get_all_familys_active();
						$this->menu_handler->set_menu('familys_list','familys',$data,1,1);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD familys
					if($get_priviledge=='3'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_familys'] = true;
						$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT familys
					if($get_priviledge=='3'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_familys = $this->mdl_content->get_familys($status[0]);
						$data['familys'] = $edit_familys[0];
						$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);
					} else {
						if($this->session->userdata('id')==$status[0]){
							$data['all_priviledge'] = $this->mdl_content->get_priviledge();
							$edit_familys = $this->mdl_content->get_familys($status[0]);
							$data['familys'] = $edit_familys[0];
							$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);					
						}else {
						$this->menu_handler->error();
						}
					} 	
					break;
			case 3: // UNTUK DELETE familys MASUK TRASH
					if($get_priviledge=='3'){
						$data['daftar'] = $this->mdl_content->get_all_familys_active();
					if ($status[0] == $this->session->userdata('id')) {
						$data['status'] = 'Sorry, familys account still logged on';
						$data['alert'] = 'alert alert-danger';
						$this->menu_handler->set_menu('familys_list','familys',$data,1,1);
					} else {
						$this->mdl_content->hapus_familys($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_familys_active();
						$data['status'] = 'Data has been deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('familys_list','familys',$data,1,1);
					}
				} else {
					$this->menu_handler->error();
				}
					break;
			case 4: // UNTUK TAMPILKAN TRASH familys
					if($get_priviledge=='3'){
						$data['daftar'] = $this->mdl_content->get_all_familys_deactive();
						$this->menu_handler->set_menu('familys_trash','familys Trash',$data,1,2);
					} elseif(in_array('2',$get_priviledge)){
						$data['daftar'] = $this->mdl_content->get_all_familys_deactive();
						$this->menu_handler->set_menu('familys_trash','familys Trash',$data,1,2);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK RESTORE familys
					if($get_priviledge=='3'){
						$this->mdl_content->restore_familys($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_familys_deactive();								
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('familys_trash','familys Trash',$data,1,2);
				} else {
					$this->menu_handler->error();
				}
					break;
			case 6: // UNTUK DELETE familys PERMANEN
					if($get_priviledge=='3'){
						$data['daftar'] = $this->mdl_content->get_all_familys_deactive();
					if ($status[0] == $this->session->userdata('id')) {
						$data['status'] = 'Sorry, familys account still logged on';
						$data['alert'] = 'alert alert-danger';
						$this->menu_handler->set_menu('familys_trash','familys Trash',$data,1,2);
					} else {
						$this->mdl_content->hapus_familys_permanen($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_familys_deactive();
						$data['status'] = 'familys has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('familys_trash','familys Trash',$data,1,2);
					}
				} else {
					$this->menu_handler->error();
				}
					break;
			
			default:
					if($get_priviledge=='3'){
						$data['daftar'] = $this->mdl_content->get_all_familys_active();
						$this->menu_handler->set_menu('familys_list','familys',$data,1,1);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}



	function detail_familys($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
		case 0: // UNTUK EDIT familys
			if($get_priviledge=='1'){
				$data['all_priviledge'] = $this->mdl_content->get_priviledge();
				$edit_familys = $this->mdl_content->get_familys($status[0]);
				$data['driver'] = $this->mdl_content->get_driver($status[0]);
				$data['vehicle'] = $this->mdl_content->get_vehicle($status[0]);
				$data['familys'] = $edit_familys[0];
				$this->menu_handler->set_menu('familys_detail_view','familys',$data,1,1);
			} else {
				if($this->session->userdata('id')==$status[0]){
					$data['all_priviledge'] = $this->mdl_content->get_priviledge();
					$edit_familys = $this->mdl_content->get_familys($status[0]);
					$data['familys'] = $edit_familys[0];
					$this->menu_handler->set_menu('familys_detail_view','familys',$data,1,1);					
				}else {
					$this->menu_handler->error();
				}
			} 	
			break;
		}
	}
	
	function add_familys(){
		$get_priviledge = $this->session->userdata('priviledge');
		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
		$data['new_familys'] = true;
		if($get_priviledge=='3'){
			$result = $this->mdl_content->add_familys();
			$data['daftar'] = $this->mdl_content->get_all_familys_active();
			if($result == 1){
					$data['daftar'] = $this->mdl_content->get_all_familys_active();
					$data['status'] = "familys has been added.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('familys_list','familys List',$data,1,1);
				} else if($result == 2){
					$data['status'] = "Sorry, familys name or Email has been used";
					$data['alert'] = 'alert alert-danger';
					$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);
				} else {
					$data['alert'] = 'alert alert-danger';
					$data['status'] = "Please check again!!!";
					$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);
				}
		} else {
			$this->menu_handler->error();
		}
	}
	
	function edit_familys($id_familys, $status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='3'){
			if($id_familys =='save'){
				$result = $this->mdl_content->edit_familys($this->input->post('id'));
				if($result==1){
					$data['daftar'] = $this->mdl_content->get_all_familys_active();
					$data['status'] = "familys data has been updated.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('familys_list','familys',$data,1,1);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-danger';
					$this->edit_familys($this->input->post('id'),$data);
				}
			} else if($id_familys =='save_detail'){
				
				$result = $this->mdl_content->edit_familys_detail($this->input->post('id'));
				$data['daftar'] = $this->mdl_content->get_all_familys_active();
				$data['status'] = "familys data has been updated.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('familys_list','familys',$data,1,1);
					
			}else{
				$edit_familys = $this->mdl_content->get_familys($this->input->post('id'));
				$data['familys'] = $edit_familys[0];
				$data['status'] = "Please check again!!!";
				$data['alert'] = 'alert alert-danger';
				$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);			
			}
		} else {
			$data['all_priviledge'] = $this->mdl_content->get_priviledge();
			$edit_familys = $this->mdl_content->get_familys($this->input->post('id'));
			$data['familys'] = $edit_familys[0];
			if($id_familys =='save'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_familys($this->input->post('id'),2);
					if($result==1){
						$edit_familys = $this->mdl_content->get_familys($this->input->post('id'));
						$data['familys'] = $edit_familys[0];
						$data['status'] = "familys data has been updated.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$this->edit_familys($this->input->post('id'),$data);
					}
				} else {
					$this->menu_handler->error();
				}
			} else if($id_familys =='save_detail'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_familys_detail($this->input->post('id'));
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_familys_active();
						$data['status'] = "familys data has been updated.";
						$data['alert'] = 'alert alert-success';
						$this->edit_familys($this->input->post('id'),$data);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$this->edit_familys($this->input->post('id'),$data);
						}
				} else {
					$this->menu_handler->error();
				}
			} else {
				$edit_familys = $this->mdl_content->get_familys($this->input->post('id'));
				$data['familys'] = $edit_familys[0];
				$this->menu_handler->set_menu('familys_detail','familys',$data,1,1);
			}
		}
	}
	
}