<?php 
	$this->load->view("template/header");
	echo '<h1>Edit Stock</h1>';
	$attr = array('name'=>'frm','onSubmit'=>'return validateAddStock();');
	echo form_open('stock/edit/'.$stock->stock_id,$attr);
			
		echo '<div id="errorMsg"></div>';	
		echo '<table>';
			echo '<thead>';
			
			echo '<tr>';
				echo '<td>Code</td><td>:</td><td>';					 
					$val = (isset($_POST['code'])?$_POST['code']:$stock->code);
					$data = array('name'=>'code','value'=>$val,'class'=>"textbox");
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Serial Number <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['serialNumber'])?$_POST['serialNumber']:$stock->serial_number);
					$data = array('name'=>'serialNumber','value'=>$val,'class'=>"textbox");
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Category <span class="require">*</span></td><td>:</td><td>';					
					$group = (isset($_POST['ddCategory'])?$_POST['ddCategory']:$stock->cat_id);
				echo form_dropdown('ddCategory',$listCategory,$group,'class="selectbox"').'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Brand <span class="require">*</span></td><td>:</td><td>';
						$group = (isset($_POST['ddBrand'])?$_POST['ddBrand']:$stock->brand_id);
						echo form_dropdown('ddBrand',$listBrand,$group,'class="selectbox"');
				echo '</td></tr>';
				
			echo '<tr>';
				echo '<td>Status</td><td>:</td><td>';
						$group = (isset($_POST['ddStatus'])?$_POST['ddStatus']:$stock->status_id);
						echo form_dropdown('ddStatus',$listStatus,$group,'class="selectbox"');
				echo '</td></tr>';
				
			echo '<tr>';
				echo '<td>Date Import <span class="require">*</span></td><td>:</td><td>';
						$value = (isset($_POST['txtdate'])?$_POST['txtdate']:$stock->date_import);
						$data = array('name'=>'txtdate','id'=>'txtdate','value'=>$value,'class'=>"selectbox");
						echo form_input($data);
				echo '</td></tr>';
			
			
			echo '<tr valign="top">';
				echo '<td>Remark</td><td>:</td><td>';					 
					$val = (isset($_POST['remark'])?$_POST['remark']:$stock->remark);
					$data = array('name'=>'remark','value'=>$val);
				echo form_textarea($data).'</td>';
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
					    echo anchor('stock',img(base_url().'assets/images/icons/cross.png').'Cancel','class="negative"');				
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