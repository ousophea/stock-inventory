<?php

class Item_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
	function get_item_num(){		
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_location loc','st.loc_id=loc.loc_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');
		$this->db->where('st.active',1);
		$this->db->where('status.status',"Used");		
		$query=$this->db->get('tbl_stock st');	
		
		return $query->num_rows();		
	}
	
	function listItem($page,$uri){
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_location loc','st.loc_id=loc.loc_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');
		$this->db->where('st.active',1);
		$this->db->where('status.status',"Used");
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
	
	function combobox_serial(){
		$arr=array();
		$arr[0] = '--- Please select ---';		
		$groups = $this->get_all_serial_by();		
		foreach($groups as $group){
			$arr[$group['stock_id']]=$group['serial_number'];
		}
		return $arr;
	}
	
	function get_all_serial_by(){
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_status status','status.status_id=stock.status_id');		
		$this->db->where('stock.active',1);
		$this->db->where('status.status','Stock');
		$this->db->order_by('stock.serial_number','ASC');	
		$query=$this->db->get('tbl_stock stock');
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		return $result;
	}
	
	function check_exist_code($code){
		$result=TRUE;
		$this->db->select('*');
		$this->db->where('code',$code);
		$this->db->where('status_id','2');	
		$query=$this->db->get('tbl_stock');
		if($query->num_rows()>0){
			$result = FALSE;
		}
		$query->free_result();
		return $result;
	}
	
	function search_item_num($txt){
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_location loc','st.loc_id=loc.loc_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		
		$where = "(st.active='1') AND (status.status='Used')";
		if($txt != ""){
			$where .=" AND (st.code LIKE '%".$txt;
			$where .="%' OR st.serial_number LIKE '%".$txt;
			$where .="%' OR cat.category LIKE '%".$txt;
			$where .="%' OR br.brand LIKE '%".$txt;
			$where .="%' OR loc.location LIKE '%".$txt; 
			$where .="%' OR st.remark LIKE '%".$txt."%')";		
		}
		$this->db->where($where);
			
		$this->db->order_by('st.stock_id','DESC');			
		$query=$this->db->get('tbl_stock st');
		
		return $query->num_rows;
	}
	
	function search_item($txt, $page, $uri){		
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');
		$this->db->join('tbl_location loc','st.loc_id=loc.loc_id');
		$this->db->join('tbl_status status','status.status_id=st.status_id');		
		
		$where = "(st.active='1') AND (status.status='Used')";
		if($txt != ""){
			$where .=" AND (st.code LIKE '%".$txt;
			$where .="%' OR st.serial_number LIKE '%".$txt;
			$where .="%' OR cat.category LIKE '%".$txt;
			$where .="%' OR br.brand LIKE '%".$txt;
			$where .="%' OR loc.location LIKE '%".$txt; 
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
	
	function list_item_by($id=0){		
		$result=array();
		$this->db->select('*');
		$this->db->join('tbl_category cat','st.cat_id=cat.cat_id');
		$this->db->join('tbl_brand br','st.brand_id=br.brand_id');
		$this->db->join('tbl_user us','st.user_id=us.user_id');		
		$this->db->join('tbl_status status','status.status_id=st.status_id');
		$this->db->where('st.stock_id',$id);			
		$query=$this->db->get('tbl_stock st');
		if($query->num_rows>0){
			$result = $query->row();
		}
		$query->free_result();
		return $result;
	}
	
}
