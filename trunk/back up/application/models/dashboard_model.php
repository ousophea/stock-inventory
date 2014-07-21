<?php
//require_once('base_model.php');
class Dashboard_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
	
	function statistic_stock(){		
		$result=array();
		$this->db->select('count(*) stock');		
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		$this->db->where('st.active',1);		
		$this->db->where('status.status_id',1);			
		$query=$this->db->get('tbl_stock st');
		if($query->num_rows>0){
			$result = $query->row();
		}
		$query->free_result();
		return $result;
	}
	function statistic_problem(){		
		$result=array();
		$this->db->select('count(*) problem');		
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		$this->db->where('st.active',1);		
		$this->db->where('status.status_id',3);			
		$query=$this->db->get('tbl_stock st');
		if($query->num_rows>0){
			$result = $query->row();
		}
		$query->free_result();
		return $result;
	}
	function statistic_used(){		
		$result=array();
		$this->db->select('count(*) used');		
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		$this->db->where('st.active',1);		
		$this->db->where('status.status_id',2);			
		$query=$this->db->get('tbl_stock st');
		if($query->num_rows>0){
			$result = $query->row();
		}
		$query->free_result();
		return $result;
	}
}
