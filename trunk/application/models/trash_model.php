<?php

class Trash_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
	function trash_num(){
		
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');
		$this->db->where('st.active',0);		
		$this->db->order_by('st.stock_id','DESC');
		$query=$this->db->get('tbl_stock st');		
		
		return $query->num_rows;
	}
	
	function listTrash($page,$uri){
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');
		$this->db->where('st.active',0);
		$this->db->order_by('st.stock_id','DESC');
			
		$query=$this->db->get('tbl_stock st',$page,$uri);
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		return $result;
	}
	
	function search_trash_num($txt){
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_location loc','st.loc_id=loc.loc_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		
		$where = "(st.active='0')";
		if($txt != ""){
			$where .=" AND (st.code LIKE '%".$txt;
			$where .="%' OR st.serial_number LIKE '%".$txt;
			$where .="%' OR cat.category LIKE '%".$txt;
			$where .="%' OR br.brand LIKE '%".$txt;			
			$where .="%' OR st.remark LIKE '%".$txt."%')";		
		}
		$this->db->where($where);
			
		$this->db->order_by('st.stock_id','DESC');			
		$query=$this->db->get('tbl_stock st');
		
		return $query->num_rows;
	}
	
	function search_trash($txt, $page, $uri){		
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');		
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		
		$where = "(st.active='0')";
		if($txt != ""){
			$where .=" AND (st.code LIKE '%".$txt;
			$where .="%' OR st.serial_number LIKE '%".$txt;
			$where .="%' OR cat.category LIKE '%".$txt;
			$where .="%' OR br.brand LIKE '%".$txt;			
			$where .="%' OR st.remark LIKE '%".$txt."%')";		
		}
		$this->db->where($where);	
		
		$this->db->order_by('st.stock_id','DESC');			
		$query=$this->db->get('tbl_stock st',$page,$uri);
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		return $result;
	}

}
