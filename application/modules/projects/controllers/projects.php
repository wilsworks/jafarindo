<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class projects extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_content');
	}

	function index(){
		// Manatory
		$data['about'] = $this->mdl_content->get_company_profile('about');
		$data['about_short'] = $this->mdl_content->get_company_profile('about_short');
		$contact= $this->mdl_content->get_company_profile('kontak');
		$data['contact'] = $contact->value;
		$data['social_media'] = $this->mdl_content->get_social_media();
		//perpages
		$data['recent_news'] = $this->mdl_content->get_recent_news();
		// print_r($data['slider']);die();
		$data['projects'] = $this->mdl_content->get_all_project_active();
		
		
		$this->menu_handler->set_menu_frontend('home','Partner',$data,2,3);
	}


	function projects_show($id_news){
		$data['about'] = $this->mdl_content->get_company_profile('about');
		$data['about_short'] = $this->mdl_content->get_company_profile('about_short');
		$contact= $this->mdl_content->get_company_profile('kontak');
		$data['contact'] = $contact->value;
		$data['social_media'] = $this->mdl_content->get_social_media();
		//perpages
		$data['recent_news'] = $this->mdl_content->get_recent_news();
		$data['news'] = $this->mdl_content->get_news_byid($id_news);
		$data['news_lastest'] = $this->mdl_content->get_news_lastest($id_news);
		$data['id_news'] = $id_news;

		$data['projects'] = $this->mdl_content->get_all_project_active();
		$data['typeproject']= $this->mdl_content->get_all_project_type();
		// print_r($data['typeproject']);die();
		// print_r($data['projects_lastest']);die();
		$this->menu_handler->set_menu_frontend('projects','Partner',$data,2,3);

	}


	function projects_detail($id_news){
		$data['about'] = $this->mdl_content->get_company_profile('about');
		$data['about_short'] = $this->mdl_content->get_company_profile('about_short');
		$contact= $this->mdl_content->get_company_profile('kontak');
		$data['contact'] = $contact->value;
		$data['social_media'] = $this->mdl_content->get_social_media();

		//perpages
		$data['recent_news'] = $this->mdl_content->get_recent_news();
	
		$data['news'] = $this->mdl_content->get_news_byid($id_news);
		
		$data['news_lastest'] = $this->mdl_content->get_news_lastest($id_news);
		$data['id_news'] = $id_news;

		// print_r($data['projects_lastest']);die();
		$this->menu_handler->set_menu_frontend('projects','Partner',$data,2,3);

	}
		
	
	function check($data=array()){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		if(!empty($username)){
			date_default_timezone_set('Asia/Jakarta');
			
			$detail_login = $this->mdl_login->get_user($username);
			$tanggal = date('Y-m-d');
			$waktu = date('H:i:s');
			
			if ($detail_login !== FALSE && ($detail_login->password == sha1($password))){
				$validasi = $this->mdl_login->validate_session($username);
				
				if(isset($validasi[0])){
					$this->mdl_login->remove_session($validasi[0]->session_id);
				}	


				$user_data = array(
					$id = $detail_login->id,
					$nama = $detail_login->nama,
					$priviledge = $detail_login->priviledge,
					'username'=>$username,
					'nama'=>$nama,
					'id'=>$id,
					'idChild'=>$detail_login->idChild,
					'priviledge'=>$priviledge,
					'tanggal'=>$tanggal,
					'waktu'=>$waktu,
					'last_access'=>time()
					);
			
				$this->session->set_userdata($user_data);
				//$this->session->set_userdata('nama');
				$ip_user =  $this->input->ip_address();
				$this->session->set_flashdata('false_login','Wrong Username / Password!');
				$this->session->set_flashdata('username',$username);
				$this->activity_logging->user_logging(0,"Login tanggal ".date('d-m-Y')." - ".$waktu." dari IP : ".$ip_user);
				
				redirect('dashboard');
				
			} elseif (($detail_login ===FALSE) || ($detail_login->password != sha1($password))){
				$this->session->set_flashdata('false_login','Wrong Username / Password!');
				$this->session->set_flashdata('username',$username);
			}
		}
		
		redirect('login');
	}
	
	function logout(){		
		$ip_user =  $this->input->ip_address();	
		$this->activity_logging->user_logging(0,"Logout tanggal ".date('d-m-Y')." dari IP : ".$ip_user);
		$this->session->sess_destroy();
		redirect('login');
	}
	
	function forgot_password(){
		$this->load->view('forgot_password');
	}
		
	function sign_up_get(){
		$this->load->view('sign_up');
	}
	
	function sign_up_save(){
		$username=$this->input->post('username');
		$detail_user = $this->mdl_login->get_user($username);
		if ($detail_user === FALSE ){
			$result = $this->mdl_login->add_user();
			$this->session->set_flashdata('false_logup','User has been created!');
			$this->session->set_flashdata('username',$username);
			
			$detail_login = $this->mdl_login->get_user($username);
			
				$validasi = $this->mdl_login->validate_session($username);
				
				if(isset($validasi[0])){
					$this->mdl_login->remove_session($validasi[0]->session_id);
				}
				$user_data = array(
					$id = $detail_login->id,
					$nama = $detail_login->nama,
					$priviledge = $detail_login->priviledge,
					'username'=>$username,
					'nama'=>$nama,
					'id'=>$id,
					'priviledge'=>$priviledge,
					'tanggal'=>$tanggal,
					'waktu'=>$waktu,
					'last_access'=>time()
					);
			
				$this->session->set_userdata($user_data);
				$ip_user =  $this->input->ip_address();
				$this->activity_logging->user_logging(0,"Login tanggal ".date('d-m-Y')." - ".$waktu." dari IP : ".$ip_user);
				redirect('dashboard');
				
		} elseif ($detail_user !==FALSE){
			
			$this->session->set_flashdata('false_logup','Username has been used!');
			$this->session->set_flashdata('username',$username);
		}
		
		redirect('login/sign_up_get');
	}
	
	function forgot_get(){
		$this->load->view('forgot');
	}
	
	function forgot_save(){
		$username=$this->input->post('username');
		$email = $this->input->post('email');
		$detail_user = $this->mdl_login->get_user($username);
		if ($detail_user !== FALSE && ($detail_user->email== $email)){
			/*******************************************************************
			  Example of sending email using gmail.com SMTP server and phpmailer
			*******************************************************************/
			//require_once(APPPATH."libraries/mailer/class.phpmailer.php");
			//require_once(APPPATH."third_party/mailer/phpmailer/class.phpmailer.php");
			$from = 'y7pratama@gmail.com';
			//$from_name = 'Levitas';
			//$subject ='tes php mailer';
			//$body = 'boleh tess';
			$to = 'ybazzard@gmail.com';
			
			$this->load->library('email');

            $subject = 'This is a test';
            $message = '<p>This message has been sent for tesing purposes.</p>';

            // Get full html:
            $body =
				'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>'.htmlspecialchars($subject, ENT_QUOTES, $this->email->charset).'</title>
					<style type="text/css">
						body {
							font-family: Arial, Verdana, Helvetica, sans-serif;
							font-size: 16px;
						}
					</style>
				</head>
				<body>
				'.$message.'
				</body>
				</html>';
							// Also, for getting full html you may use the following internal method:
							//$body = $this->email->full_html($subject, $message);

			$result = $this->email
				->from('y7pratama@gmail.com')
				->reply_to('ypratama7@gmail.com')    // Optional, an account where a human being reads.
				->to($to)
				->subject($subject)
				->message($body)
				->send();

			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();

			exit;
			
		}elseif (($detail_user ===FALSE) || ($detail_user->email != $email)){
			$this->session->set_flashdata('false_login','Wrong Username / Email!');
			$this->session->set_flashdata('username',$username);
		}
			redirect('login/forgot_get');
				
		}
		
	private function _msg_html ()
	{
		$str ='<h2>Dear, '.'John Doe'.''.'989898'.'</h2>';
		$str .='Thank you for using our services. Please find your monthly phone bill as follow. ';
		$data['data']  = 'Tes email donk';
		//$data['rincian'] = $this->data->cetak_rincian_by_customer();
		
		
			$str .= $this->load->view('reset_password',$data, true);
		
		
		$str .='<br />
			
			Please kindly make your payment remittance in timely manner by cash or transfer to: <br />

			PT. ARTHA TELEKOMINDO <br />
			BANK ARTHA GRAHA <br />
			008.127.0911 <br />
			Please send the copy of bank transfer by fax to : 515-5286 or by e-mail to billing@arthatel.co.id <br />
			Thank you for your attention and cooperation. <br />
			
			Best Regards, <br />
			Billing Department <br />
			PT Artha Telekomindo <br />
			Jl. Jend. Sudirman Kav 52-53 <br />
			Jakarta 12190 - Indonesia <br />
			Phone : +62.21 515.0000 <br />
			Fax : +61.21 515.5286 <br />
			Email : billing@arthatel.co.id <br />
			';
			
		return $str;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */