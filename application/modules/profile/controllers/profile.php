<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

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
	
	function profile_crud($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL profileS
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_profile_active();
						$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
					}else if($get_priviledge=='3') {
						$data['user'] = $this->mdl_content->get_user();
						$profile = $this ->mdl_content->get_profile();
						if($profile ){
							$data['profile'] = $profile[0];
							
						}
						
						$this->menu_handler->set_menu('profile_list','profile',$data,4,7);

					} else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD profile
					if($get_priviledge=='3'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_profile'] = true; 
						$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
					} else if ($get_priviledge=='3'){
						$daftarId = $this->session->userdata('idChild');
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_profile'] = true;
						$this->menu_handler->set_menu('profile_detail_partner','profile',$data,4,7);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT profile
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_profile = $this->mdl_content->get_profile($status[0]);
						$data['profile'] = $edit_profile[0];
						$data['all_partner']=$this->mdl_content->get_all_partner();
						$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
					}else if($get_priviledge=='3'){ 
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_profile = $this->mdl_content->get_profile();
						$data['profile'] = $edit_profile[0];
						$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
					} else {
						if($this->session->userdata('id')==$status[0]){
							$data['all_priviledge'] = $this->mdl_content->get_priviledge();
							$edit_profile = $this->mdl_content->get_profile();
							$data['all_partner']=$this->mdl_content->get_all_partner();
							$data['profile'] = $edit_profile[0];
							$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);					
						}else {
						$this->menu_handler->error();
						}
					} 	
					break;
			case 3: // UNTUK DELETE profile MASUK TRASH
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_profile_active();
						$dataprofile = $this->mdl_content->get_profile($status[0]);

						if ($dataprofile[0]->loginStatus=='A') {
							$data['status'] = 'Sorry, profile account still logged on';
							$data['alert'] = 'alert alert-danger';
							$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
						} else {
							$this->mdl_content->hapus_profile($status[0]);
							$data['daftar'] = $this->mdl_content->get_all_profile_active();
							$data['status'] = 'Data has been deleted';
							$data['alert'] = 'alert alert-success';
							$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
						}
					} else if($get_priviledge=='3'){
						$daftarId = $this->session->userdata('idChild');
						$data['daftar'] = $this->mdl_content->get_all_profile_active_partner($daftarId);
						$dataprofile = $this->mdl_content->get_profile($status[0]);

						if ($dataprofile[0]->loginStatus=='A') {
							$data['status'] = 'Sorry, profile account still logged on';
							$data['alert'] = 'alert alert-danger';
							$this->menu_handler->set_menu('profile_list_partner','profile',$data,4,7);
						} else {
							$this->mdl_content->hapus_profile($status[0]);
							$data['daftar'] = $this->mdl_content->get_all_profile_active_partner($daftarId);
							$data['status'] = 'Data has been deleted';
							$data['alert'] = 'alert alert-success';
							$this->menu_handler->set_menu('profile_list_partner','profile',$data,4,7);
						}
					}else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH profile
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive();
						$this->menu_handler->set_menu('profile_trash','profile Trash',$data,4,8);
					} else if($get_priviledge =='3'){
						$daftarId = $this->session->userdata('idChild');
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive_partner($daftarId);
						$this->menu_handler->set_menu('profile_trash_partner','profile Trash',$data,4,8);
					}else if(in_array('2',$get_priviledge)){
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive();
						$this->menu_handler->set_menu('profile_trash','profile Trash',$data,4,8);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK RESTORE profile
					if($get_priviledge=='1'){
						$this->mdl_content->restore_profile($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive();								
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('profile_trash','profile Trash',$data,4,8);
					} else if($get_priviledge=='3'){
						$daftarId = $this->session->userdata('idChild');
						$this->mdl_content->restore_profile($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive_partner ($daftarId);				
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('profile_trash_partner','profile Trash',$data,4,8);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 6: // UNTUK DELETE profile PERMANEN
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive();
						$this->mdl_content->hapus_profile_permanen($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive();
						$data['status'] = 'profile has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('profile_trash','profile Trash',$data,4,8);
					} else if($get_priviledge=='3'){
						$daftarId = $this->session->userdata('idChild');
						$this->mdl_content->hapus_profile_permanen($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_profile_deactive_partner($daftarId);
						$data['status'] = 'profile has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('profile_trash_partner','profile Trash',$data,4,8);
					} else {
						$this->menu_handler->error();
					}
					break;
			
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_profile_active();
						$this->menu_handler->set_menu('profile_list','profile',$data,4,8);
					}else if($get_priviledge=='3'){
						$daftarId = $this->session->userdata('idChild');
						$data['daftar'] = $this->mdl_content->get_all_profile_active_partner ($daftarId);
						$this->menu_handler->set_menu('profile_list_partner','profile',$data,4,8);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}
	
	function add_profile(){
		$get_priviledge = $this->session->userdata('priviledge');

		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
		$data['new_profile'] = true;
		if($get_priviledge=='1'){
			$result = $this->mdl_content->add_profile();
			$data['daftar'] = $this->mdl_content->get_all_profile_active();
			if($result == 1){
					$data['daftar'] = $this->mdl_content->get_all_profile_active();
					$data['status'] = "profile has been added.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('profile_list','profile List',$data,4,7);
				} else if($result == 2){
					$data['status'] = "Sorry, profile name or Email has been used";
					$data['alert'] = 'alert alert-danger';
					$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
				} else {
					$data['alert'] = 'alert alert-danger';
					$data['status'] = "Please check again!!!";
					$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
				}
		} else if($get_priviledge=='3'){
			$result = $this->mdl_content->add_profile_siswa();
			if($result == 1){
				$data['user'] = $this->mdl_content->get_user();
				$profile = $this ->mdl_content->get_profile();
				if($profile ){
					$data['profile'] = $profile[0];
				}
				$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
			} else {
				$data['alert'] = 'alert alert-danger';
				$data['status'] = "Please check again!!!";
				$data['all_priviledge'] = $this->mdl_content->get_priviledge();
				$data['new_profile'] = true; 
				$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
			}
		} else {
			$this->menu_handler->error();
		}
	}

	
	
	function edit_profile($id_profile, $status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			if($id_profile =='save'){
				$result = $this->mdl_content->edit_profile($this->input->post('id'));
				if($result==1){
					$data['daftar'] = $this->mdl_content->get_all_profile_active();
					$data['status'] = "profile data has been updated.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-danger';
					$data['all_partner']=$this->mdl_content->get_all_partner();
					$this->edit_profile($this->input->post('id'),$data);
				}
			} else if($id_profile =='save_detail'){
				
				$result = $this->mdl_content->edit_profile_detail($this->input->post('id'));
				$data['daftar'] = $this->mdl_content->get_all_profile_active();
				$data['status'] = "profile data has been updated.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
					
			}else{
				$edit_profile = $this->mdl_content->get_profile($this->input->post('id'));
				$data['profile'] = $edit_profile[0];
				$data['status'] = "Please check again!!!";
				$data['alert'] = 'alert alert-danger';
				$data['all_partner']=$this->mdl_content->get_all_partner();
				$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);			
			}
		} else if($get_priviledge=='3'){

			// if($result == 1){
			// 	$data['user'] = $this->mdl_content->get_user();
			// 	$profile = $this ->mdl_content->get_profile();
			// 	if($profile ){
			// 		$data['profile'] = $profile[0];
			// 	}
			// 	$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
			// } else {
			// 	$data['alert'] = 'alert alert-danger';
			// 	$data['status'] = "Please check again!!!";
			// 	$data['all_priviledge'] = $this->mdl_content->get_priviledge();
			// 	$data['new_profile'] = true; 
			// 	$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
			// }


			if($id_profile =='save'){
				$daftarId = $this->session->userdata('idChild');
				$result = $this->mdl_content->edit_profile($this->input->post('id'));
				if($result==1){
					$data['status'] = "profile data has been updated.";
					$data['alert'] = 'alert alert-success';
					$data['user'] = $this->mdl_content->get_user();
					$profile = $this ->mdl_content->get_profile();
					if($profile ){
						$data['profile'] = $profile[0];
					}
					$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-danger';
					$this->edit_profile($this->input->post('id'),$data);
				}
			} else if($id_profile =='save_detail'){
				$data['status'] = "profile data has been updated.";
				$data['alert'] = 'alert alert-success';
				$data['user'] = $this->mdl_content->get_user();
				$profile = $this ->mdl_content->get_profile();
				if($profile ){
					$data['profile'] = $profile[0];
				}
				$this->menu_handler->set_menu('profile_list','profile',$data,4,7);
					
			}else{
				$edit_profile = $this->mdl_content->get_profile($this->input->post('id'));
				$data['profile'] = $edit_profile[0];
				$data['status'] = "Please check again!!!";
				$data['alert'] = 'alert alert-danger';
				$this->menu_handler->set_menu('profile_detail_partner','profile',$data,4,7);			
			}
		}else {
			$data['all_priviledge'] = $this->mdl_content->get_priviledge();
			$edit_profile = $this->mdl_content->get_profile($this->input->post('id'));
			$data['profile'] = $edit_profile[0];
			if($id_profile =='save'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_profile($this->input->post('id'),2);
					if($result==1){
						$edit_profile = $this->mdl_content->get_profile($this->input->post('id'));
						$data['profile'] = $edit_profile[0];
						$data['status'] = "profile data has been updated.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$this->edit_profile($this->input->post('id'),$data);
					}
				} else {
					$this->menu_handler->error();
				}
			} else if($id_profile =='save_detail'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_profile_detail($this->input->post('id'));
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_profile_active();
						$data['status'] = "profile data has been updated.";
						$data['alert'] = 'alert alert-success';
						$this->edit_profile($this->input->post('id'),$data);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$data['all_partner']=$this->mdl_content->get_all_partner();
						$this->edit_profile($this->input->post('id'),$data);
						}
				} else {
					$this->menu_handler->error();
				}
			} else {
				$edit_profile = $this->mdl_content->get_profile($this->input->post('id'));
				$data['profile'] = $edit_profile[0];
				$this->menu_handler->set_menu('profile_detail','profile',$data,4,7);
			}
		}
	}
	
}