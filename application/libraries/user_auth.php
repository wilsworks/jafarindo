<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_auth {

	function __construct()
	{
		$CI =& get_instance();
		session_start();

		preg_match('/news\/news_detail\/([a-zA-Z0-9\_\/]+)/',$CI->uri->uri_string(),$matchnews);
		preg_match('/projects\/([a-zA-Z0-9\_\/]+)/',$CI->uri->uri_string(),$matchproj);
		preg_match('/contact\/([a-zA-Z0-9\_\/]+)/',$CI->uri->uri_string(),$matchcontact);


		if($matchnews){ $NEWS = $matchnews[0]; }else{ $NEWS = ''; }
		if($matchproj) { $PROJ = $matchproj[0]; } else { $PROJ = ''; }
		if($matchcontact) { $CONTACT = $matchcontact[0]; } else { $CONTACT = ''; }



		preg_match('/products\/([a-zA-Z0-9\_\/]+)/',$CI->uri->uri_string(),$match);
		
		if($match){
			$PROD = 'products/'.$match[1];
		}else{
			$PROD = '';
		}

		$allowed_url_list = array (
					'welcome',
					'products',
					$PROD,
					'news',
					$NEWS,
					'about',
					'projects',
					$PROJ,
					'contact',
					$CONTACT,
					'login',
					'register',
					'login/sign_up_get',
					'login/sign_up_save',
					'login/forgot_get',
					'login/forgot_save',
					'm404'
				);
		$sess_username = $CI->session->userdata('username');
		//print_r($CI->session->all_userdata());die();
		if(empty($sess_username) && ($CI->uri->uri_string() != 'login/check')){
			if (in_array($CI->uri->uri_string(),$allowed_url_list)===FALSE){
				redirect('login');
			}
		} elseif (!empty($sess_username)) {
			if($CI->uri->uri_string() == 'login'){
				redirect('dashboard');
			}
			$last_access = $CI->session->userdata('last_access');
			if((time() - $last_access)>3000){
				$CI->session->sess_destroy();
				redirect('login');
			}
			$CI->session->set_userdata('last_access',time());
		}
	}
}
