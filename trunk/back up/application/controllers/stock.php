<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends Base_Controller {
	
	private $page = "stock";
	private $table = "tbl_stock";
	private $count_used = "";
	private $count_stock = "";
	private $count_problem = "";
	function __construct()
	{
		parent::__construct($this->page);	
		$this->load->model('stock_model','obj');
		$this->count_used = $this->obj->statistic_used();
		$this->count_stock = $this->obj->statistic_stock();
		$this->count_problem = $this->obj->statistic_problem();
	}

	function index()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'stock/index';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->list_stock_num();
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$data['links']=$this->pagination->create_links();
		$data['instock'] = $this->count_stock;
		$data['used'] = $this->count_used;
		$data['problem'] = $this->count_problem;
		$data['current'] = 'all';
		
		$data['listStock'] = $this->obj->listStock($pageNumber,$this->uri->segment(3));
		$this->load->view('stock/stock_message',$data);
	}
	
	function instock()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'stock/stock';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->stock_num();
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		$data['instock'] = $this->count_stock;
		$data['used'] = $this->count_used;
		$data['problem'] = $this->count_problem;
		$data['current'] = 'stock';
		
		$data['listStock'] = $this->obj->stock($pageNumber,$this->uri->segment(3));
		$this->load->view('stock/stock_message',$data);
	}
	
	function used()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'stock/used';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->used_num();
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		$data['instock'] = $this->count_stock;
		$data['used'] = $this->count_used;
		$data['problem'] = $this->count_problem;
		$data['current'] = 'used';
		
		$data['listStock'] = $this->obj->used($pageNumber,$this->uri->segment(3));
		$this->load->view('stock/stock_message',$data);
	}
	
	function problem()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'stock/problem';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->problem_num();
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		$data['instock'] = $this->count_stock;
		$data['used'] = $this->count_used;
		$data['problem'] = $this->count_problem;
		$data['current'] = 'problem';
		
		$data['listStock'] = $this->obj->problem($pageNumber,$this->uri->segment(3));
		$this->load->view('stock/stock_message',$data);
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
		
		$this->load->library('pagination');
		
		$config['base_url']=site_url().'stock/search';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->search_num($txt_search);
		$pageNumber = 10;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
		$data['listStock'] = $this->obj->search_stock($txt_search,$pageNumber,$this->uri->segment(3));
		$this->load->view('stock/search_stock_message',$data);
	}
	
	function add(){
		
		$this->load->library('form_validation');
		$data['listCategory'] = $this->obj->combobox('tbl_category','cat_id','category','ASC','--- Please select ---');
		$data['listBrand'] = $this->obj->combobox('tbl_brand','brand_id','brand','ASC','--- Please select ---');
		$data['listStatus'] = $this->obj->combobox('tbl_status','status_id','status','ASC','');	
		
		$config = array(				   
				   array(
						 'field'   => 'serialNumber', 
						 'label'   => 'Serial Number', 
						 'rules'   => 'callback_check_new_stock'
					  )
				);
		
		$this->form_validation->set_rules($config);	
		$this->form_validation->set_message('check_new_stock', 'The document is already exists');		
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('stock/add_stock',$data);
		}else{
			$this->save();
			redirect($this->page,'');			
		} 
	}
	
	function save(){
		$date = date('Y-m-d H:m:s');
		$data = array(
					'serial_number' => $this->input->post('serialNumber'),
					'cat_id' => $this->input->post('ddCategory'),
					'brand_id' => $this->input->post('ddBrand'),
					'date_import' => $this->input->post('txtdate'),
					'user_id' => get_cookie('inventory_user_id'),
					'status_id' => 1,
					'date_created' => $date,
					'date_modified' => $date
				);
		$this->obj->save($this->table,$data);
	}
	
	function check_new_stock(){
		$serial=$this->input->post('serialNumber');
		$cate=$this->input->post('ddCategory');
		$brand=$this->input->post('ddBrand');
				
		return $this->obj->check_exist_stock($serial,$cate,$brand);
	}
	
	function edit($id=0){
		$data['listCategory'] = $this->obj->combobox('tbl_category','cat_id','category','ASC','--- Please select ---');
		$data['listBrand'] = $this->obj->combobox('tbl_brand','brand_id','brand','ASC','--- Please select ---');
		$data['listStatus'] = $this->obj->combobox('tbl_status','status_id','status','ASC','');	
		$data['stock'] = $this->obj->get_data_by('tbl_stock','stock_id',$id);
		
		$this->load->library('form_validation');
		$config = array(				   
				   array(
						 'field'   => 'serialNumber', 
						 'label'   => 'Serial Number', 
						 'rules'   => 'required'
					  )
				);
		
		$this->form_validation->set_rules($config);			
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('stock/edit_stock',$data);
		}else{		
			$this->update();
			redirect($this->page,'');			
		}
	}
	
	function update(){
		$date = date('Y-m-d H:m:s');
		$id = $this->input->post('id');
		$data = array(
					'code' => $this->input->post('code'),
					'serial_number' => $this->input->post('serialNumber'),
					'cat_id' => $this->input->post('ddCategory'),
					'brand_id' => $this->input->post('ddBrand'),
					'date_import' => $this->input->post('txtdate'),
					'status_id' => $this->input->post('ddStatus'),
					'user_id' => get_cookie('inventory_user_id'),					
					'remark' => $this->input->post('remark'),
					'date_modified' => $date
				);
		$this->obj->update($this->table,$data,'stock_id',$id);
	}
	
	function delete($id=0){
		$data = array('active' => 0);
		$this->obj->update($this->table,$data,'stock_id',$id);
		redirect($this->page,'');
	}
	
	function deleteall(){
		$ids = $this->input->post('chkboxes');
		for($i=0;$i<count($ids);$i++){
			$id = $ids[$i];
			$data = array('active' => 0);
			$this->obj->update($this->table,$data,'stock_id',$id);
		}
		redirect($this->page,'');
	}
	
	/*
	 * todo add data category
	 * 
	 */
	
	//todo save category with ajax jquery
	function add_category(){
		$data = array('category'=>$_POST['txtnamecat']);
		$ans = $this->obj->save('tbl_category',$data);
		if($ans){
			$data = $this->obj->get_all_data('tbl_category','category','ASC');		
			echo $this->obj->base_encode_all($data);
		}else{
			echo $ans;
		}		
	}
	
	//todo ajax page with encode
	function get_cat_code($name){
		$name = str_replace('%20',' ',$name);		
		$data = $this->obj->get_data_by('tbl_category','category',trim($name));
		echo $this->obj->base_encode($data);		
	}
	
	/*
	 * todo add data brand
	 * 
	 */
	
	//todo save brand with ajax jquery
	function add_brand(){
		$data = array('brand'=>$_POST['txtnamebrand']);
		$ans = $this->obj->save('tbl_brand',$data);
		if($ans){
			$data = $this->obj->get_all_data('tbl_brand','brand','ASC');		
			echo $this->obj->base_encode_all($data);
		}else{
			echo $ans;
		}		
	}
	
	//todo ajax page with encode
	function get_brand_code($name){
		$name = str_replace('%20',' ',$name);		
		$data = $this->obj->get_data_by('tbl_brand','brand',trim($name));
		echo $this->obj->base_encode($data);		
	}
	
}

/* End of file stock.php */