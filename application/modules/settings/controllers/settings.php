<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_content');
	}
	

	// USER MANAGEMENT
	function settings_crud($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL USERS
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$this->menu_handler->set_menu('user_list','User Management',$data,4,9);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD USER
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_user'] = true;
						$this->menu_handler->set_menu('user_detail','User Management',$data,4,9);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT USER
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_user = $this->mdl_content->get_user($status[0]);
						$data['user'] = $edit_user[0];
						$this->menu_handler->set_menu('user_detail','User Management',$data,4,9);
					} else {
						if($this->session->userdata('id')==$status[0]){
							$data['all_priviledge'] = $this->mdl_content->get_priviledge();
							$edit_user = $this->mdl_content->get_user($status[0]);
							$data['user'] = $edit_user[0];
							$this->menu_handler->set_menu('user_detail','User Management',$data,4,9);					
						}else {
						$this->menu_handler->error();
						}
					} 	
					break;
			case 3: // UNTUK DELETE USER MASUK TRASH
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
					if ($status[0] == $this->session->userdata('id')) {
						$data['status'] = 'Maaf User sedang digunakan';
						$data['alert'] = 'alert alert-danger';
						$this->menu_handler->set_menu('user_list','User Management',$data,4,9);
					} else {
						$this->mdl_content->hapus_user($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$data['status'] = 'Penghapusan data berhasil';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('user_list','User Management',$data,4,9);
					}
				} else {
					$this->menu_handler->error();
				}
					break;
			case 4: // UNTUK TAMPILKAN TRASH USER
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_user_deactive();
						$this->menu_handler->set_menu('user_trash','User Trash',$data,4,9);
					} elseif(in_array('2',$get_priviledge)){
						$data['daftar'] = $this->mdl_content->get_all_user_deactive();
						$this->menu_handler->set_menu('user_trash','User Trash',$data,4,9);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK RESTORE USER
					if($get_priviledge=='1'){
						$this->mdl_content->restore_user($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_user_deactive();								
						$data['status'] = 'Restore data berhasil';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('user_trash','User Trash',$data,4,9);
				} else {
					$this->menu_handler->error();
				}
					break;
			case 6: // UNTUK DELETE USER PERMANEN
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_user_deactive();
					if ($status[0] == $this->session->userdata('id')) {
						$data['status'] = 'Maaf User sedang digunakan';
						$data['alert'] = 'alert alert-danger';
						$this->menu_handler->set_menu('user_trash','User Trash',$data,4,9);
					} else {
						$this->mdl_content->hapus_user_permanen($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_user_deactive();
						$data['status'] = 'Penghapusan data berhasil';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('user_trash','User Trash',$data,4,9);
					}
				} else {
					$this->menu_handler->error();
				}
					break;
			
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$this->menu_handler->set_menu('user_list','User Management',$data,4,9);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}
	function add_user(){
		$get_priviledge = $this->session->userdata('priviledge');
		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
		$data['new_user'] = true;
		if($get_priviledge=='1'){
			$result = $this->mdl_content->add_user();
			$data['daftar'] = $this->mdl_content->get_all_user_active();
			if($result == 1){
					$data['daftar'] = $this->mdl_content->get_all_user_active();
					$data['status'] = "User has been added.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('user_list','User List',$data,4,9);
				} else if($result == 2){
					$data['status'] = "Sorry, Username or Email has been used";
					$data['alert'] = 'alert alert-danger';
					$this->menu_handler->set_menu('user_detail','User Management',$data,4,9);
				} else {
					$data['alert'] = 'alert alert-danger';
					$data['status'] = "Please check again!!!";
					$this->menu_handler->set_menu('user_detail','User Management',$data,4,9);
				}
		} else {
			$this->menu_handler->error();
		}
	}
	function edit_user($id_user, $status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			if($id_user =='save'){
				$result = $this->mdl_content->edit_user($this->input->post('id'));
				if($result==1){
					$data['daftar'] = $this->mdl_content->get_all_user_active();
					$data['status'] = "User has been changed.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('user_list','User Management',$data,4,9);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-error';
					$this->edit_user($this->input->post('id'),$data);
				}
			} else if($id_user =='save_detail'){
				
				$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
				$data['daftar'] = $this->mdl_content->get_all_user_active();
				$data['status'] = "User has been changed.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('user_list','User Management',$data,4,9);
					
			}else{
				$edit_user = $this->mdl_content->get_user($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','User Management',$data,3,13);			
			}
		} else {
			$data['all_priviledge'] = $this->mdl_content->get_priviledge();
			$edit_user = $this->mdl_content->get_user($this->input->post('id'));
			$data['user'] = $edit_user[0];
			if($id_user =='save'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user($this->input->post('id'),2);
					if($result==1){
						$edit_user = $this->mdl_content->get_user($this->input->post('id'));
						$data['user'] = $edit_user[0];
						$data['status'] = "User has been changed.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('user_detail','User Management',$data,4,9);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
					}
				} else {
					$this->menu_handler->error();
				}
			} else if($id_user =='save_detail'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$data['status'] = "User has been changed. :)";
						$data['alert'] = 'alert alert-success';
						$this->edit_user($this->input->post('id'),$data);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
						}
				} else {
					$this->menu_handler->error();
				}
			} else {
				$edit_user = $this->mdl_content->get_user($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','User Management',$data,4,9);
			}
		}
	}

	// WEBSITE GLOBAL SETTING
	function settings_profile($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL USERS
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_profile_setting();
						// print_r($data['daftar']);
						// die();
						// $data['edit_profile'] = false;
						// $dataweb = $data['daftar'];
						// foreach ($dataweb as $row){
						// 	$data[$row->profil]=$row->value;
						// }
						$data['sosmed']= $this->mdl_content->get_social_media();
						$this->menu_handler->set_menu('website_detail','Setting Website',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$this->menu_handler->set_menu('user_list','User Management',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}

	// CODE SOCIAL MEDIA MANAGEENT
	function settings_sosmed($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL SOSMED
					if($get_priviledge=='1'){
						$data['daftar']= $this->mdl_content->get_social_media();
						$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD SOSMED
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_user'] = true;
						$this->menu_handler->set_menu('sosmed_detail','Social Media',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT SOSMED
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_sosmed = $this->mdl_content->get_sosmed($status[0]);
						$data['sosmed'] = $edit_sosmed[0];
						$this->menu_handler->set_menu('sosmed_detail','Social Media',$data,4,10);
					} else{
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE SOSMED PERMANENT
					if($get_priviledge=='1'){
						$this->mdl_content->hapus_sosmed_permanen($status[0]);
						$data['daftar']= $this->mdl_content->get_social_media();
						$data['status'] = 'Penghapusan data berhasil';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('sosmed_list','Setting ',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			default:
					if($get_priviledge=='1'){
						$data['daftar']= $this->mdl_content->get_social_media();
						$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}
	function add_sosmed(){
		$get_priviledge = $this->session->userdata('priviledge');
		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
		$data['new_user'] = true;
		if($get_priviledge=='1'){
			$result = $this->mdl_content->add_sosmed();

			if($result == 1){
					$data['daftar']= $this->mdl_content->get_social_media();
					$data['status'] = "Social Media has been added.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
				} else if($result == 2){
					$data['status'] = "Sorry, name has been added on preview time";
					$data['alert'] = 'alert alert-danger';
					$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
				} else {
					$data['alert'] = 'alert alert-danger';
					$data['status'] = "Please check again!!!";
					$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
				}
		} else {
			$this->menu_handler->error();
		}
	}
	function edit_sosmed($id_user, $status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			if($id_user =='save'){
				$result = $this->mdl_content->edit_sosmed($this->input->post('id'));
				if($result==1){
					$data['status'] = "Social Media has been changed.";
					$data['alert'] = 'alert alert-success';
					$data['daftar']= $this->mdl_content->get_social_media();
					$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-error';
					$this->edit_sosmed($this->input->post('id'),$data);
				}
			} else if($id_user =='save_detail'){
				
				$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
				$data['daftar'] = $this->mdl_content->get_all_user_active();
				$data['status'] = "User has been changed.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('sosmed_list','User Management',$data,4,10);
					
			}else{
				$edit_sosmed = $this->mdl_content->get_sosmed($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','Social Media',$data,4,10);			
			}
		} else {
			$data['all_priviledge'] = $this->mdl_content->get_priviledge();
			$edit_user = $this->mdl_content->get_user($this->input->post('id'));
			$data['user'] = $edit_user[0];
			if($id_user =='save'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user($this->input->post('id'),2);
					if($result==1){
						$edit_user = $this->mdl_content->get_user($this->input->post('id'));
						$data['user'] = $edit_user[0];
						$data['status'] = "User has been changed.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
					}
				} else {
					$this->menu_handler->error();
				}
			} else if($id_user =='save_detail'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$data['status'] = "User has been changed. :)";
						$data['alert'] = 'alert alert-success';
						$this->edit_user($this->input->post('id'),$data);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
						}
				} else {
					$this->menu_handler->error();
				}
			} else {
				$edit_user = $this->mdl_content->get_user($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
			}
		}
	}

	// CODE CONTACT MANAGEENT
	function settings_contact($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL SOSMED
					if($get_priviledge=='1'){
						$data['daftar']= $this->mdl_content->get_contact_all();
						$this->menu_handler->set_menu('contact_list','Contact',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD SOSMED
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_user'] = true;
						$this->menu_handler->set_menu('contact_detail','Contact',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT SOSMED
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_contact = $this->mdl_content->get_contact($status[0]);
						$data['contact'] = $edit_contact[0];
						$this->menu_handler->set_menu('contact_detail','Contact',$data,4,10);
					} else{
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE SOSMED PERMANENT
					if($get_priviledge=='1'){
						$this->mdl_content->hapus_contact_permanen($status[0]);
						$data['daftar']= $this->mdl_content->get_contact_all();
						$data['status'] = 'Penghapusan data berhasil';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('contact_list','Contact ',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			default:
					if($get_priviledge=='1'){
						$data['daftar']= $this->mdl_content->get_social_media();
						$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}
	function add_contact(){
		$get_priviledge = $this->session->userdata('priviledge');
		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
		$data['new_user'] = true;
		if($get_priviledge=='1'){
			$result = $this->mdl_content->add_contact();

			if($result == 1){
					$data['daftar']= $this->mdl_content->get_contact_all();
					$data['status'] = "Contcat has been added.";
					$data['alert'] = 'alert alert-success';
					$this->menu_handler->set_menu('contact_list','Contact',$data,3,12);
				} else if($result == 2){
					$data['status'] = "Sorry, name has been added on preview time";
					$data['alert'] = 'alert alert-danger';
					$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
				} else {
					$data['alert'] = 'alert alert-danger';
					$data['status'] = "Please check again!!!";
					$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
				}
		} else {
			$this->menu_handler->error();
		}
	}
	function edit_contact($id_user, $status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			if($id_user =='save'){
				$result = $this->mdl_content->edit_contact($this->input->post('id'));
				if($result==1){
					$data['status'] = "Contact has been changed.";
					$data['alert'] = 'alert alert-success';
					$data['daftar']= $this->mdl_content->get_contact_all();
					$this->menu_handler->set_menu('contact_list','Contact',$data,4,10);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-error';
					$this->edit_contact($this->input->post('id'),$data);
				}
			} else if($id_user =='save_detail'){
				
				$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
				$data['daftar'] = $this->mdl_content->get_all_user_active();
				$data['status'] = "User has been changed.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('sosmed_list','User Management',$data,4,10);
					
			}else{
				$edit_sosmed = $this->mdl_content->get_sosmed($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','Social Media',$data,4,10);			
			}
		} else {
			$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
				$data['daftar'] = "";
				$data['status'] = "User has been changed.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('sosmed_list','User Management',$data,4,10);
		}
	}


	// EDIT GLOBAT DETAIL
	function settings_global(){
		$get_priviledge = $this->session->userdata('priviledge');
		 // FOR SHOW ALL GLOBAL
		if($get_priviledge=='1'){
			$data['global']= $this->mdl_content->get_all_profile_setting();
			$this->menu_handler->set_menu('global_detail','Global',$data,4,10);
		} else {
			$this->menu_handler->error();
		}
	}

	function edit_global($id_user, $status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			if($id_user =='save'){
				$result = $this->mdl_content->edit_sosmed($this->input->post('id'));
				if($result==1){
					$data['status'] = "Social Media has been changed.";
					$data['alert'] = 'alert alert-success';
					$data['daftar']= $this->mdl_content->get_social_media();
					$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-error';
					$this->edit_sosmed($this->input->post('id'),$data);
				}
			} else if($id_user =='save_detail'){
				
				$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
				$data['daftar'] = $this->mdl_content->get_all_user_active();
				$data['status'] = "User has been changed.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('sosmed_list','User Management',$data,4,10);
					
			}else{
				$edit_sosmed = $this->mdl_content->get_sosmed($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','Social Media',$data,4,10);			
			}
		} else {
			$data['all_priviledge'] = $this->mdl_content->get_priviledge();
			$edit_user = $this->mdl_content->get_user($this->input->post('id'));
			$data['user'] = $edit_user[0];
			if($id_user =='save'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user($this->input->post('id'),2);
					if($result==1){
						$edit_user = $this->mdl_content->get_user($this->input->post('id'));
						$data['user'] = $edit_user[0];
						$data['status'] = "User has been changed.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
					}
				} else {
					$this->menu_handler->error();
				}
			} else if($id_user =='save_detail'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$data['status'] = "User has been changed. :)";
						$data['alert'] = 'alert alert-success';
						$this->edit_user($this->input->post('id'),$data);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
						}
				} else {
					$this->menu_handler->error();
				}
			} else {
				$edit_user = $this->mdl_content->get_user($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
			}
		}
	}



	// CODE SLIDER MANAGEENT
	function settings_slider($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL SOSMED
					if($get_priviledge=='1'){
						$data['daftar']= $this->mdl_content->get_slider_all();
						$this->menu_handler->set_menu('slider_list','Slider',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD SOSMED
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_user'] = true;
						$this->menu_handler->set_menu('sosmed_detail','Social Media',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT SOSMED
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_sosmed = $this->mdl_content->get_sosmed($status[0]);
						$data['sosmed'] = $edit_sosmed[0];
						$this->menu_handler->set_menu('sosmed_detail','Social Media',$data,4,10);
					} else{
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE SOSMED PERMANENT
					if($get_priviledge=='1'){
						$this->mdl_content->hapus_sosmed_permanen($status[0]);
						$data['daftar']= $this->mdl_content->get_social_media();
						$data['status'] = 'Penghapusan data berhasil';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('sosmed_list','Setting ',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
			default:
					if($get_priviledge=='1'){
						$data['daftar']= $this->mdl_content->get_social_media();
						$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}
	
	function edit_slider($id_user, $status=''){
		$get_priviledge = $this->session->userdata('priviledge');
		if($get_priviledge=='1'){
			if($id_user =='save'){
				$result = $this->mdl_content->edit_sosmed($this->input->post('id'));
				if($result==1){
					$data['status'] = "Social Media has been changed.";
					$data['alert'] = 'alert alert-success';
					$data['daftar']= $this->mdl_content->get_social_media();
					$this->menu_handler->set_menu('sosmed_list','Social Media',$data,4,10);
				} else {
					$data['status'] = "Please check again!!!";
					$data['alert'] = 'alert alert-error';
					$this->edit_sosmed($this->input->post('id'),$data);
				}
			} else if($id_user =='save_detail'){
				
				$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
				$data['daftar'] = $this->mdl_content->get_all_user_active();
				$data['status'] = "User has been changed.";
				$data['alert'] = 'alert alert-success';
				$this->menu_handler->set_menu('sosmed_list','User Management',$data,4,10);
					
			}else{
				$edit_sosmed = $this->mdl_content->get_sosmed($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','Social Media',$data,4,10);			
			}
		} else {
			$data['all_priviledge'] = $this->mdl_content->get_priviledge();
			$edit_user = $this->mdl_content->get_user($this->input->post('id'));
			$data['user'] = $edit_user[0];
			if($id_user =='save'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user($this->input->post('id'),2);
					if($result==1){
						$edit_user = $this->mdl_content->get_user($this->input->post('id'));
						$data['user'] = $edit_user[0];
						$data['status'] = "User has been changed.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
					}
				} else {
					$this->menu_handler->error();
				}
			} else if($id_user =='save_detail'){
				if (($this->input->post('id')) == ($this->session->userdata('id'))){
					$result = $this->mdl_content->edit_user_detail($this->input->post('id'));
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_user_active();
						$data['status'] = "User has been changed. :)";
						$data['alert'] = 'alert alert-success';
						$this->edit_user($this->input->post('id'),$data);
					} else {
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-error';
						$this->edit_user($this->input->post('id'),$data);
						}
				} else {
					$this->menu_handler->error();
				}
			} else {
				$edit_user = $this->mdl_content->get_user($this->input->post('id'));
				$data['user'] = $edit_user[0];
				$this->menu_handler->set_menu('user_detail','User Management',$data,4,10);
			}
		}
	}



	
}