<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
		# MODEL
		date_default_timezone_set('Asia/Manila');
		// $this->load->model('page_model');
	}
	
	public function dashboard()
	{
		$data['title'] 		= 'Dashboard';
		$data['page_view'] 	= "dashboard/dashboard_main";

		$this->load->view('main_view', $data);
	}
	
	public function my_borrowed_books(){
		$data['page_view'] = "pages_view/my_borrowed_books_page";
		$this->load->view('main_view', $data);
	}
	
	public function users(){
		$data['title'] 		= 'Users';
		$data['page_view'] 	= "maintenance/users_page";
		$this->load->view('main_view', $data);
	}
	
	public function books(){
		$data['progs_list'] = $this->page_model->prog_list();
		$data['course_list'] = $this->page_model->course_list();
		$data['page_view'] = "pages_view/maintenance/books_page";
		$this->load->view('main_view', $data);
	}
	
	public function announcements(){
		$data['page_view'] = "pages_view/maintenance/announcement_page";
		$this->load->view('main_view', $data);
	}
	
	public function profile(){
		$data['page_view'] = "pages_view/profile/profile_page";
		$data['profile'] = $this->page_model->profile_details($this->session->userdata('ualib_id'));
		$this->load->view('main_view', $data);
	}
	
	public function notifications(){
		$data['page_view'] = "pages_view/notif_page";
		$this->load->view('main_view', $data);
	}
	
	public function reports(){
		$data['page_view'] = "pages_view/reports_page";
		$this->load->view('main_view', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */