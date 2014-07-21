<?php

class Report_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
	function search_report_num($cat,$status,$startdate,$enddate){
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		$this->db->where('st.active',1);
		if($status != 0){
			$this->db->where('status.status_id',$status);
		}
		if($cat!=0){
			$this->db->where('st.cat_id',$cat);
		}
		if($startdate != "" && $enddate != ""){
			$where = "st.date_created BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($where);
		}	
			
		$query=$this->db->get('tbl_stock st');
		
		return $query->num_rows;
	}
	
	function search_report($cat,$status,$startdate,$enddate, $page, $uri){		
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		$this->db->where('st.active',1);
		if($status > 0){
			$this->db->where('status.status_id',$status);
		}
		if($cat > 0){
			$this->db->where('st.cat_id',$cat);
		}
		if($startdate != "" && $enddate != ""){
			$where = "st.date_created BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($where);
		}
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
