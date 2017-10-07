<?php
class Mdl_content extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	


	function get_company_profile($param){
		$query=$this->db->select('*')->where('profil',$param)->get('profil')->result();
		if ($query) { 
			return $query[0];
		} else {
			return false;
		}
	}

	function get_recent_news(){
		$sql ="SELECT * FROM berita order by modified_date ASC";
		$query = $this->db->query($sql)->result();

		if ($query) { 
			return $query[0];
		} else {
			return false;
		}
	}

	function get_social_media(){
		$query = $this->db->select('*')->get('social_media')->result();
		return $query;
	}


	function get_news_byid($id_news){
		$sql ="SELECT a.*, b.nama as writer FROM berita a 
		left join users b
		on a.created_by = b.id
		where  a.id = ".$id_news." order by a.modified_date ASC";

		$query = $this->db->query($sql)->result();
		
		if ($query) { 
			return $query[0];
		} else {
			return false;
		}
	}

	function get_news_lastest(){
		$sql ="SELECT a.*, b.nama as writer FROM berita a 
		left join users b
		on a.created_by = b.id
		order by a.modified_date ASC";

		$query = $this->db->query($sql)->result();
		return $query;
	}
	


	function check_user($user){
		$query=$this->db->select('username')->where('username',$user)->get('users')->result();
		return $query;
	}
	
	function get_user($username){
		$query=$this->db->select('*')->where('username',$username)->get('users')->result();
		if ($query) { 
			return $query[0];
		} else {
			return false;
		}
	}
	
	function validate_session($username){
		$query = $this->db->select('*')->like('user_data',$username)->get('ci_sessions')->result();
		return $query;
	}
	
	function remove_session($session_id){
		$query = $this->db->where('session_id',$session_id)->delete('ci_sessions');
	}
	
	function get_nama($username){
		$hasil_query = $this->db->select('nama')->from('karyawan')->where('username',$username)->get()->result();
		return $hasil_query;
	}
	
	function reset_pass($email){
	
	}

	
	
	/*function get_username($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		return $this->db->get()->result();
	}*/
	
	function add_history_login($tanggal, $waktu, $id, $nama, $ip_user){
			$date= date('d-m-Y');
			$ip_user =  $this->input->ip_address();	
			$record_detail = array(
				'username' => trim($this->input->post('username')),
				'log_type' => 'login/logout',
				'activity' => 'login tanggal '.$date.' - dari IP '.$ip_user,
				'requested_url' => base_url().$this->uri->uri_string()
				//'tanggal' => trim($tanggal),
				//'waktu_masuk' => trim($waktu)
			);
			$this->db->insert('log_history',$record_detail);
			
		
	}
	
	function add_history_logout($id, $username, $ip_user){
			$date= date('d-m-Y');
			$record_detail = array(
				'username' => trim($username),
				'log_type' => 'login/logout',
				'activity' => 'logout tanggal '.$date.' - dari IP '.$ip_user,
				'requested_url'=>base_url().$this->uri->uri_string()
				//'tanggal' => trim($tanggal),
				//'waktu_masuk' => trim($waktu)
			);
			$this->db->insert('log_history',$record_detail);
		
	}

	
}
?>