<?php 
	$this->load->view("template/header");
	echo '<h1>Edit User</h1>';
	$attr = array('name'=>'frmUser','onSubmit'=>'return validateAddUser();');
	echo form_open('user/edit',$attr);
			
		echo '<div id="errorMsg">'.form_error('username').'</div>';	
		echo '<table>';
			echo '<thead>';
			echo '<tr>';
				echo '<td>First Name</td><td>:</td><td>';					 
					$val = (isset($_POST['firstName'])?$_POST['firstName']:$item->firstname);
					$data = array('name'=>'firstName','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Last Name</td><td>:</td><td>';					 
					$val = (isset($_POST['lastName'])?$_POST['lastName']:$item->lastname);
					$data = array('name'=>'lastName','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
						
			echo '<tr>';
				echo '<td>Username</td><td>:</td><td>';					 
					$val = (isset($_POST['userName'])?$_POST['userName']:$item->username);
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
					$val = (isset($_POST['email'])?$_POST['email']:$item->email);
					$data = array('name'=>'email','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Phone</td><td>:</td><td>';					 
					$val = (isset($_POST['phone'])?$_POST['phone']:$item->phone);
					$data = array('name'=>'phone','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Role</td><td>:</td><td>';					 
					$chk = "";
					if(isset($item->role) && $item->role==1){
						$chk = "checked";
					}else if(isset($_POST['role'])){
						$chk = "checked";
					}					
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
				    echo form_hidden('id',$item->user_id);	
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="3"><span class="require">*</span> is required.</td>';				
			echo '</tr>';
			
		echo '</table>';
	
	echo form_close();
	
	$this->load->view("template/footer"); 
?>