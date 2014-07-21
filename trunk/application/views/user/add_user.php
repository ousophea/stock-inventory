<?php 
	$this->load->view("template/header");
	echo '<h1>Add New User</h1>';
	$attr = array('name'=>'frmUser','onSubmit'=>'return validateAddUser();');
	echo form_open('user/add',$attr);
			
		echo '<div id="errorMsg">'.form_error('username').'</div>';	
		echo '<table>';
			echo '<thead>';
			echo '<tr>';
				echo '<td>First Name</td><td>:</td><td>';					 
					$val = (isset($_POST['firstName'])?$_POST['firstName']:'');
					$data = array('name'=>'firstName','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Last Name</td><td>:</td><td>';					 
					$val = (isset($_POST['lastName'])?$_POST['lastName']:'');
					$data = array('name'=>'lastName','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
						
			echo '<tr>';
				echo '<td>Username <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['userName'])?$_POST['userName']:'');
					$data = array('name'=>'userName','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Password <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['password'])?$_POST['password']:'');
					$data = array('name'=>'password','value'=>$val,'class'=>'textbox');
				echo form_password($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Confirm Password <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['confirmPassword'])?$_POST['confirmPassword']:'');
					$data = array('name'=>'confirmPassword','value'=>$val,'class'=>'textbox');
				echo form_password($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Email <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['email'])?$_POST['email']:'');
					$data = array('name'=>'email','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Phone</td><td>:</td><td>';					 
					$val = (isset($_POST['phone'])?$_POST['phone']:'');
					$data = array('name'=>'phone','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Role</td><td>:</td><td>';					 
					$chk = (isset($_POST['role'])?'checked':'');					
					$data = array('name'=>'role','value'=>1,'checked'=>$chk);
				echo form_checkbox($data).'Administrator </td>';
			echo '</tr>';
			
			echo "<tr><td colspan='3'>&nbsp;</td></tr>";
						
			echo '<tr>';
				echo '<td></td><td></td>';
				echo '<td>
					<div class="buttons">
						<button type="submit" class="positive">
							<img alt="" src="'.base_url().'assets/images/icons/apply2.png" />
							Save
						</button>';						
					    echo anchor('user',img(base_url().'assets/images/icons/cross.png').'Cancel','class="negative"');				
									
				    echo '</div>';	
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="3"><span class="require">*</span> is required.</td>';				
			echo '</tr>';
			
		echo '</table>';
	
	echo form_close();
	
	$this->load->view("template/footer"); 
?>