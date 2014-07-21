<?php
	$this->load->view("template/header_login");
	
	echo form_open('login/process_login');
	$attr = array('style'=>'width:255px;');
	echo form_fieldset('Login',$attr);
	echo '<table align="center" cellpadding="3" cellspacing="0" style="padding-top:10px;">';              			
    	
		echo '<tr>';
            echo '<td colspan="3"><div class="msg_error">'.$this->session->flashdata('error').'</div></td>';
        echo '</tr>';
		
		echo '<tr>';
			echo "<td>Username</td>";
			echo "<td>:</td>";
			$data = array('name'=>'txtusername','class'=>'inputLogin');
			echo "<td>".form_input($data)."</td>";
		echo '</tr>';
		
		echo "<tr>";
			echo "<td>Password</td>";
			echo "<td>:</td>";
			$data = array('name'=>'txtpassword','class'=>'inputLogin');
			echo "<td>".form_password($data)."</td>";
		echo "</tr>";
		
		echo "<tr align='right'>";
			echo "<td></td>";
			echo "<td></td>";
			$data = array('name'=>'btnlogin','value'=>'Login','class'=>'btnLogin');
			echo "<td>".form_submit($data)."</td>";
		echo "</tr>";               			
		
	echo '</table>';
	
	echo form_fieldset_close();
	
	echo form_close();
	//todo include footer
	$this->load->view("template/footer_login");
?>