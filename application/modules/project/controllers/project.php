<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class project extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_content');
		
	}

	function photography($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL drivers
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$this->menu_handler->set_menu('photo_list','photography',$data,2,3);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD photo
					if($get_priviledge=='1'){
						$data['category'] ='P';
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_project'] = true;
						$this->menu_handler->set_menu('photo_detail','photography',$data,2,3);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT photo
					if($get_priviledge=='1'){
						$data['category'] ='P';
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_project = $this->mdl_content->get_project($status[0]);
						$data['project'] = $edit_project[0];
						$this->menu_handler->set_menu('photo_detail','photography',$data,2,3);
					} else {
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE photo MASUK TRASH
					if($get_priviledge=='1'){
						$this->mdl_content->delete_project($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$data['status'] = 'Data has been deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('photo_list','photography',$data,2,3);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH photo
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_deactive();
						$this->menu_handler->set_menu('photo_trash','photography',$data,2,3);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK photo 
					if($get_priviledge=='1'){
						$this->mdl_content->restore_project($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_photography_deactive();
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('photo_trash','photography',$data,2,3);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 6: // UNTUK DELETE photo PERMANEN
					if($get_priviledge=='1'){
						$this->mdl_content->delete_project_permanent($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_photography_deactive();
						$data['status'] = 'Data has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('photo_trash','photography',$data,2,3);
					} else {
						$this->menu_handler->error();
					}
					break;
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$this->menu_handler->set_menu('photo_list','photography',$data,2,3);
					}else {
						$this->menu_handler->error();
					}
					break;
		}
	}
	
	
	



	// PROJECT
	function infographic($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL driverS
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_infograph_active();
						$this->menu_handler->set_menu('info_list','Infographic',$data,2,4);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD photo
					if($get_priviledge=='1'){
						$data['category'] ='I';
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_project'] = true;
						$this->menu_handler->set_menu('info_detail','Infographic',$data,2,4);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT photo
					if($get_priviledge=='1'){
						$data['category'] ='I';
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_project = $this->mdl_content->get_project($status[0]);
						$data['project'] = $edit_project[0];
						$this->menu_handler->set_menu('info_detail','Infographic',$data,2,4);
					} else {
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE photo MASUK TRASH
					if($get_priviledge=='1'){
						$this->mdl_content->delete_project($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_infograph_active();
						$data['status'] = 'Data has been deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('info_list','Infographic',$data,2,4);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH photo
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_infograph_deactive();
						$this->menu_handler->set_menu('info_trash','Infographic',$data,2,4);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK photo 
					if($get_priviledge=='1'){
						$this->mdl_content->restore_project($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_infograph_deactive();
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('info_trash','Infographic',$data,2,4);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 6: // UNTUK DELETE photo PERMANEN
					if($get_priviledge=='1'){
						$this->mdl_content->delete_project_permanent($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_infograph_deactive();
						$data['status'] = 'Data has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('info_trash','Infographic',$data,2,4);
					} else {
						$this->menu_handler->error();
					}
					break;
			
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_infograph_active();
						$this->menu_handler->set_menu('info_list','Infographic',$data,2,4);
					}else {
						$this->menu_handler->error();
					}
					break;
				
		}
	}




	// PROJECT VIDEO
	function videograph($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL driverS
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_videograph_active();
						$this->menu_handler->set_menu('video_list','Videographic',$data,2,5);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD photo
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_project'] = true;
						$data['category'] ='V';
						$this->menu_handler->set_menu('video_detail','Videographic',$data,2,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 2: // UNTUK EDIT photo
					if($get_priviledge=='1'){
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$edit_project = $this->mdl_content->get_project($status[0]);
						$data['project'] = $edit_project[0];
						$this->menu_handler->set_menu('video_detail','Videographic',$data,2,5);
					} else {
						$this->menu_handler->error();
					} 	
					break;
			case 3: // UNTUK DELETE photo MASUK TRASH
					if($get_priviledge=='1'){
						$this->mdl_content->delete_project($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_videograph_active();
						$data['status'] = 'Data has been deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('video_list','Videographic',$data,2,5);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH photo
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_videograph_deactive();
						$this->menu_handler->set_menu('video_trash','Videographic',$data,2,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 5: // UNTUK photo 
					if($get_priviledge=='1'){
						$this->mdl_content->restore_project($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_videograph_deactive();
						$data['status'] = 'Data has been restored';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('video_trash','Videographic',$data,2,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 6: // UNTUK DELETE photo PERMANEN
					if($get_priviledge=='1'){
						$this->mdl_content->delete_project_permanent($status[0]);
						$data['daftar'] = $this->mdl_content->get_all_videograph_deactive();
						$data['status'] = 'Data has been permanently deleted';
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('video_trash','Videographic',$data,2,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_videograph_active();
						$this->menu_handler->set_menu('video_list','Infographic',$data,2,5);
					}else {
						$this->menu_handler->error();
					}
					break;
				
		}
	}
	
	
	public function do_upload(){
		$category = $_POST['category'];
		$new_project = $_POST['new_project'];
		if($category == 'P'){
			$imgName = 'img_'.$category.'_'.time().'.jpg';
			$pathpro = 'photo';
		}else if($category == 'I'){
			$imgName = 'img_'.$category.'_'.time().'.jpg';
			$pathpro = 'info';
		}

		$config['file_name']			= $imgName;
        $config['upload_path']          = FCPATH.'data/project/'.$pathpro.'/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;
        $config['max_size']             = 10000;
        $config['max_width']            = 2048;
        $config['max_height']           = 2048;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            $data['status']=$error['error'];
			$data['alert'] = 'alert alert-danger';
			$data['category'] =$category;
			$data['new_project'] = $new_project;
			$this->menu_handler->set_menu('photo_detail','photography',$data,2,3);
        } else{
            $data = array('upload_data' => $this->upload->data());
			if($data){	
				if($new_project==true){  // ADD PROJECT
					$result = $this->mdl_content->add_project($imgName);
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$data['status'] = "Data has been added.";
						$data['alert'] = 'alert alert-success';
						if($category=='P'){
							$this->menu_handler->set_menu('photo_list','photography',$data,2,3);
						}else if($category=='I'){
							$this->menu_handler->set_menu('info_list','Infographic',$data,2,4);
						}
						
					} else { 
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$data['category'] =$category;
						$data['new_project'] = $new_project;
						$this->menu_handler->set_menu('photo_detail','photography',$data,2,3);
					}
				}else{	// EDIT PROJECT
					$result = $this->mdl_content->edit_project($imgName);
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$data['status'] = "Data has been edited.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('photo_list','photography',$data,2,3);
					} else { 
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$data['category'] =$category;
						$data['new_project'] = $new_project;
						$this->menu_handler->set_menu('photo_detail','photography',$data,2,3);
					}

				}
				
			}
        }
    }


    // function add_driver(){
	// 	$get_priviledge = $this->session->userdata('priviledge');
	// 	$data['all_priviledge'] = $this->mdl_content->get_priviledge();
	// 	$data['new_driver'] = true;
	// 	if($get_priviledge=='1'){
	// 		$result = $this->mdl_content->add_driver();
	// 		$data['daftar'] = $this->mdl_content->get_all_driver_active();
	// 		if($result == 1){
	// 				$data['daftar'] = $this->mdl_content->get_all_driver_active();
	// 				$data['status'] = "driver has been added.";
	// 				$data['alert'] = 'alert alert-success';
	// 				$this->menu_handler->set_menu('driver_list','driver List',$data,4,7);
	// 			} else if($result == 2){
	// 				$data['status'] = "Sorry, driver name or Email has been used";
	// 				$data['alert'] = 'alert alert-danger';
	// 				$this->menu_handler->set_menu('driver_detail','driver',$data,4,7);
	// 			} else {
	// 				$data['alert'] = 'alert alert-danger';
	// 				$data['status'] = "Please check again!!!";
	// 				$this->menu_handler->set_menu('driver_detail','driver',$data,4,7);
	// 			}
	// 	} else if($get_priviledge=='3'){
	// 		$idChild = $this->session->userdata('idChild');
	// 		$result = $this->mdl_content->add_driver_partner($idChild);
	// 		$data['daftar'] = $this->mdl_content->get_all_driver_active_partner($idChild);
	// 		if($result == 1){
	// 				$data['daftar'] = $this->mdl_content->get_all_driver_active_partner($idChild);
	// 				$data['status'] = "driver has been added.";
	// 				$data['alert'] = 'alert alert-success';
	// 				$this->menu_handler->set_menu('driver_list_partner','driver List',$data,4,7);
	// 			} else if($result == 2){
	// 				$data['status'] = "Sorry, driver name or Email has been used";
	// 				$data['alert'] = 'alert alert-danger';
	// 				$this->menu_handler->set_menu('driver_detail_partner','driver',$data,4,7);
	// 			} else {
	// 				$data['alert'] = 'alert alert-danger';
	// 				$data['status'] = "Please check again!!!";
	// 				$this->menu_handler->set_menu('driver_detail_partner','driver',$data,4,7);
	// 			}
	// 	} else {
	// 		$this->menu_handler->error();
	// 	}
	// }

	
	
	// function edit_driver($id_driver, $status=''){
	// 	$get_priviledge = $this->session->userdata('priviledge');
	// 	if($get_priviledge=='1'){
	// 		if($id_driver =='save'){
	// 			$result = $this->mdl_content->edit_driver($this->input->post('id'));
	// 			if($result==1){
	// 				$data['daftar'] = $this->mdl_content->get_all_driver_active();
	// 				$data['status'] = "driver data has been updated.";
	// 				$data['alert'] = 'alert alert-success';
	// 				$this->menu_handler->set_menu('driver_list','driver',$data,4,7);
	// 			} else {
	// 				$data['status'] = "Please check again!!!";
	// 				$data['alert'] = 'alert alert-danger';
	// 				$data['all_partner']=$this->mdl_content->get_all_partner();
	// 				$this->edit_driver($this->input->post('id'),$data);
	// 			}
	// 		} else if($id_driver =='save_detail'){
				
	// 			$result = $this->mdl_content->edit_driver_detail($this->input->post('id'));
	// 			$data['daftar'] = $this->mdl_content->get_all_driver_active();
	// 			$data['status'] = "driver data has been updated.";
	// 			$data['alert'] = 'alert alert-success';
	// 			$this->menu_handler->set_menu('driver_list','driver',$data,4,7);
					
	// 		}else{
	// 			$edit_driver = $this->mdl_content->get_driver($this->input->post('id'));
	// 			$data['driver'] = $edit_driver[0];
	// 			$data['status'] = "Please check again!!!";
	// 			$data['alert'] = 'alert alert-danger';
	// 			$data['all_partner']=$this->mdl_content->get_all_partner();
	// 			$this->menu_handler->set_menu('driver_detail','driver',$data,4,7);			
	// 		}
	// 	} else if($get_priviledge=='3'){
	// 		if($id_driver =='save'){
	// 			$idChild = $this->session->userdata('idChild');
	// 			$result = $this->mdl_content->edit_driver($this->input->post('id'));
	// 			if($result==1){
	// 				$data['daftar'] = $this->mdl_content->get_all_driver_active_partner($idChild);
	// 				$data['status'] = "driver data has been updated.";
	// 				$data['alert'] = 'alert alert-success';
	// 				$this->menu_handler->set_menu('driver_list_partner','driver',$data,4,7);
	// 			} else {
	// 				$data['status'] = "Please check again!!!";
	// 				$data['alert'] = 'alert alert-danger';
	// 				$this->edit_driver($this->input->post('id'),$data);
	// 			}
	// 		} else if($id_driver =='save_detail'){
	// 			$idChild = $this->session->userdata('idChild');
	// 			$result = $this->mdl_content->edit_driver_detail($this->input->post('id'));
	// 			$data['daftar'] = $this->mdl_content->get_all_driver_active_partner($idChild);
	// 			$data['status'] = "driver data has been updated.";
	// 			$data['alert'] = 'alert alert-success';
	// 			$this->menu_handler->set_menu('driver_list_partner','driver',$data,4,7);
					
	// 		}else{
	// 			$edit_driver = $this->mdl_content->get_driver($this->input->post('id'));
	// 			$data['driver'] = $edit_driver[0];
	// 			$data['status'] = "Please check again!!!";
	// 			$data['alert'] = 'alert alert-danger';
	// 			$this->menu_handler->set_menu('driver_detail_partner','driver',$data,4,7);			
	// 		}
	// 	}else {
	// 		$data['all_priviledge'] = $this->mdl_content->get_priviledge();
	// 		$edit_driver = $this->mdl_content->get_driver($this->input->post('id'));
	// 		$data['driver'] = $edit_driver[0];
	// 		if($id_driver =='save'){
	// 			if (($this->input->post('id')) == ($this->session->userdata('id'))){
	// 				$result = $this->mdl_content->edit_driver($this->input->post('id'),2);
	// 				if($result==1){
	// 					$edit_driver = $this->mdl_content->get_driver($this->input->post('id'));
	// 					$data['driver'] = $edit_driver[0];
	// 					$data['status'] = "driver data has been updated.";
	// 					$data['alert'] = 'alert alert-success';
	// 					$this->menu_handler->set_menu('driver_detail','driver',$data,4,7);
	// 				} else {
	// 					$data['status'] = "Please check again!!!";
	// 					$data['alert'] = 'alert alert-danger';
	// 					$this->edit_driver($this->input->post('id'),$data);
	// 				}
	// 			} else {
	// 				$this->menu_handler->error();
	// 			}
	// 		} else if($id_driver =='save_detail'){
	// 			if (($this->input->post('id')) == ($this->session->userdata('id'))){
	// 				$result = $this->mdl_content->edit_driver_detail($this->input->post('id'));
	// 				if($result==1){
	// 					$data['daftar'] = $this->mdl_content->get_all_driver_active();
	// 					$data['status'] = "driver data has been updated.";
	// 					$data['alert'] = 'alert alert-success';
	// 					$this->edit_driver($this->input->post('id'),$data);
	// 				} else {
	// 					$data['status'] = "Please check again!!!";
	// 					$data['alert'] = 'alert alert-danger';
	// 					$data['all_partner']=$this->mdl_content->get_all_partner();
	// 					$this->edit_driver($this->input->post('id'),$data);
	// 					}
	// 			} else {
	// 				$this->menu_handler->error();
	// 			}
	// 		} else {
	// 			$edit_driver = $this->mdl_content->get_driver($this->input->post('id'));
	// 			$data['driver'] = $edit_driver[0];
	// 			$this->menu_handler->set_menu('driver_detail','driver',$data,4,7);
	// 		}
	// 	}
	// }
	
}