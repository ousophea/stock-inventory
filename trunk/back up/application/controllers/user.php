<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Base_Controller {
	
	private $page = "user";
	private $table = "tbl_user";
	
	function __construct()
	{
		parent::__construct($this->page);	
		$this->load->model('user_model','obj');
	}

	function index()
	{		
		$data['listUser'] = $this->obj->get_all_data_by($this->table,'active',1,'user_id');
		$this->load->view('user/user_message',$data);		
	}
	
	function add(){
		
		if(get_cookie('inventory_user_role')==0){			
			redirect('access_deny','');
		}
		
		$this->load->library('form_validation');	
		
		$config = array(				   
				   array(
						 'field'   => 'username', 
						 'label'   => 'User Name', 
						 'rules'   => 'callback_check_new_user'
					  )
				);
		
		$this->form_validation->set_rules($config);	
		$this->form_validation->set_message('check_new_user', 'The user is already exists');		
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('user/add_user');
		}else{
			$this->save();
			redirect($this->page,'');			
		} 
	}
	
	function check_new_user(){
		$uName=$this->input->post('userName');
		$email=$this->input->post('email');
				
		return $this->obj->check_exist_user($uName,$email);
	}
	
	function save(){
		$date = date('Y-m-d H:m:s');
		$data = array(
					'firstname' => $this->input->post('firstName'),
					'lastname' => $this->input->post('lastName'),
					'username' => $this->input->post('userName'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'role' => $this->input->post('role'),
					'active' => 1,
					'date_created' => $date,
					'date_modified' => $date
				);
		$this->obj->save($this->table,$data);
	}
	
	
	
	function edit($id=0){						
		$data['item'] = $this->obj->get_data_by($this->table,'user_id',$id);
		
		$this->load->library('form_validation');
		$config = array(				   
				   array(
						 'field'   => 'userName', 
						 'label'   => 'User Name', 
						 'rules'   => 'required'
					  )
				);		
		$this->form_validation->set_rules($config);			
		
		if($this->form_validation->run() == FALSE){			
			$this->load->view('user/edit_user',$data);
		}else{		
			$this->update();
			redirect($this->page,'');			
		}
	}
	
	function update(){
		$date = date('Y-m-d H:m:s');
		$id = $this->input->post("id");
		$data = array(
					'firstname' => $this->input->post('firstName'),
					'lastname' => $this->input->post('lastName'),
					'username' => $this->input->post('userName'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'role' => $this->input->post('role'),
					'active' => 1,
					'date_created' => $date,
					'date_modified' => $date
				);		
		$this->obj->update($this->table,$data,'user_id',$id);
	}
	
	function delete($id=0){
		$data = array('active' => 0);
		$this->obj->update($this->table,$data,'user_id',$id);
		redirect($this->page,'');
	}
	
	
}

/* End of file user.php */