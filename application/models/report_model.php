<?php

class Report_Model extends MY_Model {
	
	function __construct(){
    	parent::__construct();    	
	}
	
	function search_report_num($cat,$status,$startdate,$enddate){
		$result=array();
		$this->db->where('active',1);
		if($status != 0){
			$this->db->where('status_id',$status);
		}
		if($cat!=0){
			$this->db->where('cat_id',$cat);
		}
		if($startdate != "" && $enddate != ""){
			$where = "date_created BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($where);
		}	
			
		$query=$this->db->get('view_stock');
		
		return $query->num_rows;
	}
	
	function search_report($cat,$status,$startdate,$enddate, $page, $uri){		
		$result=array();
		$this->db->where('active',1);
		if($status != 0){
			$this->db->where('status_id',$status);
		}
		if($cat!=0){
			$this->db->where('cat_id',$cat);
		}
		if($startdate != "" && $enddate != ""){
			$where = "date_created BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($where);
		}	
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
	
	function do_generate_report($fileName,$cat,$status,$startdate,$enddate){
		
		$this->db->select("
							code as Code,serial_number as 'Serial Number',
							status as Status,brand as Brand,category as Category,
							location as Location,date_import as 'Imported Date',date_created as 'Used Date'
						");
		$this->db->where('active',1);
		if($status != 0){
			$this->db->where('status_id',$status);
		}
		if($cat!=0){
			$this->db->where('cat_id',$cat);
		}
		if($startdate != "" && $enddate != ""){
			$where = "date_created BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($where);
		}	
		$this->db->order_by('stock_id','DESC');		
		$query=$this->db->get('view_stock');	
		
		$this->load->library('excel_report');
		$this->excel_report->initialize($fileName);
			
		#add 1nd header as an array of 3 columns
		$header = array ("No.","Code","Serial Number","Status","Brand","Category","Location","Imported Date","Used Date");		
		$this->excel_report->addHeader($header);	
		
		if($query->num_rows>0){
			$indx = 0;			
			foreach($query->result_array() as $row){
				//todo add first element
				$indx++;
				array_unshift($row,$indx);
				$this->excel_report->addRow($row);
			}				
		}
		$query->free_result();
		
		$this->excel_report->sendFile();		
		/*
			$delimiter = ",";
			$newline = "\r\n";
			$this->load->dbutil();		
			return $this->dbutil->csv_from_result($query, $delimiter, $newline);
		*/
	}
}
