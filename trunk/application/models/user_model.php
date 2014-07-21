<?php
class User_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
	function check_exist_user($username,$email){
		$result=TRUE;
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('email',$email);		
		$query=$this->db->get('tbl_user');
		if($query->num_rows>0){
			$result = FALSE;
		}
		$query->free_result();
		return $result;
	}
	
	function get_user_data_by($id,$role){
		$result = array();
		
		$this->db->select('*');
		if($role==0){
			$this->db->where('user_id',$id);
		}
		$this->db->where('active',1);
		$query = $this->db->get('tbl_user');
		if($query->num_rows>0){
			foreach ($query->result_array() as $row) {
				$result[] = $row;
			}
			
		}
		$query->free_result();
		
		return $result;
	}
}
