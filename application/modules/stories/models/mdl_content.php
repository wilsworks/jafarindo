<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_content extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_all_stories_active(){
		$sql = "SELECT * 
				FROM stories
				WHERE status = 'A'
				ORDER BY story_id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_all_stories_deactive(){
		$sql = "SELECT *
				FROM stories
				WHERE status = 'D'
				ORDER BY story_id DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	
	function get_stories($id){
		$hasil_query = $this->db->select('*')->from('stories')->where('story_id',$id)->get()->result();
		return $hasil_query;
	}
	
	function cek_data($nm_tabel, $nm_field, $value){
		$c = $this->db->select('*')->from($nm_tabel)->where($nm_field,$value)->get()->result();
		$hasil_cek=count($c);
		return $hasil_cek;
	}
	

	function add_stories(){
		$cok = $this->cek_data('stories','title',$this->input->post('title'));
		if ($cok==0){
			if(($this->input->post('title')) && ($this->input->post('description'))){

				$st_source = $this->input->post('start_date');
				$date_st = new DateTime($st_source);
				$st_date = $date_st->format('Y-m-d');

				$ed_source = $this->input->post('end_date');
				$date_ed = new DateTime($ed_source);
				$ed_date = $date_ed->format('Y-m-d');

				$record_detail = array(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'start_date' => $st_date,
						'end_date' => $ed_date,
						'created_date' => date('Y-m-d h:i:s'),
						'created_by' => $this->session->userdata('username'),
						'changed_by' => $this->session->userdata('username'),
						'status'=>'A'
					);
					$this->db->insert('stories',$record_detail);
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
	
	function edit_stories($id){
		$a = $this->db->select('*')->where('story_id',$id)->get('stories')->result();
		if($this->input->post('id')){
			$st_source = $this->input->post('start_date');
			$date_st = new DateTime($st_source);
			$st_date = $date_st->format('Y-m-d');

			$ed_source = $this->input->post('end_date');
			$date_ed = new DateTime($ed_source);
			$ed_date = $date_ed->format('Y-m-d');

			$record_detail = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'start_date' => $st_date,
				'end_date' => $ed_date,
				'changed_by' => $this->session->userdata('username'),
				);
			$this->db->where('story_id',$id)->update('stories',$record_detail);
			return 1;		
		}else{
			return 0;
		}
	}
	
	function delete_stories($id){
		$record_detail = array(
			'status' => 'D'
		);
		$this->db->where('story_id',$id)->update('stories',$record_detail);
	}
	
	function restore_stories($id){
		$record_detail = array(
			'status' => 'A'
		);
		$this->db->where('story_id',$id)->update('stories',$record_detail);
	}
	
	function delete_stories_permanent($id){
		$this->db->where('story_id',$id)->delete('stories'); 
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