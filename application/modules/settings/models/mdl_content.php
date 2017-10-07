<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_content extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	//PROFILE SETTINGS
	function get_all_profile_setting(){
		$sql ="SELECT * FROM profile";
		$query = $this->db->query($sql)->result();
		return $query[0];
	}



	function check_user($user){
		$query=$this->db->select('username')->where('username',$user)->get('user')->result();
		return $query;
	}
	
	function get_users($id){
		$query=$this->db->select('password')->where('username',$id)->get('user')->result();
		if ($query) { 
			return $query[0];
		} else {
			return false;
		}
	}

	function get_nama($username){
		$hasil_query = $this->db->select('nama')->from('user')->where('username',$username)->get()->result();
		return $hasil_query;
	}
	
	function get_id($username){
		$hasil_query = $this->db->select('id_user')->from('user')->where('username',$username)->get()->result();
		return $hasil_query;
	}
	
	function reset_pass($email){
	
	}
	
	
	function get_all_user(){
		$sql ="SELECT * FROM users";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_all_user_active(){
		$sql ="SELECT * FROM users where status ='A'";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_all_user_deactive(){
		$sql ="SELECT * FROM users where status ='D'";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_user($id_user){
		$hasil_query = $this->db->select('*')->from('users')->where('id',$id_user)->get()->result();
		return $hasil_query;
	}
	
	function cek_data($nm_tabel, $nm_field, $value){
	$c = $this->db->select('*')->from($nm_tabel)->where($nm_field,$value)->get()->result();
	$hasil_cek=count($c);
	return $hasil_cek;
	}
	
	function get_user_code($priviledge){
	
		if ($priviledge=='1'){
			$sql ="SELECT store_code FROM users where priviledge='".$priviledge."'
				ORDER BY store_code DESC LIMIT 1";
			$query = $this->db->query($sql)->result();
			if ($query){
				$user_last_code = $query[0]->store_code;
				$num_code = explode('-',$user_last_code);
				$num = ($num_code[1]+1);	
				$code_new = "A-".$num;
			} else {
				$code_new = "A-1";
			}
		}else if($priviledge=='2'){
			$sql ="SELECT store_code FROM users where priviledge='".$priviledge."'
				ORDER BY store_code DESC LIMIT 1";
			$query = $this->db->query($sql)->result();
			if ($query){
				$user_last_code = $query[0]->store_code;
				$num_code = explode('-',$user_last_code);
				$num = ($num_code[1]+1);
			$code_new = "P-".$num;
			} else {
				$code_new = "P-1";
			}
		}else {
			$sql ="SELECT store_code FROM users where priviledge='".$priviledge."'
				ORDER BY store_code DESC LIMIT 1";
			$query = $this->db->query($sql)->result();
			if ($query){
				$user_last_code = $query[0]->store_code;
				$num_code = explode('-',$user_last_code);
				$num = ($num_code[1]+1);
				$code_new = "STR-".$num;
			} else {
				$code_new = "STR-1";
			}
		}
		
		return $code_new;
	}

	function add_user(){
		$this->load->helper('email');
		$cok = $this->cek_data('users','username',$this->input->post('username'));
		$coki = $this->cek_data('users','email',$this->input->post('email'));
		if($coki==0){
			if ($cok==0){
				if(($this->input->post('username')) && ($this->input->post('password')) && ($this->input->post('password')==$this->input->post('re_password')) &&(valid_email($this->input->post('email')))){
					$record_detail = array(
							'priviledge' => trim($this->input->post('priviledge')),
							'nama' => trim($this->input->post('nama')),
							'email' => trim($this->input->post('email')),
							'username' => trim($this->input->post('username')),
							'password' => sha1($this->input->post('password')),
							'change_by' => $this->session->userdata('username')
						);
						$this->db->insert('users',$record_detail);
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
	
	
	function edit_user($id_user){
		$a = $this->db->select('*')->where('id',$id_user)->get('users')->result();
		if($this->input->post('nama')){
			$record_detail = array(
				'nama' => trim($this->input->post('nama')),
				'change_by' => $this->session->userdata('username'),
				'priviledge' => trim($this->input->post('priviledge')),
				);
			if((empty($a[0]->password)===FALSE)&&($this->input->post('password'))){
				$record_detail['password']=sha1($this->input->post('password'));
			} else {	
				//echo $this->input->post('store_name');			
			}
			$this->db->where('id',$id_user)->update('users',$record_detail);
			return 1;				
		}else{
			return 0;
		}
	}
	
	function edit_user_detail($id_user){
		$data_cek = $this->input->post(NULL,TRUE);
		$record_detail = array(
			'address'=>trim($data_cek['address']),
			'id_city'=>trim($data_cek['id_city']),
			'change_by' => $this->session->userdata('username')
		);
		$this->db->where('id',$id_user)->update('users',$record_detail);
	}
	
	function hapus_user($id_user){
		$record_detail = array(
			'status' => 'D'
		);
		$this->db->where('id',$id_user)->update('users',$record_detail);
	}
	
	function restore_user($id_user){
		$record_detail = array(
			'status' => 'A'
		);
		$this->db->where('id',$id_user)->update('users',$record_detail);
	}
	
	function hapus_user_permanen($id_user){
		$this->db->where('id',$id_user)->delete('users');
	}
	
	function get_priviledge(){
		$query = $this->db->select('*')->order_by("id","desc")->get('user_priviledge')->result();
		$priviledge = array();
		foreach ($query as $row){
			$priviledge[$row->id] = $row->priviledge;
		}
		return $priviledge;
	}
	
	// function get_city(){
	// 	$query = $this->db->select('*')->get('tbl_conf_city')->result();
	// 	$city = array();
	// 	foreach ($query as $row){
	// 		$city[$row->city_name] = $row->id;
	// 	}
	// 	return $city;

	// }


	// SOSMED

	function get_social_media(){
		$sql ="SELECT * FROM social_media";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function hapus_sosmed_permanen($id){
		$this->db->where('id',$id)->delete('social_media');
	}

	function get_sosmed($id){
		$hasil_query = $this->db->select('*')->from('social_media')->where('id',$id)->get()->result();
		return $hasil_query;
	}

	function add_sosmed(){
		$cok = $this->cek_data('social_media','nama',$this->input->post('nama'));
		if ($cok==0){
			if(($this->input->post('nama')) &&($this->input->post('link'))){
				$record_detail = array(
						'nama' => trim($this->input->post('nama')),
						'link' => trim($this->input->post('link')),
						'status' => 'A',
						'modified_by' => $this->session->userdata('id')
					);
					$this->db->insert('social_media',$record_detail);
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

	function edit_sosmed($id){
		if($this->input->post('nama')){
			
			$record_detail = array(
				'nama' => trim($this->input->post('nama')),
				'link' => trim($this->input->post('link')),
				'modified_by' => $this->session->userdata('id')
				
				);
			$this->db->where('id',$id)->update('social_media',$record_detail);
			return 1;				
		}else{
			return 0;
		}
	}


	// CONTACT
	function get_contact_all(){
		$sql ="SELECT * FROM profil where type ='CONTACT'";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	function hapus_contact_permanen($id){
		$this->db->where('id',$id)->delete('profil');
	}
	function get_contact($id){
		$hasil_query = $this->db->select('*')->from('profil')->where('id',$id)->get()->result();
		return $hasil_query;
	}
	function add_contact(){
		$cok = $this->cek_data('profil','profil',$this->input->post('profil'));
		if ($cok==0){
			if(($this->input->post('profil')) &&($this->input->post('value'))){
				$record_detail = array(
						'profil' => trim($this->input->post('profil')),
						'value' => $this->input->post('value'),
						'fa_icon' => $this->input->post('fa_icon'),
						'type' => 'CONTACT',
						'modified_by' => $this->session->userdata('id')
					);
					$this->db->insert('profil',$record_detail);
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
	function edit_contact($id){
		if($this->input->post('profil')){
			$record_detail = array(
				'profil' => trim($this->input->post('profil')),
				'value' => $this->input->post('value'),
				'fa_icon' => $this->input->post('fa_icon'),
				'modified_by' => $this->session->userdata('id')
				);
			$this->db->where('id',$id)->update('profil',$record_detail);
			return 1;				
		}else{
			return 0;
		}
	}


	// GET ALL SLIDER
	function get_global_all(){
		$sql ="SELECT * FROM profil where type ='GLOBAL'";
		$query = $this->db->query($sql)->result();
		return $query;
	}


	// CONTACT
	function get_slider_all(){
		$sql ="SELECT * FROM image where kategori ='0'";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	function hapus_slider_permanen($id){
		$this->db->where('id',$id)->delete('profil');
	}
	function get_slider($id){
		$hasil_query = $this->db->select('*')->from('profil')->where('id',$id)->get()->result();
		return $hasil_query;
	}
	function add_slider(){
		$cok = $this->cek_data('profil','profil',$this->input->post('profil'));
		if ($cok==0){
			if(($this->input->post('profil')) &&($this->input->post('value'))){
				$record_detail = array(
						'profil' => trim($this->input->post('profil')),
						'value' => $this->input->post('value'),
						'fa_icon' => $this->input->post('fa_icon'),
						'type' => 'CONTACT',
						'modified_by' => $this->session->userdata('id')
					);
					$this->db->insert('profil',$record_detail);
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
		if($this->input->post('profil')){
			$record_detail = array(
				'profil' => trim($this->input->post('profil')),
				'value' => $this->input->post('value'),
				'fa_icon' => $this->input->post('fa_icon'),
				'modified_by' => $this->session->userdata('id')
				);
			$this->db->where('id',$id)->update('profil',$record_detail);
			return 1;				
		}else{
			return 0;
		}
	}


	
	
}
?>