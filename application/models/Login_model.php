<?php
class Login_Model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }


    public function check_credentials($uName,$pWord){
        $enc_pass = sha1($pWord);
        $status = 1;
    	$this->db->where('uName', $uName);
		$this->db->where('pWord', $enc_pass);
        $this->db->where('status', $status);
    	$query = $this->db->get('user_tbl');

	 	return $query->row_array();
    }

    public function checkUsername($uName){
		$this->db->where('uName', $uName);
    	$query = $this->db->get('user_tbl');

	 	return $query->row();
    }


    public function get_personal_info($uID){
        $this->db->where('id', $uID);
        $query = $this->db->get('personal_information');

        return $query->row_array();
    }


    public function update_user_login($id, $arr){
        $this->db->where('id', $id);
        $this->db->update('user_tbl',$arr);
    }
}