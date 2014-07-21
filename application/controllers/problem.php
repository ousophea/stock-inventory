<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Problem extends Base_Controller {
	
	private $page = "problem";
	private $table = "tbl_problem";
	private $count_open = "";
	private $count_resolved = "";
	private $count_closed = "";
	private $userId = 0;
	
	function __construct()
	{
		parent::__construct($this->page);	
		$this->load->model('problem_model','obj');
		$this->count_open = $this->obj->statistic('Open');
		$this->count_resolved = $this->obj->statistic('Resolved');
		$this->count_closed = $this->obj->statistic('Closed');
		$this->userId = get_cookie('inventory_user_id');
	}

	function index()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'problem/index';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->problem_num('Open');
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
			
		$data['open'] = $this->count_open;
		$data['resolved'] = $this->count_resolved;
		$data['closed'] = $this->count_closed;
		$data['current'] = 'open';
		
		$data['listStock'] = $this->obj->problem('Open',$pageNumber,$this->uri->segment(3));
		$this->load->view('problem/open_problem_message',$data);
	}
	
	function resolved()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'problem/resolved';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->problem_num('Resolved');
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
			
		$data['open'] = $this->count_open;
		$data['resolved'] = $this->count_resolved;
		$data['closed'] = $this->count_closed;
		$data['current'] = 'resolved';
		
		$data['listStock'] = $this->obj->problem('Resolved',$pageNumber,$this->uri->segment(3));
		$this->load->view('problem/resolved_problem_message',$data);
	}
	
	function closed()
	{		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'problem/closed';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->problem_num('Closed');
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
			
		$data['open'] = $this->count_open;
		$data['resolved'] = $this->count_resolved;
		$data['closed'] = $this->count_closed;
		$data['current'] = 'closed';
		
		$data['listStock'] = $this->obj->problem('Closed',$pageNumber,$this->uri->segment(3));
		$this->load->view('problem/closed_problem_message',$data);
	}	
	
	function search()
	{		
		$txt = $this->input->post("txtSearch");
		$txt_search = $txt;
				
		if(isset($_POST['txtSearch'])){
			$txt_search_cookie = array(
			                       	'name'   => 'inventory_problem_search',
			                       	'value'  => $txt,
			                       	'expire' => time()+600						
			                    );
			                    
			set_cookie($txt_search_cookie);
			
		}else{
			$txt_search = get_cookie('inventory_problem_search');
		}
		
		$this->load->library('pagination');
		
		$config['base_url']=site_url().'problem/search';
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
		$this->load->view('problem/search_stock_message',$data);
	}
	
	
	function check_new_stock(){
		$serial=$this->input->post('serialNumber');
		$cate=$this->input->post('ddCategory');
		$brand=$this->input->post('ddBrand');
				
		return $this->obj->check_exist_stock($serial,$cate,$brand);
	}
	
	function solve($id=0){
			
		$data['stock'] = $this->obj->get_data_by('view_problem','pro_id',$id);
		
		$this->load->library('form_validation');
		$config = array(				   
				   array(
						 'field'   => 'ddProcess', 
						 'label'   => 'process', 
						 'rules'   => 'required'
					  )
				);
		
		$this->form_validation->set_rules($config);			
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('problem/resolved_problem_form',$data);
		}else{		
			$this->solve_problem();
			redirect($this->page,'');			
		}
	}
	
	function solve_problem(){
		$date = date('Y-m-d H:m:s');
		$id = $this->input->post('id');
		$assign_by = $this->input->post('assign_by');
		$data = array(					
					'process' => $this->input->post('ddProcess'),										
					'msg' => $this->input->post('msg'),
					'date_modified' => $date
				);
		$tmp = $this->obj->update($this->table,$data,'pro_id',$id);
		
		if($tmp){
			$theme_view = 'public/email_resolved';
			
			$from = $this->obj->get_email_by_user($this->userId);
			$from_name = $this->obj->get_user_name($this->userId);
			
			$email = $this->obj->get_email_by_user($assign_by);
			$to_name = $this->obj->get_user_name($assign_by);
			
			$tmpdata = $this->obj->get_data_by('view_problem','pro_id',$id);
			
			$data = array(
							'from_name'=>$from_name,
							'to_name'=>$to_name,
							'code' => $tmpdata->code,
							'serial_number' => $tmpdata->serial_number,
							'location' => $tmpdata->location,
							'priority' => $tmpdata->priority,
							'remark' => $tmpdata->remark,
							'msg' => $tmpdata->msg
						);
			
			$this->obj->send_mail_request($from,$from_name,$email,'Problem',$theme_view,$data);			
		}
	}
	
	function close($id=0){
			
		$data['stock'] = $this->obj->get_data_by('view_problem','pro_id',$id);
		$data['listStatus'] = $this->obj->combobox('tbl_status','status_id','status','ASC','--Please select--');
		$data['listLocation'] = $this->obj->combobox('tbl_location','loc_id','location','ASC','--Please select--');
		
		$this->load->library('form_validation');
		$config = array(				   
				   array(
						 'field'   => 'ddProcess', 
						 'label'   => 'process', 
						 'rules'   => 'required'
					  )
				);
		
		$this->form_validation->set_rules($config);			
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('problem/close_problem_form',$data);
		}else{		
			$this->close_problem();
			redirect($this->page,'');			
		}
	}
	
	function close_problem(){
		$date = date('Y-m-d H:m:s');
		$id = $this->input->post('id');
		$stock_id = $this->input->post('stock_id');
		$status = $this->input->post('ddStatus');
		$location = $this->input->post('ddLocation');
		
		$data = array(					
					'process' => $this->input->post('ddProcess'),				
					'date_modified' => $date
				);
		$tmp = $this->obj->update($this->table,$data,'pro_id',$id);
		
		if($tmp>0){
			$data = array('status_id'=>$status,'loc_id'=>$location);
			$this->obj->update('tbl_stock',$data,'stock_id',$stock_id);
		}				
	}
	
	function review($id=0){
			
		$data['stock'] = $this->obj->get_data_by('view_problem','pro_id',$id);
		
		$this->load->library('form_validation');
		$config = array(				   
				   array(
						 'field'   => 'ddProcess', 
						 'label'   => 'process', 
						 'rules'   => 'required'
					  )
				);
		
		$this->form_validation->set_rules($config);			
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('problem/review_problem_form',$data);
		}else{		
			$this->close_problem();
			redirect($this->page,'');			
		}
	}
	
	function delete($id=0){		
		$this->obj->delete($this->table,'pro_id',$id);
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