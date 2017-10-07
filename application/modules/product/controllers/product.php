<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_content');
		
	}

	function categories_crud($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL drivers
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_category_active();
						$this->menu_handler->set_menu('categories_list','Categories',$data,3,5);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD photo
					if($get_priviledge=='1'){
						$data['category'] ='P';
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_project'] = true;
						$this->menu_handler->set_menu('categories_detail','Categories',$data,3,5);
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
						$this->menu_handler->set_menu('photo_detail','photography',$data,3,5);
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
						$this->menu_handler->set_menu('photo_list','photography',$data,3,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH photo
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_deactive();
						$this->menu_handler->set_menu('photo_trash','photography',$data,3,5);
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
						$this->menu_handler->set_menu('photo_trash','photography',$data,3,5);
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
						$this->menu_handler->set_menu('photo_trash','photography',$data,3,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$this->menu_handler->set_menu('photo_list','photography',$data,3,5);
					}else {
						$this->menu_handler->error();
					}
					break;
		}
	}

	function photography($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL drivers
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$this->menu_handler->set_menu('photo_list','photography',$data,3,5);
					}else {
						$this->menu_handler->error();
					}
					break;
			case 1: // UNTUK ADD photo
					if($get_priviledge=='1'){
						$data['category'] ='P';
						$data['all_priviledge'] = $this->mdl_content->get_priviledge();
						$data['new_project'] = true;
						$this->menu_handler->set_menu('photo_detail','photography',$data,3,5);
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
						$this->menu_handler->set_menu('photo_detail','photography',$data,3,5);
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
						$this->menu_handler->set_menu('photo_list','photography',$data,3,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			case 4: // UNTUK TAMPILKAN TRASH photo
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_deactive();
						$this->menu_handler->set_menu('photo_trash','photography',$data,3,5);
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
						$this->menu_handler->set_menu('photo_trash','photography',$data,3,5);
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
						$this->menu_handler->set_menu('photo_trash','photography',$data,3,5);
					} else {
						$this->menu_handler->error();
					}
					break;
			default:
					if($get_priviledge=='1'){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$this->menu_handler->set_menu('photo_list','photography',$data,3,5);
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
		$category = 'image';
		$new_project = $_POST['new_project'];
		$imgName = 'img_'.$category.'_'.time().'.jpg';
		$pathpro = 'image';

		$config['file_name']			= $imgName;
        $config['upload_path']          = FCPATH.'data/product/'.$pathpro.'/';
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
			$this->menu_handler->set_menu('categories_detail','Categories',$data,3,5);
        } else{
            $data = array('upload_data' => $this->upload->data());
			if($data){	
				if($new_project==true){  // ADD PROJECT
					$result = $this->mdl_content->add_project($imgName);
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_category_active();
						$data['status'] = "Data has been added.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('categories_list','Categories',$data,3,5);
					} else { 
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$data['category'] =$category;
						$data['new_project'] = $new_project;
						$this->menu_handler->set_menu('categories_detail','Categories',$data,3,5);
					}
				}else{	// EDIT PROJECT
					$result = $this->mdl_content->edit_project($imgName);
					if($result==1){
						$data['daftar'] = $this->mdl_content->get_all_photography_active();
						$data['status'] = "Data has been edited.";
						$data['alert'] = 'alert alert-success';
						$this->menu_handler->set_menu('photo_list','photography',$data,3,5);
					} else { 
						$data['status'] = "Please check again!!!";
						$data['alert'] = 'alert alert-danger';
						$data['category'] =$category;
						$data['new_project'] = $new_project;
						$this->menu_handler->set_menu('photo_detail','photography',$data,3,5);
					}

				}
				
			}
        }
    }

	
}