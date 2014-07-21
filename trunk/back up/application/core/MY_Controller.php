<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_Controller extends CI_Controller{	
	
	private $page_deny = "access_deny";
	private $admin_pages = array("stock","report","trash");
	
	function __construct($page){
		parent::__construct();
		$this->load->helper('cookie');
		if(!(get_cookie('inventory_user_id'))){
			redirect('login','');
		}
		
		if(get_cookie('inventory_user_role')==0){			
			$this->check_deny($page,$this->admin_pages,$this->page_deny);
		}
		
		if($page != "report"){
			$category_cookie = array(
			                       	'name'   => 'inventory_report_category',
			                       	'value'  => '',
			                       	'expire' => 0,
			                       	'path'  => '/'						
			                    );			                    
			delete_cookie($category_cookie);
			
			$status_cookie = array(
			                       	'name'   => 'inventory_report_status',
			                       	'value'  => '',
			                       	'expire' => 0,
			                       	'path'  => '/'
			                    );			                    
			delete_cookie($status_cookie);
			
			$startdate_cookie = array(
			                       	'name'   => 'inventory_report_startdate',
			                       	'value'  => '',
			                       	'expire' => 0,
			                       	'path'  => '/'
			                    );			                    
			delete_cookie($startdate_cookie);
			
			$enddate_cookie = array(
			                       	'name'   => 'inventory_report_enddate',
			                       	'value'  => '',
			                       	'expire' => 0,
			                       	'path'  => '/'
			                    );			                    
			delete_cookie($enddate_cookie);
		}
		
		//todo create log file
		log_message('debug','StockInventory : My_Controller class loaded');	
	}
	
	function check_deny($page_check,$admin_pages,$page_deny){
		if(in_array($page_check,$admin_pages)){
			redirect($page_deny,'');
		}
	}
   
}