<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_content extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	//PHOTO MODULE
	function get_all_category_active(){
		$sql = "SELECT a.*, b.path_url
				FROM products as a
				LEFT JOIN images as b 
				ON a.product_id = b.product_id
				WHERE a.status='A' AND a.parent ='0' 
				ORDER BY product_id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_all_photography_deactive(){
		$sql = "SELECT *
				FROM project
				WHERE type = 'P' AND status='D'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	//INFOGRAPHIC MODULE
	function get_all_infograph_active(){
		$sql = "SELECT *
				FROM project
				WHERE type = 'I' AND status='A'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_all_infograph_deactive(){
		$sql = "SELECT *
				FROM project
				WHERE type = 'I' AND status='D'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}


	//VIDEOGRAPHIC MODULE
	function get_all_videograph_active(){
		$sql = "SELECT *
				FROM project
				WHERE type = 'V' AND status='A'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_all_videograph_deactive(){
		$sql = "SELECT *
				FROM project
				WHERE type = 'V' AND status='D'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}


	// MODULE GLOBAL PROJECT
	function get_project($id){
		$hasil_query = $this->db->select('*')->from('project')->where('id',$id)->get()->result();
		return $hasil_query;
	}
	
	function cek_data($nm_tabel, $nm_field, $value){
		$c = $this->db->select('*')->from($nm_tabel)->where($nm_field,$value)->get()->result();
		$hasil_cek=count($c);
		return $hasil_cek;
	}

	function delete_project($id){
		$record_detail = array(
			'status' => 'D'
		);
		$this->db->where('id',$id)->update('project',$record_detail);
	}
	
	function restore_project($id){
		$record_detail = array(
			'status' => 'A'
		);
		$this->db->where('id',$id)->update('project',$record_detail);
	}
	
	function delete_project_permanent($id){
		$this->db->where('id',$id)->delete('project');
	}
	
	function get_priviledge(){
		$query = $this->db->select('*')->order_by("id","desc")->get('user_priviledge')->result();
		$priviledge = array();
		foreach ($query as $row){
			$priviledge[$row->id] = $row->priviledge;
		}
		return $priviledge;
	}
	
	

	function add_project($imgName){
		$coki = $this->cek_data('project','name',$this->input->post('name'));
		if($coki==0){
				if( ($this->input->post('name')) ){
					$record_detail = array(
							'name' => trim($this->input->post('name')),
							'description' => $this->input->post('description'),
							'pathUrl' => trim($imgName),
							'type' => trim($this->input->post('category')),
							'changedBy' => $this->session->userdata('username'),
							'createdDate' => date('Y-m-d'),
							'createdBy' => $this->session->userdata('username'),
							'status'=>'A'
						);
						$this->db->insert('project',$record_detail);
						$tes = 1;
						return $tes;			
				}else {
					$tes = 0;
					return $tes;
				}
			
		} else {
			$tes = 2;
			return $tes;
		}
	}

	function add_driver_partner($partnerId){
		$this->load->helper('email');
		$cok = $this->cek_data('drivers','username',$this->input->post('username'));
		$coki = $this->cek_data('drivers','name',$this->input->post('name'));
		if($coki==0){
			if ($cok==0){
				if(($this->input->post('username')) && ($this->input->post('password')) && ($this->input->post('password')==$this->input->post('re_password')) && ($this->input->post('name'))  && ($this->input->post('phone')) && ($this->input->post('email')) ){
					$record_detail = array(
							'username' => trim($this->input->post('username')),
							'password' => sha1($this->input->post('password')),
							'name' => trim($this->input->post('name')),
							'email' => trim($this->input->post('email')),
							'phone' => trim($this->input->post('phone')),
							'address' => $this->input->post('address'),
							'changedBy' => $this->session->userdata('username'),
							'createdDate' => date('Y-m-d'),
							'partnerId' =>$partnerId,
							'createdBy' => $this->session->userdata('username'),
							'status'=>'A'
						);
						$this->db->insert('drivers',$record_detail);
						$tes = 1;
						return $tes;			
				}else {
					$tes = 0;
					return $tes;
				}
			}else{
			$tes = 2;
			return $tes;
			}
		} else {
		$tes = 2;
		return $tes;
		}
	}
	
	
	function edit_driver($id_driver){
		$a = $this->db->select('*')->where('driverId',$id_driver)->get('drivers')->result();
		$cok = $this->cek_data('drivers','username',$this->input->post('username'));

		if($this->input->post('password')!=null || $this->input->post('re_password')!=null){
			if($this->input->post('id')){
				$record_detail = array(
					'name' => trim($this->input->post('name')),
					'partnerId' => trim($this->input->post('partnerId')),
					'phone' => trim($this->input->post('phone')),
					'address' => $this->input->post('address'),
					'changedBy' => $this->session->userdata('username')
					);

				
				if((empty($a[0]->password)===FALSE)&&($this->input->post('password')==$this->input->post('re_password'))){
							
							$record_detail['password']=sha1($this->input->post('password'));
					//echo $this->input->post('password');		
					$this->db->where('driverId',$id_driver)->update('drivers',$record_detail);
					return 1;
				} else {	
					//echo $this->input->post('store_name');			
					return 0;
				}
				//die();
								
			}else{
				return 0;
			}
		}else{
			if($this->input->post('id')){
				$record_detail = array(
					'name' => trim($this->input->post('name')),
					'partnerId' => trim($this->input->post('partnerId')),
					'phone' => trim($this->input->post('phone')),
					'address' => $this->input->post('address'),
					'changedBy' => $this->session->userdata('username')
					);
				$this->db->where('driverId',$id_driver)->update('drivers',$record_detail);
				return 1;				
			}else{
				return 0;
			}
		}
	}
	
	function edit_driver_detail($id_driver){
		$data_cek = $this->input->post(NULL,TRUE);
		$record_detail = array(
			'address'=>trim($data_cek['address']),
			'id_city'=>trim($data_cek['id_city']),
			'change_by' => $this->session->userdata('username')
		);
		
		$this->db->where('driverId',$id_driver)->update('drivers',$record_detail);
	}
	
	
	function add_document($imgName){
		if($this->input->post('category')){
				if($this->input->post('expired') && $this->input->post('category') !== 'PP'){
					$record_detail = array(
							'driverId' => trim($this->input->post('driverId')),
							'category' => trim($this->input->post('category')),
							'image' => $imgName,
							'changedBy' => $this->session->userdata('username'),
							'expired' => $this->input->post('expired'),
							'createdDate' => date('Y-m-d'),
							'createdBy' => $this->session->userdata('username')
						);
					$this->db->insert('partnerdocuments',$record_detail);					
			}elseif($this->input->post('category') == 'PP'){

				$record_detail = array(
							'pathUrl' => $imgName,
							'changedBy' => $this->session->userdata('username')
						);
					$this->db->set($record_detail)->where('driverId', $this->input->post('driverId'))->update('drivers',$record_detail);
			}
		$tes = 1;
		return $tes;
		}else {
			$tes = 0;
			return $tes;
		}
	}
} ?>