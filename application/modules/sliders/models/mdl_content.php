<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_content extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_all_sliders_active(){
		$sql = "SELECT * 
				FROM sliders
				WHERE status = 'A'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_all_sliders_deactive(){
		$sql = "SELECT *
				FROM sliders
				WHERE status = 'D'
				ORDER BY id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	
	function get_slider($id){
		$hasil_query = $this->db->select('*')->from('sliders')->where('id',$id)->get()->result();
		return $hasil_query;
	}
	
	function cek_data($nm_tabel, $nm_field, $value){
		$c = $this->db->select('*')->from($nm_tabel)->where($nm_field,$value)->get()->result();
		$hasil_cek=count($c);
		return $hasil_cek;
	}
	

	function add_slider(){
		$cok = $this->cek_data('sliders','title',$this->input->post('title'));
		if ($cok==0){
			if(($this->input->post('title')) && ($this->input->post('description'))){

				$st_source = $this->input->post('start_publish');
				$date_st = new DateTime($st_source);
				$st_date = $date_st->format('Y-m-d');

				$ed_source = $this->input->post('end_publish');
				$date_ed = new DateTime($ed_source);
				$ed_date = $date_ed->format('Y-m-d');

				$record_detail = array(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'start_publish' => $st_date,
						'end_publish' => $ed_date,
						'created_date' => date('Y-m-d h:i:s'),
						'created_by' => $this->session->userdata('username'),
						'changed_by' => $this->session->userdata('username'),
						'status'=>'A'
					);
					$this->db->insert('sliders',$record_detail);
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
	
	function edit_slider($id){
		$a = $this->db->select('*')->where('id',$id)->get('sliders')->result();
		if($this->input->post('id')){
			$st_source = $this->input->post('start_publish');
			$date_st = new DateTime($st_source);
			$st_date = $date_st->format('Y-m-d');

			$ed_source = $this->input->post('end_publish');
			$date_ed = new DateTime($ed_source);
			$ed_date = $date_ed->format('Y-m-d');

			$record_detail = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'start_publish' => $st_date,
				'end_publish' => $ed_date,
				'changed_by' => $this->session->userdata('username'),
				);
			$this->db->where('id',$id)->update('sliders',$record_detail);
			return 1;		
		}else{
			return 0;
		}
	}
	
	function delete_slider($id){
		$record_detail = array(
			'status' => 'D'
		);
		$this->db->where('id',$id)->update('sliders',$record_detail);
	}
	
	function restore_slider($id){
		$record_detail = array(
			'status' => 'A'
		);
		$this->db->where('id',$id)->update('sliders',$record_detail);
	}
	
	function delete_slider_permanent($id){
		$this->db->where('id',$id)->delete('sliders'); 
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