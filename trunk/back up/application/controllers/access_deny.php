<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_Deny extends Base_Controller{
	private $page = 'access_deny';
	function __construct(){
		parent::__construct($this->page);
	}
	
	function index(){
		$this->load->view('access_deny/access_deny_message');	
	}
}