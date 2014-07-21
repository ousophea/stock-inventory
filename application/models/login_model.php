<?php
class Login_Model extends CI_Model {
	
	function __construct(){
    	parent::__construct();
    	$this->load->database();
	}
	
	function check_user($user_name,$user_password){
		
		$row = array();
		$this->db->select('*');
		$this->db->where('username',$user_name);
		$this->db->where('password',$user_password);
		$this->db->where('active',1);
		$this->db->limit(1);
		$query = $this->db->get('tbl_user');
		if($query->num_rows()>0){
			$row=$query->row();			
		}		
		return $row;
		
	}
}