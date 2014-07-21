<?php
class MY_Model extends CI_Model{
	
	
	public function __construct(){
		parent::__construct();
		$this->load->database();		
	}	
	
	function get_row_num($table){
		$query=$this->db->get($table);		
		return $query->num_rows();
	}	
	
	function get_row_num_by($table,$field,$field_data){
		$this->db->where($field,$field_data);
		$query=$this->db->get($table);		
		return $query->num_rows();
	}
	
	public function get_all_data($tblname,$field,$sort_by){
		$result=array();
		$this->db->select('*');
		$this->db->from($tblname);		
		$this->db->order_by($field,$sort_by);
		$query=$this->db->get();
		
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		
		return $result;
	}
	
	function combobox($tblname,$fieldId,$fieldName,$sort_by,$txt){
		$arr=array();
		if($txt != ""){
			$arr[0]= $txt;
		}
		$groups=$this->get_all_data($tblname,$fieldName,$sort_by);
		foreach($groups as $group){
			$arr[$group[$fieldId]]=$group[$fieldName];
		}
		return $arr;
	}	
	
		
	public function get_all_data_by($tblname,$field,$data_field,$field_sort){
		$result=array();
		$this->db->select('*');
		$this->db->from($tblname);
		$this->db->where($field,$data_field);
		$this->db->order_by($field_sort,'DESC');
		$query=$this->db->get();
		
		if($query->num_rows>0){
			foreach($query->result_array() as $row){
				$result[]=$row;
			}
		}
		$query->free_result();
		
		return $result;
	}
	
	
	
	public function get_data_by($tblname,$field,$id){
		$arr=array();
		$this->db->select('*');
		$this->db->where($field,$id);
		$this->db->limit(1);
		$query=$this->db->get($tblname);
		if($query->num_rows()>0){
			$arr=$query->row();
		}
		$query->free_result();
		return $arr;
	}
	
	public function save($tblname,$data){		
		$this->db->insert($tblname,$data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}
	
	public function update($tblname,$data,$field,$id){
		$this->db->where($field,$id);
		$this->db->update($tblname,$data);
	}
	
	public function delete($tblname,$field,$id){
		$this->db->where($field,$id);
		return $this->db->delete($tblname);
	}
	
	public function check_page_access($modules,$page_check,$page_deny){
		$bool = FALSE;
		foreach($modules as $key=>$val):
			$pages = explode(',',$key);
			if(in_array($page_check,$pages)){
				$bool = TRUE;
			}
		endforeach;
		if($bool==FALSE){
			redirect($page_deny,'');
		}
	}	
	
		
    
    public function do_resize_image($file,$width,$height){    	
    	$config['image_library'] = 'gd2';
    	$configThumb['width'] = $width;  
	    $configThumb['height'] = $height;	    
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;  
	    /* Load the image library */  
	    $this->load->library('image_lib');
	    $configThumb['source_image'] = $file['full_path'];  
      	$this->image_lib->initialize($configThumb);  
      	$this->image_lib->resize();
    }
	
	function send_mail_request($from=null,$from_name=null,$email=NULL,$subject='No Subject',$view=NULL,$data=array())
	{		
		$this->load->library('email');		
        $this->load->helper('security');
      	$this->load->helper('email');
      	
		$config['protocol']='smtp';		
		$config['smtp_host']='ssl://mail.bitus.com.kh';//'ssl://smtp.googlemail.com';  
		$config['smtp_port']='465';  
		$config['smtp_timeout']='60';  
		$config['smtp_user']='admin1@bitus.com.kh';  
		$config['smtp_pass']='123456';  
		$config['charset']='utf-8';  
		$config['newline']="\r\n";          
       	// Setup Email settings
		$this->email->initialize($config);
		
		// Build email
		//$subject = "[".$this->CI->preference->item('site_name')."] " . $subject;
		$this->load->library('parser');
		$message = $this->parser->parse($view, $data, TRUE);
		//$message = $this->parser->parse($data);

		// Send email
		$this->email->from($from,$from_name);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);

		if( !$this->email->send())
		{
			return FALSE;
		}

		return TRUE;
	}
	
	
	function base_encode($data = null)
	{
		$str = '';
		$index = 0;
		foreach($data as $key => $val){
			if($index == 0){
				$str .= '{"'.$key.'":"'.$val.'"';
				
			}else{
				$str .= ',';
				$str .= '"'.$key.'":"'.$val.'"';
			}
			$index++;
		}
		$str = ($str==''?'':$str.'}');
		return $str;
	}
	
	function base_encode_all($data = null)
	{
		$result = '[';
		$ind = 0;
		foreach($data as $arr){
			$str = '';
			$index = 0;
			foreach($arr as $key => $val){
				if($index == 0){
					$str .= '{"'.$key.'":"'.$val.'"';
					
				}else{
					$str .= ',';
					$str .= '"'.$key.'":"'.$val.'"';
				}
				$index++;
			}
			
			$ind++;
			if($ind==count($data)){
				$str = ($str==''?'':$str.'}');
			}else{
				$str = ($str==''?'':$str.'},');
			}
			
			$result .= $str;
		}
		$result .= "]";
		
		return $result;
	}
	
}