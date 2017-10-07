<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Mdl_content extends CI_Model {
	
		function __construct() {
			parent::__construct();
		}
	
		// COUNT DASHBOARD
		function get_count_info() {
			$c = $this->db->select('*')->from('project')->where('status','A')->where('type','I')->get()->result();
			$count=count($c);
			return $count;
		}
		

		function get_count_video() {
			$c = $this->db->select('*')->from('project')->where('status','A')->where('type','V')->get()->result();
			$count=count($c);
			return $count;
		}

		function get_count_photo() {
			$c = $this->db->select('*')->from('project')->where('status','A')->where('type','P')->get()->result();
			$count=count($c);
			return $count;
		}

		function get_count_news() {
			$c = $this->db->select('*')->from('berita')->where('status','A')->get()->result();
			$count=count($c);
			return $count;
		}

		function get_all_news_active(){
			$sql = "SELECT * 
					FROM berita
					WHERE status = 'A'
					ORDER BY view DESC LIMIT 5";
			$query = $this->db->query($sql)->result();
			return $query;
		}

		//User Priviledge
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