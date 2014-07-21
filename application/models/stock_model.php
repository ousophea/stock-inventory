<?php

class Stock_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
	function list_stock_num(){
			
		$this->db->where('active',1);
		$query=$this->db->get('view_stock');		
		
		return $query->num_rows;
	}
	
	function listStock($page,$uri){
		$result=array();
				
		$this->db->where('active',1);		
		$this->db->order_by('stock_id','DESC');
			
		$query=$this->db->get('view_stock',$page,$uri);
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		return $result;
	}
	
	/* start stock */
	function stock_num($val){
		
		$where = "(active=1) AND (status_id='".$val."')";
		$this->db->where($where);		

		$this->db->order_by('stock_id','DESC');
		$query=$this->db->get('view_stock');		
		
		return $query->num_rows;
	}
	
	function stock($val,$page,$uri){
		$result=array();
		
		$where = "(active=1) AND (status_id='".$val."')";
		$this->db->where($where);		
		$this->db->order_by('stock_id','DESC');
			
		$query=$this->db->get('view_stock',$page,$uri);
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		return $result;
	}
	/* end used */
	
	
	
	function search_num($txt){
		$result=array();
		$where = "(active=1)";
		if($txt != ""){
			$where .=" AND (serial_number LIKE '%".$txt;
			$where .="%' OR code LIKE '%".$txt;			
			$where .="%' OR category LIKE '%".$txt;
			$where .="%' OR brand LIKE '%".$txt;
			$where .="%' OR username LIKE '%".$txt;
			$where .="%' OR date_import LIKE '%".$txt;
			$where .="%' OR status LIKE '%".$txt."%')";
		}
		$this->db->where($where);		
		$this->db->order_by('stock_id','DESC');			
		$query=$this->db->get('view_stock');
		
		return $query->num_rows;
	}
	
	function search_stock($txt, $page, $uri){		
		$result=array();
		$where = "(active=1)";
		if($txt != ""){
			$where .=" AND (serial_number LIKE '%".$txt;
			$where .="%' OR code LIKE '%".$txt;		
			$where .="%' OR category LIKE '%".$txt;
			$where .="%' OR brand LIKE '%".$txt;
			$where .="%' OR username LIKE '%".$txt;
			$where .="%' OR date_import LIKE '%".$txt;
			$where .="%' OR status LIKE '%".$txt."%')";
		}
		$this->db->where($where);		
		$this->db->order_by('stock_id','DESC');
			
		$query=$this->db->get('view_stock',$page,$uri);
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
	
	//todo count statistic
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
