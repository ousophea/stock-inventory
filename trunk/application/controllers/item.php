<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends Base_Controller {
	
	private $page = "item";
	private $table = "tbl_stock";
	function __construct()
	{
		parent::__construct($this->page);	
		$this->load->model('item_model','obj');
	}

	function index()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'item/index';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->get_item_num();
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
		$data['listItem'] = $this->obj->listItem($pageNumber,$this->uri->segment(3));
		$this->load->view('item/item_message',$data);
	}
	
	function history($id=0)
	{		
		//set parameter of pagination	
		$data['listItem'] = $this->obj->get_all_data_by('view_history','stock_id',$id,'stock_id');
		$this->load->view('item/history_message',$data);
	}
	
	function search()
	{		
		$txt = $this->input->post("txtSearch");
		$txt_search = $txt;
				
		if(isset($_POST['txtSearch'])){
			$txt_search_cookie = array(
			                       	'name'   => 'inventory_txt_search',
			                       	'value'  => $txt,
			                       	'expire' => time()+600						
			                    );
			                    
			set_cookie($txt_search_cookie);
			
		}else{
			$txt_search = get_cookie('inventory_txt_search');
		}
		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'item/search';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->search_item_num($txt_search);
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
		$data['listItem'] = $this->obj->search_item($txt_search,$pageNumber,$this->uri->segment(3));
		$this->load->view('item/search_item_message',$data);
	}
	
	function add(){
		
		$this->load->library('form_validation');
		$data['listCategory'] = $this->obj->combobox('tbl_category','cat_id','category','ASC','--- Please select ---');
		$data['listBrand'] = $this->obj->combobox('tbl_brand','brand_id','brand','ASC','--- Please select ---');			
		$data['listLocation'] = $this->obj->combobox('tbl_location','loc_id','location','ASC','--- Please select ---');
		$data['listSerial'] = $this->obj->combobox_serial();
		$config = array(				   
				   array(
						 'field'   => 'code', 
						 'label'   => 'code', 
						 'rules'   => 'callback_check_new_code'
					  )
				);
		
		$this->form_validation->set_rules($config);	
		$this->form_validation->set_message('check_new_code', 'The code is already exists');		
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('item/add_item',$data);
		}else{
			$this->save();
			redirect($this->page,'');			
		} 
	}
	
	function check_new_code(){
		$code=$this->input->post('code');
		return $this->obj->check_exist_code($code);
	}
	
	function save(){
		//$date = date('Y-m-d H:m:s');
		$id = $this->input->post('ddSerial');
		$code = $this->input->post('code');
		$remark = $this->input->post('remark');
		$location = $this->input->post('ddLocation');		
				
		$data = array(
					'code' => $code,
					'loc_id' => $location,
					'remark' => $remark,
					'status_id' => 2//2 is used
				);		
		$this->obj->update($this->table,$data,'stock_id',$id);
		 
	}
	
	function edit($id=0){
		$data['listCategory'] = $this->obj->combobox('tbl_category','cat_id','category','ASC','--- Please select ---');
		$data['listBrand'] = $this->obj->combobox('tbl_brand','brand_id','brand','ASC','--- Please select ---');		
		$data['listLocation'] = $this->obj->combobox('tbl_location','loc_id','location','ASC','--- Please select ---');			
		$data['listStatus'] = $this->obj->combobox('tbl_status','status_id','status','ASC','');
		$data['stock'] = $this->obj->get_data_by('tbl_stock','stock_id',$id);
		$data['listSerial'] = $this->obj->combobox_serial();
		$this->load->library('form_validation');
		$config = array(				   
				   array(
						 'field'   => 'code', 
						 'label'   => 'code', 
						 'rules'   => 'required'
					  )
				);
		
		$this->form_validation->set_rules($config);			
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('item/edit_item',$data);
		}else{		
			$this->update();
			redirect($this->page,'');			
		}
	}
	
	function update(){
		$date = date('Y-m-d H:i:s');
		$ddSerial = $this->input->post('ddSerial');
		$stock_id = $this->input->post('stock_id');
		$code = $this->input->post('code');
		$status = $this->input->post('ddStatus');
		$remark = $this->input->post('remark');
		
		$location = $this->input->post('ddLocation');
		
		$id = 0;
		
		if($ddSerial==0){
			$id = $stock_id;
		}else{
			$id = $ddSerial;
			
			//todo change
			$data = array('status_id' => 1);		
			$this->obj->update($this->table,$data,'stock_id',$stock_id);
		}
		
		$data = array(
					'code' => $code,
					'loc_id' => $location,
					'remark' => $remark,
					'status_id' => $status
				);		
		$this->obj->update($this->table,$data,'stock_id',$id);			
	}
	
	function delete($id=0){
		$data = array(
						'status_id' => 1,
						'loc_id' => 0
					);
		$this->obj->update("tbl_stock",$data,'stock_id',$id);
		redirect($this->page,'');
	}
	
	function deleteall(){
		$ids = $this->input->post('chkboxes');
		for($i=0;$i<count($ids);$i++){
			$id = $ids[$i];
			$data = array(
						'status_id' => 1,
						'loc_id' => 0
					);
			$this->obj->update("tbl_stock",$data,'stock_id',$id);
		}
		redirect($this->page,'');
	}
	
	//todo ajax page
	function get_code($id=0){
		$data = $this->obj->get_data_by('tbl_stock','stock_id',$id);
		echo $this->obj->base_encode($data);
	}
	
	//todo save location with ajax jquery
	function add_location(){
		$data = array('location'=>$_POST['txtname']);
		$ans = $this->obj->save('tbl_location',$data);
		if($ans){
			$data = $this->obj->get_all_data('tbl_location','location','ASC');		
			echo $this->obj->base_encode_all($data);
		}else{
			echo $ans;
		}		
	}
	
	//todo ajax page with encode
	function get_loc_code($name){
		$name = str_replace('%20',' ',$name);		
		$data = $this->obj->get_data_by('tbl_location','location',trim($name));
		echo $this->obj->base_encode($data);		
	}
}

/* End of file dashboard.php */