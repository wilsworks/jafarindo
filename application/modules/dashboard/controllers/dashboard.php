<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class dashboard extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('mdl_content');
	}

	function index() {
		redirect('dashboard/dashboard_crud/0-0');
	}
	
	function dashboard_crud($tes){
		$get_priviledge = $this->session->userdata('priviledge');
		
		$status = explode('-',$tes);
		$cas = $status[1];
		switch($cas){
			case 0: // FOR SHOW ALL dashboard
				if($get_priviledge == '1'){
					$data['data_news']= $this->mdl_content->get_count_news();
					$data['data_photo']= $this->mdl_content->get_count_photo();
					$data['data_info'] = $this->mdl_content->get_count_info();
					$data['data_video']= $this->mdl_content->get_count_video();
					$data['news']= $this->mdl_content->get_all_news_active();
					

					
					$this->menu_handler->set_menu('dashboard_lte','dashboard Management',$data,0,0);
				}else {
					$this->menu_handler->error();
				}
				break;
			case 1: // UNTUK ADD dashboard
					if($get_priviledge < '3'){
						$unique_id = $this->mdl_content->get_unique_id($status[0]);
						$data['lap_pelanggan'] 	= $this->mdl_content->get_lap_pelanggan($unique_id);
						$data['jenisgangguan'] 	= $this->mdl_content->get_jenisgangguan($unique_id);
						$data['detailsolusi'] 	= $this->mdl_content->get_detailsolusi($unique_id);
						$data['lap_test'] 		= $this->mdl_content->get_lap_test($unique_id);
						$this->menu_handler->set_menu('dashboard_detail_data','LAPORAN PEMELIHARAAN',$data,0,0);
					} else {
						$this->menu_handler->error();
					}
					break;
			
			default:
					if($get_priviledge < '3'){
						$data['daftar'] = $this->mdl_content->get_all_lap_pelanggan();
						// print_r($data['daftar']);die();
						$this->menu_handler->set_menu('dashboard','dashboard Management',$data,0,0);
					} else {
						$this->menu_handler->error();
					}
					break;
		}
	}



	function aktivasi_siswa(){
		$this->mdl_content->aktivasi_siswa();

		$data['all_priviledge'] = $this->mdl_client->get_priviledge();
		$data['user'] = $this->mdl_content->get_user();
		$profile = $this ->mdl_content->get_profile();
		if($profile ){
			$data['profile'] = $profile[0];
		}
		$data['keluarga'] = $this->mdl_content->get_familys_active();
		$data['akademik']=$this->mdl_content->get_total_akademik();
		$data['akademik_nilai']=$this->mdl_content->get_nilai_active();
		$this->menu_handler->set_menu('dashboard_siswa','Profile Siswa',$data,2,3);
	}

	function driver_detail($driverId){
		$daftarId = $this->session->userdata('idChild');
		$data['all_priviledge'] = $this->mdl_client->get_priviledge();
		$data['driver'] = $this->mdl_driver->get_driver($driverId);
		// print_r($data['driver']);die();
		$this->menu_handler->set_menu('driver_detail','Driver Detail',$data,2,3);
	}
	
	
}