<?php 
	$this->load->view("template/header");
	echo '<h1>Solve Problem</h1>';
	$attr = array('name'=>'frm','onSubmit'=>'return validateAddStock();');
	echo form_open('problem/solve/'.$stock->stock_id,$attr);
			
		echo '<div id="errorMsg"></div>';	
		echo '<table>';
			echo '<thead>';
			
			echo '<tr>';
				echo '<td>Code</td><td>:</td><td>'.$stock->code.'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Serial Number</td><td>:</td><td>';				
				echo $stock->serial_number.'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Category</td><td>:</td><td>';					
				echo $stock->category.'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Brand</td><td>:</td><td>';						
				echo $stock->brand.'</td></tr>';
				
			echo '<tr>';
				echo '<td>Status</td><td>:</td><td>';						
				echo $stock->status.'</td></tr>';
			
			echo '<tr>';
				echo '<td>Location</td><td>:</td><td>';						
				echo $stock->location.'</td></tr>';
				
			echo '<tr>';
				echo '<td>Date Import</td><td>:</td><td>';						
				echo $stock->date_import.'</td></tr>';
			
			
			echo '<tr valign="top">';
				echo '<td>Remark</td><td>:</td><td>';					 
					$val = (isset($_POST['remark'])?$_POST['remark']:$stock->remark);
					$data = array('name'=>'remark','value'=>$val,'disabled'=>'disabled','style'=>'height:90px;');
				echo form_textarea($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Priority</td><td>:</td><td>';						
				echo $stock->priority.'</td></tr>';
			
			echo '<tr>';
				echo '<td>Process</td><td>:</td><td>';
						$data = array('Resolved'=>'Resolved','Closed'=>'Closed');
						$group = (isset($_POST['ddProcess'])?$_POST['ddProcess']:'Closed');
						echo form_dropdown('ddProcess',$data,$group,'class="selectbox"');
				echo '</td></tr>';
			
			echo '<tr valign="top">';
				echo '<td>Message</td><td>:</td><td>';					 
					$val = (isset($_POST['msg'])?$_POST['msg']:$stock->msg);
					$data = array('name'=>'msg','value'=>$val,'disabled'=>'disabled','style'=>'90px');
				echo form_textarea($data).'</td>';
			echo '</tr>';
			
			echo "<tr><td colspan='3'>&nbsp;</td></tr>";
			
			echo '<tr>';
				echo '<td></td><td></td>';
				echo '<td>
					<div class="buttons">';												
					    echo anchor('problem/closed',img(base_url().'assets/images/icons/cross.png').'Back','class="negative"');				
						echo form_hidden('id',$stock->pro_id);			
				    echo '</div>';	
				echo '</td>';
			echo '</tr>';
			
			
		echo '</table>';
	
	echo form_close();
	
	$this->load->view("template/footer"); 
?>