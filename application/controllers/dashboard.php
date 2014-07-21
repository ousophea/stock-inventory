<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends Base_Controller {
	
	private $page = "dashboard";
	function __construct()
	{
		parent::__construct($this->page);
		$this->load->model('dashboard_model','obj');
	}

	function index()
	{
		$data['listUsed'] = $this->obj->statistic_used();
		$data['listStock'] = $this->obj->statistic_stock();
		$data['listProblem'] = $this->obj->statistic_problem();
		$this->load->view('dashboard/dashboard_message',$data);
	}
}

/* End of file dashboard.php */