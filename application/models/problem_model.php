<?php

class Problem_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
		
	/* start problem */
	function problem_num($val){
		
		$this->db->where("process",$val);		
		$query=$this->db->get('view_problem');		
		
		return $query->num_rows;
	}
	
	function problem($val,$page,$uri){
		$result=array();
		$this->db->where("process",$val);				
		$this->db->order_by('pro_id','DESC');
			
		$query=$this->db->get('view_problem',$page,$uri);
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		return $result;
	}
	/* end problem */
	
	function search_num($txt){
		$result=array();
		$where = "(active=1)";
		if($txt != ""){
			$where .=" AND (serial_number LIKE '%".$txt;
			$where .="%' OR process LIKE '%".$txt;
			$where .="%' OR msg LIKE '%".$txt;
			$where .="%' OR priority LIKE '%".$txt;
			$where .="%' OR location LIKE '%".$txt;
			$where .="%' OR code LIKE '%".$txt;		
			$where .="%' OR category LIKE '%".$txt;
			$where .="%' OR brand LIKE '%".$txt;
			$where .="%' OR username LIKE '%".$txt;
			$where .="%' OR date_import LIKE '%".$txt."%')";
			$this->db->where($where);			
		}				
		$query=$this->db->get('view_problem');
		
		return $query->num_rows;
	}
	
	function search_stock($txt, $page, $uri){		
		$result=array();
		$where = "(active=1)";
		if($txt != ""){
			$where .=" AND (serial_number LIKE '%".$txt;
			$where .="%' OR process LIKE '%".$txt;
			$where .="%' OR msg LIKE '%".$txt;
			$where .="%' OR priority LIKE '%".$txt;
			$where .="%' OR location LIKE '%".$txt;
			$where .="%' OR code LIKE '%".$txt;		
			$where .="%' OR category LIKE '%".$txt;
			$where .="%' OR brand LIKE '%".$txt;
			$where .="%' OR username LIKE '%".$txt;
			$where .="%' OR date_import LIKE '%".$txt."%')";			
		}
		$this->db->where($where);		
		$this->db->order_by('pro_id','DESC');
			
		$query=$this->db->get('view_problem',$page,$uri);
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		return $result;
	}
	
	function check_exist_stock($serial,$cat,$brand){
		$result=TRUE;
		$this->db->select('*');
		$this->db->where('serial_number',$serial);
		$this->db->where('cat_id',$cat);
		$this->db->where('brand_id',$brand);	
		$query=$this->db->get('tbl_stock');
		if($query->num_rows>0){
			$result = FALSE;
		}
		$query->free_result();
		return $result;
	}
	
	function statistic($val){		
		$result=array();
		$field = $val;
		$this->db->select('count(*) '.$field);
		$this->db->where('process',$val);				
		$query=$this->db->get('view_problem');
		if($query->num_rows>0){
			$result = $query->row();
		}
		$query->free_result();
		return $result;
	}
	
	
}
