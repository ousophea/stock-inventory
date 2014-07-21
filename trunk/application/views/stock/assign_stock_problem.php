<?php 
	$this->load->view("template/header");
	echo '<h1>Assign Task</h1>';
	$attr = array('name'=>'frm','onSubmit'=>'return validateAssignProblem(document.frm);');
	echo form_open('stock/assign/'.$stock->stock_id,$attr);
			
		echo '<div id="errorMsg"></div>';	
		echo '<table>';
			echo '<thead>';
			
			echo '<tr>';
				echo '<td style="width:120px;">Code</td><td>:</td><td>'.$stock->code.'</td>';
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
				echo '<td>Date Import</td><td>:</td><td>';						
				echo $stock->date_import.'</td></tr>';
			
			
			echo '<tr valign="top">';
				echo '<td>Remark</td><td>:</td><td>';					 
					$val = (isset($_POST['remark'])?$_POST['remark']:$stock->remark);
					$data = array('name'=>'remark','value'=>$val,'disabled'=>'disabled');
				echo form_textarea($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Priority <span class="require">*</span></td><td>:</td><td>';
						$data = array(0=>'-- Please select --','Hight'=>'Hight','Medium'=>'Medium','Low'=>'Low');
						$group = (isset($_POST['ddPriority'])?$_POST['ddPriority']:'');
						echo form_dropdown('ddPriority',$data,$group,'class="selectbox"');
				echo '</td></tr>';
				
			echo '<tr>';
				echo '<td>User <span class="require">*</span></td><td>:</td><td>';						
						$group = (isset($_POST['ddUser'])?$_POST['ddUser']:'');
						echo form_dropdown('ddUser',$users,$group,'class="selectbox"');
				echo '</td></tr>';
			
			
			echo "<tr><td colspan='3'>&nbsp;</td></tr>";
			
			echo '<tr>';
				echo '<td></td><td></td>';
				echo '<td>
					<div class="buttons">
						<button type="submit" class="positive">
							<img alt="" src="'.base_url().'assets/images/icons/apply2.png" />
							Assign
						</button>';						
					    echo anchor('stock/problem',img(base_url().'assets/images/icons/cross.png').'Cancel','class="negative"');				
						echo form_hidden('id',$stock->stock_id);			
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