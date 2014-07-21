<?php 
	$this->load->view("template/header");
	echo '<h1>Add New Item</h1>';
	$attr = array('name'=>'frm','onSubmit'=>'return validateEditItem();');
	echo form_open('item/edit',$attr);
			
		echo '<div id="errorMsg">'.form_error('serialNumber').'</div>';	
		echo '<table>';
			echo '<thead>';
			
			echo form_hidden('stock_id',$stock->stock_id,'id="stock_id"');			
			
			echo '<tr>';
				echo '<td>Serial Number <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['serialNumber'])?$_POST['serialNumber']:$stock->serial_number);
					$data = array('name'=>'serialNumber','value'=>$val,'class'=>'textbox','id'=>'txtserialNumber','readonly'=>'readonly');
				echo '<span id="boxShow">'.form_input($data).'<a href="javascript:void(0);" class="btn" onclick="doEdit();">Edit</a></span>';
				$group = (isset($_POST['ddSerial'])?$_POST['ddSerial']:'');				
				echo '<span id="boxHide" style="display:none; width:250px;">'.
						form_dropdown('ddSerial',$listSerial,$group,'id="serialNumber" onchange="doChangeItem();" onkeyup="doChangeItem();"').
						'<a href="javascript:void(0);" class="btn" onclick="doCancel();">Cancel</a>'.
					'</span>';				
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Code <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['code'])?$_POST['code']:$stock->code);
					$data = array('name'=>'code','id'=>'code','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Category</td><td>:</td><td>';					
					$group = (isset($_POST['ddCategory'])?$_POST['ddCategory']:$stock->cat_id);
				echo form_dropdown('ddCategory',$listCategory,$group,'id="ddCategory" class="selectbox" disabled="true"').'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Brand</td><td>:</td><td>';					
					$group = (isset($_POST['ddBrand'])?$_POST['ddBrand']:$stock->brand_id);
				echo form_dropdown('ddBrand',$listBrand,$group,'id="ddBrand" class="selectbox" disabled="true"').'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Location <span class="require">*</span></td><td>:</td><td>';					
					$group = (isset($_POST['ddLocation'])?$_POST['ddLocation']:$stock->loc_id);
				echo form_dropdown('ddLocation',$listLocation,$group,'class="selectbox"').'</td>';				
			echo '</tr>';		
			
			echo '<tr>';
				echo '<td>Status</td><td>:</td><td>';
						$group = (isset($_POST['ddStatus'])?$_POST['ddStatus']:$stock->status_id);
						echo form_dropdown('ddStatus',$listStatus,$group,'class="selectbox"');
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
					    echo anchor('item',img(base_url().'assets/images/icons/cross.png').'Cancel','class="negative"');				
									
				    echo '</div>';	
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="3"><span class="require">*</span> is required.</td>';				
			echo '</tr>';
			
		echo '</table>';
	
	echo form_close();
?>
	<script type="text/javascript">
		var code = "<?php echo $stock->code; ?>";
		var cat = "<?php echo $stock->cat_id; ?>";
		var brand = "<?php echo $stock->brand_id; ?>";
		function doEdit(){
			//document.getElementById('box').innerHTML="test";
			var s = $('#boxShow');
			var h = $('#boxHide');		
			s.hide();
			h.show();
		}
		function doCancel(){			
			var s = $('#boxShow');
			var h = $('#boxHide');		
			s.show();
			h.hide();
			
			$("#code").val(code);
			$("#ddCategory").val(cat);
			$("#ddBrand").val(brand);
		}
		function doChangeItem(){			
			var id_ = $('#serialNumber').val();
			if(id_ ==0){
				$("#code").val('');
				$("#ddCategory").val(0);
				$("#ddBrand").val(0);
			}else{
				//alert("<?php echo site_url('item/get_code/"+ id_ +"'); ?>");
				dataString = 'post_id=' + id_;
				$.ajax
				({				
					type: "POST",
					url: "<?php echo site_url('item/get_code/"+ id_ +"'); ?>",
					data: dataString,
					dataType: 'json',
					success: function(data)
					{				
						$("#code").val(data.code);
						$("#ddCategory").val(data.cat_id);
						//$("#ddCategory").attr('disabled',true);
						$("#ddBrand").val(data.brand_id);
						//$("#ddBrand").attr('disabled',true);						
					}			
					
				});		
				
			}
		}
	</script>
<?php	
	$this->load->view("template/footer"); 
?>