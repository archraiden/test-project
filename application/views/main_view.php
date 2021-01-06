<?php

//if($this->session->userdata('qdex_id')){
	$this->load->model('menu');
	$this->load->view('pages_includes/header');
	$this->load->view('pages_includes/nav_menu');
	$this->load->view($page_view);
	$this->load->view('pages_includes/footer');
// }
// else{
	 // redirect('login', 'location');
// }

?>
