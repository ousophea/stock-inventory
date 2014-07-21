<?php
	$this->load->view("template/header_login");
	$path = base_url().'assets/images/';
	//start of login box
?>

	<div style='float:left; width:580px;'>
		<h2>IT Stock Inventory</h2>
		<p>
			Stock Inventory is kind of web application that they are used to controll the inventory of IT.			 
		</p>
		<div class="features">
			<ul>
				<li>
					<img src="<?php echo $path.'inventories/desktop.png';?>" alt=""/>
					<p class="title">
						Desktop Computer
					</p>
					<p>Storage the computers in the system. </p>
				</li>
				<li>
					<img src="<?php echo $path.'inventories/notebook.png';?>" alt=""/>
					<p class="title">
						Laptop
					</p>
					<p>Storage the computers in the system. </p>
				</li>
				<li>
					<img src="<?php echo $path.'inventories/server.png';?>" alt=""/>
					<p class="title">
						Server
					</p>
					<p>Storage the computers in the system. </p>
				</li>
			</ul>
		</div>
	</div>
<?php
	echo "<div class='login login-box'>";
		echo "<h2>Login</h2>";
		echo form_open('login/process_login');
		
		//echo form_fieldset('Login');	
		
        echo '<div class="msg_error">'.$this->session->flashdata('error').'</div>';
    
		echo "<div>Username</div>";
	
		$data = array('name'=>'txtusername','class'=>'inputLogin');
		echo "<div>".form_input($data)."</div>";
	
		echo "<div>Password</div>";
						
		$data = array('name'=>'txtpassword','class'=>'inputLogin');
		echo "<div>".form_password($data)."</div>";
						
		$data = array('name'=>'btnlogin','value'=>'Login','class'=>'btnLogin');
		echo "<div align='right'>".form_submit($data)."</div>";
		//echo form_fieldset_close();
		
		echo form_close();
	echo "</div>";
	
	//end of login box
	
	//todo include footer
	$this->load->view("template/footer_login");
?>
