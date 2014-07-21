<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends Base_Controller {
	
	private $page = "report";
	private $now = "";
	function __construct()
	{
		parent::__construct($this->page);
		$this->load->model('report_model','obj');
		$this->now = date('Y-m-d');		
	}
	
	function index()
	{		
		$data['listCategory'] = $this->obj->combobox('tbl_category','cat_id','category','ASC','All');				
		$data['listStatus'] = $this->obj->combobox('tbl_status','status_id','status','DESC','All');		
		
		//$category = $this->input->post("ddCategory");
		$category = (isset($_POST['ddCategory'])?$_POST['ddCategory']:0);
		//$status = $this->input->post("ddStatus");
		$status = (isset($_POST['ddStatus'])?$_POST['ddStatus']:0);		
		//$startDate = $this->input->post("txtdate");
		$startDate = (isset($_POST['txtdate'])?$_POST['txtdate']:$this->now);
		//$endDate = $this->input->post("txtend");
		$endDate = (isset($_POST['txtend'])?$_POST['txtend']:$this->now);
		
		
		if(isset($_POST['txtdate'])){
			$category_cookie = array(
			                       	'name'   => 'inventory_report_category',
			                       	'value'  => $category,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($category_cookie);
			
			$status_cookie = array(
			                       	'name'   => 'inventory_report_status',
			                       	'value'  => $status,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($status_cookie);
			
			$startdate_cookie = array(
			                       	'name'   => 'inventory_report_startdate',
			                       	'value'  => $startDate,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($startdate_cookie);
			
			$enddate_cookie = array(
			                       	'name'   => 'inventory_report_enddate',
			                       	'value'  => $endDate,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($enddate_cookie);
			
		}else{
			$cat = get_cookie('inventory_report_category');
			$sta = get_cookie('inventory_report_status');
			$sd = get_cookie('inventory_report_startdate');
			$ed = get_cookie('inventory_report_enddate');
			$category = ($cat==""?0:$cat);
			$status = ($sta==""?0:$sta);
			$startDate = ($sd==""?$this->now:$sd);
			$endDate = ($ed==""?$this->now:$ed);
		}
		
		
		
		$this->load->library('pagination');
		
		$config['base_url']= site_url().'report/index';
		$config['first_link']='First';
		$config['next_link']='Next';		
		$config['prev_link']='Prvious';
		$config['last_link']='Last';
		//todo add stylesheet with pagging
		$config['anchor_class'] = 'class="pagging"';
		$config['total_rows']=$this->obj->search_report_num($category,$status,$startDate,$endDate);
		$pageNumber = 15;
		$config['per_page']=$pageNumber;
		$config['num_links']=5;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
		$data['listReport'] = $this->obj->search_report($category,$status,$startDate,$endDate,$pageNumber,$this->uri->segment(3));
		$this->load->view('report/report_message',$data);
	}
	
	function generate_report(){
				
		//$category = $this->input->post("ddCategory");
		$category = (isset($_POST['ddCategory'])?$_POST['ddCategory']:0);
		//$status = $this->input->post("ddStatus");
		$status = (isset($_POST['ddStatus'])?$_POST['ddStatus']:0);		
		//$startDate = $this->input->post("txtdate");
		$startDate = (isset($_POST['txtdate'])?$_POST['txtdate']:$this->now);
		//$endDate = $this->input->post("txtend");
		$endDate = (isset($_POST['txtend'])?$_POST['txtend']:$this->now);
		
		
		if(isset($_POST['txtdate'])){
			$category_cookie = array(
			                       	'name'   => 'inventory_report_category',
			                       	'value'  => $category,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($category_cookie);
			
			$status_cookie = array(
			                       	'name'   => 'inventory_report_status',
			                       	'value'  => $status,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($status_cookie);
			
			$startdate_cookie = array(
			                       	'name'   => 'inventory_report_startdate',
			                       	'value'  => $startDate,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($startdate_cookie);
			
			$enddate_cookie = array(
			                       	'name'   => 'inventory_report_enddate',
			                       	'value'  => $endDate,
			                       	'expire' => time()+600,
			                       	'path'  => '/'						
			                    );			                    
			set_cookie($enddate_cookie);
			
		}else{
			$cat = get_cookie('inventory_report_category');
			$sta = get_cookie('inventory_report_status');
			$sd = get_cookie('inventory_report_startdate');
			$ed = get_cookie('inventory_report_enddate');
			$category = ($cat==""?0:$cat);
			$status = ($sta==""?0:$sta);
			$startDate = ($sd==""?$this->now:$sd);
			$endDate = ($ed==""?$this->now:$ed);
		}
		
		/*
		$fileName = "Report_".$_POST['tmpdate'].".csv";		
		header('Content-type: text/csv');
		header('Content-disposition: attachment;filename='.$fileName);
        //header('Content-disposition: attachment;filename=fromci.csv');		
		echo $this->obj->do_generate_report($category,$status,$startDate,$endDate);
		*/
		$fileName = "Report_".$_POST['tmpdate'].".xls";
		$this->obj->do_generate_report($fileName,$category,$status,$startDate,$endDate);		
	}
	
}

/* End of file report.php */