<?php
	$this->load->view("template/header");
	echo '<h1>Add New Item</h1>';
	$attr = array('name'=>'frm','onSubmit'=>'return validateAddItem();');
	echo form_open('item/add',$attr);
			
		echo '<div id="errorMsg">'.form_error('code').'</div>';	
		echo '<table>';
			echo '<thead>';		
			
			echo '<tr>';
				echo '<td>Serial Number <span class="require">*</span></td><td>:</td><td>';					
					$group = (isset($_POST['ddSerial'])?$_POST['ddSerial']:'');
				echo form_dropdown('ddSerial',$listSerial,$group,'id="serialNumber" class="selectbox" onchange="doChangeItem();" onkeyup="doChangeItem();"').'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Code <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['code'])?$_POST['code']:'');
					$data = array('name'=>'code','id'=>'code','value'=>$val,"class"=>"selectbox");
				echo form_input($data).'</td>';
			echo '</tr>';				
			
			echo '<tr>';
				echo '<td>Category</td><td>:</td><td>';					
					$group = (isset($_POST['ddCategory'])?$_POST['ddCategory']:'');
				echo form_dropdown('ddCategory',$listCategory,$group,'id="ddCategory" class="selectbox" disabled="true"').'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Brand</td><td>:</td><td>';					
					$group = (isset($_POST['ddBrand'])?$_POST['ddBrand']:'');
				echo form_dropdown('ddBrand',$listBrand,$group,'id="ddBrand" class="selectbox" disabled="true"').'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Location <span class="require">*</span></td><td>:</td><td>';					
					$group = (isset($_POST['ddLocation'])?$_POST['ddLocation']:'');
				echo form_dropdown('ddLocation',$listLocation,$group,'id="ddLocation" class="selectbox"').'<a href="javascript:void(0);" id="dialog_loc">'.img(base_url().'assets/images/icons/add.png').'</a></td>';				
			echo '</tr>';
			
			echo '<tr valign="top">';
				echo '<td>Remark</td><td>:</td><td>';					 
					$val = (isset($_POST['remark'])?$_POST['remark']:'');
					$data = array('name'=>'remark','value'=>$val,'class'=>'textarea');
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
		/*
		var tmp_cat_id = "<?php echo (isset($_POST['ddCategory'])?$_POST['ddCategory']:''); ?>";
		var tmp_brand_id ="<?php echo (isset($_POST['ddBrand'])?$_POST['ddBrand']:''); ?>";
		$("#ddCategory").val(tmp_cat_id);
		$("#ddBrand").val(tmp_brand_id)
		*/		
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
		    //$('#dialog').dialog();
		    $('#dialog_loc').click(function() {
		        $('#dialogLoc').dialog();
		        //todo clear message when open dialog
		        $("#error_location").html('');
				$("#success_location").html('');
				$("#txtname").val('');
		        return false;
		    });		    
		});
	</script>    

   <div id="dialogLoc" title="Location Form" style="display:none"> 
   		<?php
   			echo "<div id='error_location' class='msg_error'></div>";
   			echo "<div id='success_location' class='success'></div>";
   			$attr_ = array('name'=>'frm_loc','onSubmit'=>'return validateLocation();');
   			echo form_open('item/add_location',$attr_);
   				echo "<table align='center'>";
   					echo "<tr>";
   						echo "<td>Location:</td>";
	   					echo "<td>";
	   						$data = array('name'=>'txtname','id'=>'txtname','class'=>'dialog_textbox');
	   						echo form_input($data)."</td>";
   					echo "</tr>";
   					echo "<tr>";
   						echo "<td></td><td class='buttons'>
   								<button type='submit' class='positive'>
									".img(base_url().'assets/images/icons/apply2.png')."
									Save
								</button>
							</td>";
   					echo "</tr>";
   				echo "</table>";
   			echo form_close();
   		?>
   </div>
   <script type="text/javascript">
   	
   	function validateLocation(){	
		var msg=document.getElementById("error_location");
		var msg_suc =document.getElementById("success_location");
		var nam=document.frm_loc.txtname;
		
		msg_suc.innerHTML = "";
		if(nam.value == "" || nam.value == null){
			msg.innerHTML="Please enter location!";
			nam.focus();
			return false;				
		}else{			
			var txt = nam.value;					
			$.get("<?php echo site_url('item/get_loc_code/"+ txt +"'); ?>",
			   function(data){
			     if(data){
			     	msg.innerHTML="The location is already exist!";			     	
			     }else{
			     	saveData(txt,msg_suc);
			     	nam.value = "";
			     	msg.innerHTML= "";
			     }
			   });
			return false;
		}	
	}
	function saveData(txt,msg_id){
		$.ajax({
		     type: "POST",
		     url: "<?php echo site_url('item/add_location'); ?>",
		     data: {'txtname':txt},
		     dataType: 'json',
		     success: function(data)
		     {		     
		        if(data){
		        	msg_id.innerHTML= "Success to save the location " + txt + " !";		        	
		            var ind = 0;
		            $(data).each(function(index, item) {
	                     ind++;
	                     $("#ddLocation").get(0).options[ind] = new Option(item.location, item.loc_id);
	                });	        	
		        }else{
		        	msg_id.innerHTML= "Fail to save!";
		        }
		     }
		});
	}
	
	
   </script>
  
<?php $this->load->view("template/footer"); ?>