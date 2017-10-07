<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_content extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	function check_familys($client){
		$query=$this->db->select('parentId')->where('name',$client)->get('parentId')->result();
		return $query;
	}
	
	function get_clients($id){
		$query=$this->db->select('password')->where('clientId',$id)->get('client')->result();
		if ($query) { 
			return $query[0]; 
		} else {
			return false;
		}
	}

	function get_all_familys(){
		$sql ="SELECT * FROM familys";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_all_familys_active(){
		$sql ="SELECT * FROM familys where status ='A' AND userId='".$this->session->userdata('id')."'";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_all_familys_deactive(){
		$sql ="SELECT * FROM familys where status ='D' AND userId='".$this->session->userdata('id')."'";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_familys($id_client){
		$hasil_query = $this->db->select('*')->from('familys')->where('parentId',$id_client)->get()->result();
		return $hasil_query;
	}
	function get_vehicle($id_client){
		$hasil_query = $this->db->select('*')->from('familys')->where('familysId',$id_client)->get()->result();
		return $hasil_query;
	}
	function get_driver($id_client){
		$hasil_query = $this->db->select('*')->from('drivers')->where('familysId',$id_client)->get()->result();
		return $hasil_query;
	}
	
	function cek_data($nm_tabel, $nm_field, $value){
	$c = $this->db->select('*')->from($nm_tabel)->where($nm_field,$value)->get()->result();
	$hasil_cek=count($c);
	return $hasil_cek;
	}
	
	function add_familys(){
		$cok = $this->cek_data('familys','name',$this->input->post('name'));
		
		if ($cok==0){
			if(($this->input->post('name')) && ($this->input->post('sibling')) ){
					$record_detail = array(
						'name' => $this->input->post('name'),
						'nik' => $this->input->post('nik'),
						'sibling' => $this->input->post('sibling'),
						'job' =>$this->input->post('job'),
						'userId' => $this->session->userdata('id'),
						'income' => trim($this->input->post('income')),
						'changedBy' => $this->session->userdata('username'),
						'createdDate' => date('Y-m-d h:i:s'),
						'createdBy' => $this->session->userdata('username'),
						'status'=>'A'
					);
					$this->db->insert('familys',$record_detail);

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
		
	}
	
	
	function edit_familys($id_client){
		$a = $this->db->select('*')->where('parentId',$id_client)->get('familys')->result();

		if($this->input->post('id')){
			$record_detail = array(
					'name' => $this->input->post('name'),
					'nik' => $this->input->post('nik'),
					'sibling' => $this->input->post('sibling'),
					'job' =>$this->input->post('job'),
					'income' => trim($this->input->post('income')),
					'changedBy' => $this->session->userdata('username')
				);

			$this->db->where('parentId',$id_client)->update('familys',$record_detail);
			return 1;				
		}else{
			return 0;
		}
	}
	
	function edit_client_detail($id_client){
		$data_cek = $this->input->post(NULL,TRUE);
		$record_detail = array(
			'address'=>trim($data_cek['address']),
			'id_city'=>trim($data_cek['id_city']),
			'change_by' => $this->session->userdata('username')
		);
		
		$this->db->where('clientId',$id_client)->update('clients',$record_detail);
	}
	
	function hapus_familys($id_client){
		$record_detail = array(
			'status' => 'D'
		);
		
		$this->db->where('parentId',$id_client)->update('familys',$record_detail);
	}
	
	function restore_familys($id_client){
		$record_detail = array(
			'status' => 'A'
		);
		
		$this->db->where('parentId',$id_client)->update('familys',$record_detail);
	}
	
	function hapus_familys_permanen($id_client){
		$this->db->where('parentId',$id_client)->delete('familys');
	}
	
	function get_priviledge(){
		$query = $this->db->select('*')->order_by("id","desc")->get('user_priviledge')->result();
		$priviledge = array();
		foreach ($query as $row){
			$priviledge[$row->id] = $row->priviledge;
		}
		return $priviledge;
	}
	
	
	
}
?>