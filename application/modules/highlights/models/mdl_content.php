<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_content extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_all_highlight_active(){
		$sql = "SELECT * 
				FROM highlights
				WHERE status = 'A'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_all_highlight_deactive(){
		$sql = "SELECT *
				FROM highlights
				WHERE status = 'D'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	
	function get_highlight($id){
		$hasil_query = $this->db->select('*')->from('highlights')->where('id',$id)->get()->result();
		return $hasil_query;
	}
	
	function cek_data($nm_tabel, $nm_field, $value){
		$c = $this->db->select('*')->from($nm_tabel)->where($nm_field,$value)->get()->result();
		$hasil_cek=count($c);
		return $hasil_cek;
	}
	

	function add_highlight(){
		$cok = $this->cek_data('highlights','title',$this->input->post('title'));
		if ($cok==0){
			if(($this->input->post('title')) && ($this->input->post('description'))){
				$record_detail = array(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'created_date' => date('Y-m-d h:i:s'),
						'created_by' => $this->session->userdata('username'),
						'changed_by' => $this->session->userdata('username'),
						'status'=>'A'
					);
					$this->db->insert('highlights',$record_detail);
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
	
	function edit_highlight($id){
		$a = $this->db->select('*')->where('id',$id)->get('highlights')->result();
		if($this->input->post('id')){
			$record_detail = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'changed_by' => $this->session->userdata('username'),
				);
		
			$this->db->where('id',$id)->update('highlights',$record_detail);
			return 1;		
		}else{
			return 0;
		}
	}
	
	function delete_highlight($id){
		$record_detail = array(
			'status' => 'D'
		);
		$this->db->where('id',$id)->update('highlights',$record_detail);
	}
	
	function restore_highlight($id){
		$record_detail = array(
			'status' => 'A'
		);
		$this->db->where('id',$id)->update('highlights',$record_detail);
	}
	
	function delete_highlight_permanent($id){
		$this->db->where('id',$id)->delete('highlights'); 
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