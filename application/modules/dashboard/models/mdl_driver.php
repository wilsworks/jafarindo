<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_driver extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	function check_driver($driver){
		$query=$this->db->select('drivername')->where('drivername',$driver)->get('driver')->result();
		return $query;
	}
	
	function get_drivers($id){
		$query=$this->db->select('password')->where('driverId',$id)->get('driver')->result();
		if ($query) { 
			return $query[0];
		} else {
			return false;
		}
	}

	function get_all_partner(){
		$hasil_query = $this->db->select('*')->from('partners')->where('status','A')->get()->result();
		return $hasil_query;
	}

	
	function get_all_driver(){
		$sql = "SELECT a.*, b.name as partnerName 
				FROM drivers a
				LEFT JOIN partners b
					ON a.partnerId = b.partnerId
				ORDER BY a.driverId DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_all_driver_active($id_partner){
		$sql = "SELECT a.*, b.name as partnerName 
				FROM drivers a
				LEFT JOIN partners b
					ON a.partnerId = b.partnerId
				WHERE a.status = 'A' AND a.partnerId ='".$id_partner."'
				ORDER BY a.driverId DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	function get_all_trip($id_partner){
		$sql = "SELECT a.* , b.name  
				FROM orderbooks a
				LEFT JOIN drivers b
					ON a.driverId = b.driverId
				WHERE a.statusOrder = 'CO' AND b.partnerId ='".$id_partner."'
				ORDER BY a.orderId DESC";

		$query = $this->db->query($sql)->result();
		for($i = 0; $i < sizeof($query); $i++){
			$value=0;
			if($query[$i]->package=='1'){
				if($query[$i]->packageRun<2){
					$value =$value + 250000;
				}else{
					$value = $value + 250000 + (($query[$i]->packageRun-1)*30000);
				}
				
			}else if($query[$i]->packageRun=='2'){
				if($query[$i]->packageRun<2){
					$value =$value + 1000000;
				}else{
					$value =$value + 1000000 +  (($query[$i]->packageRun-1)*30000);
				}
			}else{
				if($query[$i]->packageRun<2){
					$value =$value +6000000;
				}else{
					$value = $value + 6000000 + (($query[$i]->packageRun-1)*30000);
				}
			}
			$query[$i]->earning =$value;
			$query[$i]->duration= $this->dateDiff($query[$i]->timePickup,$query[$i]->timeClosing );

			$source = $query[$i]->changedDate;
			$date = new DateTime($source);

			$query[$i]->statusOrder="Clomplete";
			

			$query[$i]->dateOrder = $date->format('D, d/m/Y H:i:s');


		}



		
		return $query;
	}



 
  // Time format is UNIX timestamp or
  // PHP strtotime compatible strings
  function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }
 
    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }
 
    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();
 
    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Create temp time from time1 and interval
      $ttime = strtotime('+1 ' . $interval, $time1);
      // Set initial values
      $add = 1;
      $looped = 0;
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
        // Create new temp time from time1 and interval
        $add++;
        $ttime = strtotime("+" . $add . " " . $interval, $time1);
        $looped++;
      }
 
      $time1 = strtotime("+" . $looped . " " . $interval, $time1);
      $diffs[$interval] = $looped;
    }
    
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
        break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
        // Add s if value is not 1
        if ($value != 1) {
          $interval .= "s";
        }
        // Add value and interval to times array
        $times[] = $value . " " . $interval;
        $count++;
      }
    }
 
    // Return string with times
    return implode(", ", $times);
  }
 

	function get_all_driver_sum($id_partner){
		$sql = "SELECT a.name,a.driverId, count(*) as totalTrip
			FROM  drivers a
			LEFT JOIN orderbooks b 
			ON a.driverId= b.driverId
			WHERE a.status ='A'
			AND b.statusOrder ='CO'
			AND a.partnerId = '".$id_partner."'
			Group by b.driverId";
		$query = $this->db->query($sql)->result();
		for ($i = 0; $i < sizeof($query); $i++){
			$sql2 = "SELECT a.name, b.package,b.packageRun
			FROM  drivers a
			LEFT JOIN orderbooks b 
			ON a.driverId= b.driverId
			WHERE a.status ='A'
			AND b.statusOrder ='CO'
			AND a.partnerId = '".$id_partner."'
			AND b.driverId = '".$query[$i]->driverId."'";
			$q2 = $this->db->query($sql2)->result();
			$value=0;

			


			foreach ($q2 as $r2){
				if($r2->package=='1'){
					if($r2->packageRun<2){
						$value =$value + 250000;
					}else{
						$value = $value + 250000 + (($r2->packageRun-1)*30000);
					}
					
				}else if($r2->packageRun=='2'){
					if($r2->packageRun<2){
						$value =$value + 1000000;
					}else{
						$value =$value + 1000000 +  (($r2->packageRun-1)*30000);
					}
				}else{
					if($r2->packageRun<2){
						$value =$value +6000000;
					}else{
						$value = $value + 6000000 + (($r2->packageRun-1)*30000);
					}
				}
			}

			$query[$i]->earning = $value;
		
		}


		


		return $query;
	}
	
	function get_all_driver_deactive(){
		$sql = "SELECT a.*, b.name as partnerName 
				FROM drivers a
				LEFT JOIN partners b
					ON a.partnerId = b.partnerId
				WHERE a.status = 'D'
				ORDER BY a.driverId DESC";
		$query = $this->db->query($sql)->result();
		return $query;
	}
	
	function get_driver($id_driver){
		$hasil_query = $this->db->select('*')->from('drivers')->where('driverId',$id_driver)->get()->result();
		return $hasil_query[0];
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

	function add_driver(){


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
							'partnerId' =>$this->input->post('partnerId'),
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