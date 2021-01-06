<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		# MODEL
		$this->load->model('users_model');
		date_default_timezone_set('Asia/Manila');
	}
	
	public function get_users(){
		
		$data = array();
		$no = $_POST['start'];
		$user_arr = $this->users_model->get_users($_POST['search']['value'], $_POST['start'],$_POST['length']);
		$tot_records = $this->users_model->get_all_users();
		$tot_filt  = $this->users_model->get_filt_users($_POST['search']['value']);
		
		
		foreach ($user_arr as $list) {
			$row = array();
			$row[] = $list['id'];
			$row[] = $list['username'];
			$row[] = "<a href='#' data-toggle='modal' data-target='#modal_theme_success' data-id='".$list['id']."' onClick='view_dtls(".$list['id'].")'>".$list['user_fullname']."</a>";
			if($list['stats'] == "Active"){
				$row[] = "<span class='label bg-success-400'>".$list['stats']."</span>";
			}
			else{
				$row[] = "<span class='label bg-grey-400'>".$list['stats']."</span>";
			}
			$data[] = $row;
		}
	
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => count($tot_records),
						"recordsFiltered" => count($tot_filt),
						"data" => $data
				);
		
		echo json_encode($output);
	}
	
	public function get_user_dtls(){
		$return_arr = array("status" => 0, "msg"=>"User does not exist");
		
		$user_dtl = $this->users_model->check_user_id($this->input->post('id'));
		// echo"<pre>";var_dump($user_dtl);exit();
		if(is_array($user_dtl) AND count($user_dtl) > 0){
			$eval = "
				$('#id_db').val('".$user_dtl['id']."');
				$('#first_name').val('".$user_dtl['first_name']."');
				$('#middle_name').val('".$user_dtl['middle_name']."');
				$('#last_name').val('".$user_dtl['last_name']."');
				$('#contact').val('".$user_dtl['contact_no']."');
				$('#age').val('".$user_dtl['age']."');
				$('#username').val('".$user_dtl['uName']."');
				$('#sex').select2('data', {id:".$user_dtl['gender']."}).trigger('change');
			";
			$return_arr = array("status" => 1, "data"=>$eval);
		}
		
		echo json_encode($return_arr);
	}
	
	public function save_user(){
		$return_arr = array("status"=> 0, "msg"=> "Error on saving user. Please ceck our details.");
		$check_user = $this->users_model->check_user_no($this->input->post('id_no'));
		if(!is_array($check_user) and count($check_user) == 0){
			$user_data = array(
				"user_no" => trim(strtoupper(strtolower($this->input->post('id_no')))),
				"password" => sha1(trim(strtoupper(strtolower($this->input->post('id_no'))))),
				"first_name" => trim(ucwords(strtolower($this->input->post('first_name')))),
				"middle_name" => trim(ucwords(strtolower($this->input->post('middle_name')))),
				"last_name" => trim(ucwords(strtolower($this->input->post('last_name')))),
				"user_level" => $this->input->post('level'),
				"department" => $this->input->post('dept'),
				"program" => $this->input->post('prog'),
				"year_level" => trim($this->input->post('year_level')),
				"sex" => $this->input->post('sex'),
				"contact_no" => trim($this->input->post('contact')),
				"is_active" => 1,
				"created_by" => $this->session->userdata('ualib_id'),
				"created_date" => date('Y-m-d G:i:s'),
				"modified_by" => $this->session->userdata('ualib_id'),
				"modified_date" => date('Y-m-d G:i:s')
			);
			
			$this->users_model->ins_user($user_data);
			$return_arr = array("status"=> 1, "msg"=> "Successful on saving user.");
			
			
		}
		else{
			$return_arr = array("status"=> 0, "msg"=> "User ID No. already exist.");
		}
		echo json_encode($return_arr);
	}
	
	public function upd_user(){
		$return_arr = array("status"=> 0, "msg"=> "Error on updating user. Please ceck our details.");
		$check_user = $this->users_model->check_user_no($this->input->post('id_no'));
		if($check_user['user_id'] == $this->input->post('id_db')){
			$user_data = array(
				"user_no" => trim(strtoupper(strtolower($this->input->post('id_no')))),
				"first_name" => trim(ucwords(strtolower($this->input->post('first_name')))),
				"middle_name" => trim(ucwords(strtolower($this->input->post('middle_name')))),
				"last_name" => trim(ucwords(strtolower($this->input->post('last_name')))),
				"user_level" => $this->input->post('level'),
				"department" => $this->input->post('dept'),
				"program" => $this->input->post('prog'),
				"year_level" => trim($this->input->post('year_level')),
				"sex" => $this->input->post('sex'),
				"contact_no" => trim($this->input->post('contact')),
				"modified_by" => $this->session->userdata('ualib_id'),
				"modified_date" => date('Y-m-d G:i:s')
			);
			
			$this->users_model->upd_user(array("user_id" => $check_user['user_id']), $user_data);
			$return_arr = array("status"=> 1, "msg"=> "Successful on updating user.");
			
			
		}
		else{
			$return_arr = array("status"=> 0, "msg"=> "User ID No. already exist.");
		}
		echo json_encode($return_arr);
	}
}
