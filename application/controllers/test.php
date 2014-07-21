<?php
/*
 * Created on Feb 19, 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 $this->input->post('txtusername');
 
$username= $_POST[''];
$this->db->select('*');
$this->db->where('username',$username);
?>
