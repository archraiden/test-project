<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	var $user_hdrs = array("u.id","p.first_name","p.last_name",
		"u.status"
	);
	var $defualt_order = " u.id ASC";
	
	function get_users($key,$offset,$limit){
		$where = "";
		if($key !== ""){
			$where = "WHERE ".$this->where_cond($key);
		}
		
		$sql = "SELECT u.id,
				u.uName as username,
				CONCAT(p.first_name,' ',p.last_name) AS user_fullname,
				CASE u.status
					WHEN 1 THEN 'Active'
					ELSE 'Deactivated'
				END AS stats
				FROM user_tbl u
				INNER JOIN personal_information p ON u.id = p.user_id
				".$where."	
				ORDER BY u.id ASC
				LIMIT ".$offset.",".$limit.";";
		
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function get_all_users(){
		$sql = "SELECT *
				FROM user_tbl u
				INNER JOIN personal_information p ON u.id = p.user_id";
				
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function get_filt_users($key){
		$where = "";
		if($key !== ""){
			$where = "WHERE ".$this->where_cond($key);
		}
		
		$sql = "SELECT *
				FROM user_tbl u
				INNER JOIN personal_information p ON u.id = p.user_id
				".$where."	
				ORDER BY u.id ASC;";
				
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	private function where_cond($word){
		$cond = "";
		foreach($this->user_hdrs as $key => $val){
			if($cond == ""){
				$cond = " ".$val." LIKE '%".$word."%'";
			}
			else{
				$cond .= " OR ".$val." LIKE '%".$word."%'";
			}
		}
		return $cond;
	}
	
	function check_user_id($id){
		$sql = "SELECT 
					* 
				FROM user_tbl u
				INNER JOIN personal_information p ON u.id = p.user_id
				WHERE u.id = ".$id.";";
		
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	
	function check_user_no($id_no){
		$sql = "SELECT 
					* 
				FROM user_tbl u
				INNER JOIN personal_information p ON u.id = p.user_id
				WHERE u.id = '".trim(strtoupper(strtolower($id_no)))."';";
		
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	
	function ins_user($arr){
		$this->db->insert('user_tbl',$arr);
		
		return true;
	}
	
	function upd_user($where,$arr){
		$this->db->where($where);
		$this->db->update('user_tbl',$arr);
		
		return true;
	}
	
}