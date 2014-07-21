<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trash extends Base_Controller {
	
	private $page = "trash";
	private $table = "tbl_stock";
	function __construct()
	{
		parent::__construct($this->page);
		$this->load->model('trash_model','obj');
	}

	function index()
	{
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'trash/index';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->trash_num();
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
		$data['listStock'] = $this->obj->listTrash($pageNumber,$this->uri->segment(3));
		$this->load->view('trash/trash_message',$data);
	}
	
	function search()
	{
		$txt = $this->input->post("txtSearch");
		$txt_search = $txt;
				
		if(isset($_POST['txtSearch'])){
			$txt_search_cookie = array(
			                       	'name'   => 'inventory_trash_search',
			                       	'value'  => $txt,
			                       	'expire' => time()+600						
			                    );
			                    
			set_cookie($txt_search_cookie);
			
		}else{
			$txt_search = get_cookie('inventory_trash_search');
		}
		
		//set parameter of pagination
		$this->load->library('pagination');
		$config['base_url']= site_url().'trash/search';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->search_trash_num($txt_search);
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
		$data['listStock'] = $this->obj->search_trash($txt_search,$pageNumber,$this->uri->segment(3));
		$this->load->view('trash/trash_message',$data);
	}
	
	function restore($id=0){
		$data = array('active' => 1);
		$this->obj->update($this->table,$data,'stock_id',$id);		
		redirect($this->page,'');
	}
	
	function restoreall(){
		$ids = $this->input->post('chkboxes');
		for($i=0;$i<count($ids);$i++){
			$id = $ids[$i];
			$data = array('active' => 1);
			$this->obj->update($this->table,$data,'stock_id',$id);			
		}
		redirect($this->page,'');
	}
	
	function delete($id=0){
		$this->obj->delete($this->table,'stock_id',$id);
		$this->obj->delete('tbl_item','stock_id',$id);
		redirect($this->page,'');
	}
	
	function deleteall(){
		$ids = $this->input->post('chkboxes');
		for($i=0;$i<count($ids);$i++){
			$id = $ids[$i];
			$this->obj->delete($this->table,'stock_id',$id);
			$this->obj->delete('tbl_item','stock_id',$id);
		}
		redirect($this->page,'');
	}
}

/* End of file trash.php */