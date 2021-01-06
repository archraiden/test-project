<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		# MODEL
		$this->load->model('login_model');
		date_default_timezone_set('Asia/Manila');
	}
	
	public function index()
	{
		$this->load->view('login');
	}
	
	public function user_login(){

		$user_name = trim($this->input->post('user_name'));
		$user_pass = trim($this->input->post('user_pass'));

		$arr_return = array("status"=> 0, "msg"=>"Error on validating you access! Please register your credentials to our Administrator!");
		$chck_user = $this->login_model->check_credentials($user_name, $user_pass);

		// // CHECK USERNAME IF EXISTING
		// $username = $this->login_model->checkUsername($_uName);
		if(is_array($chck_user) AND count($chck_user) > 0){
			$user_info = $this->login_model->get_personal_info($chck_user['id']);

			// SET USER PERSONAL INFORMATION INTO SESSION.
			$user_session = array(
				"u_id" => $chck_user['id'],
				"u_name" => $chck_user['uName'],
				"u_fullname" => $user_info['first_name']." ".$user_info['last_name'],
				"u_gender" => $user_info['gender'],
				"u_contact" => $user_info['contact_no'],
				"u_age" => $user_info['age']
			);
			$this->session->set_userdata($user_session);

			$this->login_model->update_user_login($chck_user['id'], array('last_login'=> date('Y-m-d G:i:s'),'is_loggedIn' => '1'));

			
			$html_redirect = "window.location.href = '".base_url()."page/dashboard/';";
			
			
			$arr_return = array("status"=> 1, "link"=>$html_redirect);
		}
		else{
			$arr_return = array("status"=> 0, "msg"=>"Your user does not exist! Please contact System Administrator!");
		}
		
		echo json_encode($arr_return);
	}
	
	public function update_password(){
		$user = trim($this->input->post('user_id'));
		$new_pass = $this->input->post('new_pass');
		$conf_pass = $this->input->post('conf_pass');
		
		$check_user = $this->login_model->check_user($user);
		
		if($check_user > 0){
			
			if($new_pass == $conf_pass AND STRLEN($conf_pass) >= 8 ){
				
				$pass_arr = array("password"=> sha1($conf_pass));
				$save_new_pass = $this->login_model->update_password($user, $pass_arr);
				
				if($save_new_pass == 1){
					$return_arr = array("status"=> 1, "msg"=>"Resetting password successful!");
					
				}
				else{
					$return_arr = array("status"=> 0, "msg"=>"Error on resetting password.");
				}
			}
			else{
				$return_arr = array("status"=> 0, "msg"=>"New Password and Confirm Password are not the same or not equal to 8 characters.");
			}
		}
		else{
			$return_arr = array("status"=> 0, "msg"=>"ID No. does not exist.");
		}
		
		echo json_encode($return_arr);
	}
	
	public function logout(){
		$user_session = array(
			"ualib_id",
			"ualib_no",
			"ualib_fullname",
			"ualib_level"
		);
		$this->session->unset_userdata($user_session);
		$this->session->sess_destroy();
		
		echo "window.location.href = '".base_url()."login/';";
	}
	
	public function check_session(){
		if($this->session->userdata('ualib_id')){
			$arr_return = array('status' => 1, 'text' => 'Session is still alive!');
		}
		else{
			$arr_return = array('status' => 0, 'text' => 'Session is exipred! You may need to relogin.');
		}
		
		echo json_encode($arr_return);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */