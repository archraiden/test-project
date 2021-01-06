<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Model {

	function getMenuHeader($level) 
    {
       
        $getDept = "SELECT 
					* 
					FROM menu
					WHERE menu_lvl LIKE  '%".$level."%'
					AND second_lvl = 0
					AND third_lvl = 0
					ORDER BY first_lvl";  
        $qry = $this->db->query($getDept);
        return $qry->result_array();
    }

    function getSubMenuHeader($level, $firstLvl) 
    {
        
        $getDept = "SELECT 
					* 
					FROM menu
					WHERE menu_lvl LIKE '%".$level."%'
						AND first_lvl = '".$firstLvl."' 
						AND second_lvl <> '0' 
						AND third_lvl = 0
					ORDER BY first_lvl,second_lvl"; 
              
        $qry = $this->db->query($getDept);
        return $qry->result_array();
    }
	
	function getSubSubMenuHeader($level, $firstLvl,$secondLvl) 
    {
        
        $getDept = "SELECT 
					* 
					FFROM menu
					WHERE menu_lvl LIKE '%".$level."%'
						AND first_lvl = '".$firstLvl."' 
						AND second_lvl = '".$secondLvl."' 
						AND third_lvl <> '0'
					ORDER BY first_lvl,second_lvl"; 
               
        $qry = $this->db->query($getDept);
        return $qry->result_array();
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */