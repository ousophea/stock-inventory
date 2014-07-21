<?php
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		//$this->load->library('form_validation');
		$this->load->helper('cookie');
	}
	function index(){		
		$this->load->view("login/login_message");	
	}
	
	function process_login()
	{
		//todo load model		
		$this->load->model('login_model','login');
		
		$user_name=$this->input->post('txtusername',TRUE);
		$user_password=$this->input->post('txtpassword',TRUE);

		$this->load->library('encrypt');
		
		$row=$this->login->check_user($user_name,$user_password);
		if(count($row)>0){
			
			$user_name_cookie = array(
				                       'name'   => 'inventory_user_name',
				                       'value'  => $row->firstname.' '.$row->lastname,
				                       'expire' => time()+600,
				                       //'domain' => '.localhost',
            							'path'  => '/'
				                    );
				                    
			set_cookie($user_name_cookie);
			
			$user_name_cookie = array(
				                       'name'   => 'inventory_user_id',
				                       'value'  => $row->user_id,
				                       'expire' => time()+600,
				                       //'domain' => '.localhost',				                       
            							'path'  => '/'
				                    );
				                    
			set_cookie($user_name_cookie);
			
			$user_role_cookie = array(
				                       'name'   => 'inventory_user_role',
				                       'value'  => $row->role,
				                       'expire' => time()+600,
				                       //'domain' => '.localhost',				                       
            							'path'  => '/'
				                    );
				                    
			set_cookie($user_role_cookie);		
			
			redirect('dashboard','');
		}else{
			$this->session->set_flashdata('error','Invalid username and password!');
			redirect('login','');
		}	
		
	}
	function logout(){
		$user_name_cookie = array(
				                       'name'   => 'inventory_user_name',
				                       'value'  => '',
				                       'expire' => 0,
				                       //'domain' => '.localhost',				                       
            							'path'  => '/'
				                    );				                    
		delete_cookie($user_name_cookie);
		
		$user_name_cookie = array(
			                       'name'   => 'inventory_user_id',
			                       'value'  => '',
			                       'expire' => 0,
			                       //'domain' => '.localhost',				                       
        							'path'  => '/'
			                    );
			                    
		delete_cookie($user_name_cookie);
		
		$user_role_cookie = array(
			                       'name'   => 'inventory_user_role',
			                       'value'  => '',
			                       'expire' => 0,
			                       //'domain' => '.localhost',				                       
        							'path'  => '/'
			                    );			                    
		delete_cookie($user_role_cookie);
		
		redirect('login');
	}
	
	function  forget_password(){
		echo 'You have lost your password';
	}
}

?>