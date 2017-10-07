<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_content extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	function check_driver($driver){
		$query=$this->db->select('drivername')->where('drivername',$driver)->get('driver')->result();
		return $query;
	}
	
		// SISWA DASHBOARD
	function get_user() {
		$idUser=$this->session->userdata['id'];
		$c = $this->db->select('*')->from('users')->where('id',$idUser)->where('status','A')->get()->result();
		return $c[0];
	}

	function get_profile(){
		$idUser=$this->session->userdata['id'];
		$c = $this->db->select('*')->from('prestudent')->where('userId',$idUser)->where('status','A')->get()->result();
		
		return $c;
	}
	
	function cek_data($nm_tabel, $nm_field, $value){
		$c = $this->db->select('*')->from($nm_tabel)->where($nm_field,$value)->get()->result();
		$hasil_cek=count($c);
		return $hasil_cek;
	}
	

	function check_partner($partnerId){
		$query = $this->db->select('*')->from('partners')->where('partnerId',$partnerId)->get()->result();
		return $query;
	}

	function add_profile_siswa(){

		$cok = $this->cek_data('prestudent','userId',$this->session->userdata('id'));
		// print_r($this->session->userdata('id'));die();
		
		if ($cok==0){
			if($this->input->post('fullname') && $this->input->post('pob') && $this->input->post('dob') && $this->input->post('gender')  && $this->input->post('phone') && $this->input->post('address') ){
				$record_detail = array(
						'fullname' => trim($this->input->post('fullname')),
						'userId'=>$this->session->userdata('id'),
						'pob' =>$this->input->post('pob'),
						'dob' => $this->input->post('dob'),
						'gender' => trim($this->input->post('gender')),
						'phone' => trim($this->input->post('phone')),
						'address' => $this->input->post('address'),
						'changedBy' => $this->session->userdata('username'),
						'createdDate' => date('Y-m-d h:i:s'),
						'createdBy' => $this->session->userdata('username'),
						'status'=>'A'
					);
					
					$this->db->insert('prestudent',$record_detail);
					$tes = 1;
					return $tes;			
			}else {
				$tes = 0;
				return $tes;
			}
		}else{
			$tes = 0;
			return $tes;
		}
		
	}
	
	
	function edit_profile(){

		$cok = $this->cek_data('prestudent','userId',$this->session->userdata('id'));
		if($this->input->post('id')){
			$record_detail = array(
				'fullname' => trim($this->input->post('fullname')),
				'userId'=>$this->session->userdata('id'),
				'pob' =>$this->input->post('pob'),
				'dob' => $this->input->post('dob'),
				'gender' => trim($this->input->post('gender')),
				'phone' => trim($this->input->post('phone')),
				'address' => $this->input->post('address'),
				'changedBy' => $this->session->userdata('username')
				);
			// print_r($record_detail);die();
			$this->db->where('userId',$this->session->userdata('id'))->update('prestudent',$record_detail);
			return 1;
		} else {	
			//echo $this->input->post('store_name');			
			return 0;
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
	
	function hapus_driver($id_driver){
		$record_detail = array(
			'status' => 'D'
		);
		$this->db->where('driverId',$id_driver)->update('drivers',$record_detail);
	}
	
	function restore_driver($id_driver){
		$record_detail = array(
			'status' => 'A'
		);
		$this->db->where('driverId',$id_driver)->update('drivers',$record_detail);
	}
	
	function hapus_driver_permanen($id_driver){
		$this->db->where('driverId',$id_driver)->delete('drivers');
	}
	
	function get_priviledge(){
		$query = $this->db->select('*')->order_by("id","desc")->get('user_priviledge')->result();
		$priviledge = array();
		foreach ($query as $row){
			$priviledge[$row->id] = $row->priviledge;
		}
		return $priviledge;
	}
} ?>