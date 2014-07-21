<?php 
	$this->load->view("template/header");
	echo '<h1>Add New Stock</h1>';
	$attr = array('name'=>'frm','onSubmit'=>'return validateAddStock();');
	echo form_open('stock/add',$attr);
			
		echo '<div id="errorMsg">'.form_error('serialNumber').'</div>';	
		echo '<table>';
			echo '<thead>';
			echo '<tr>';
				echo '<td>Serial Number <span class="require">*</span></td><td>:</td><td>';					 
					$val = (isset($_POST['serialNumber'])?$_POST['serialNumber']:'');
					$data = array('name'=>'serialNumber','value'=>$val,'class'=>'textbox');
				echo form_input($data).'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Category <span class="require">*</span></td><td>:</td><td>';					
					$group = (isset($_POST['ddCategory'])?$_POST['ddCategory']:'');
				echo form_dropdown('ddCategory',$listCategory,$group,'id="ddCategory" class="selectbox"').' <a href="javascript:void(0);" id="dialog_cat">'.img(base_url().'assets/images/icons/add.png').'</a></td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Brand <span class="require">*</span></td><td>:</td><td>';
						$group = (isset($_POST['ddBrand'])?$_POST['ddBrand']:'');
						echo form_dropdown('ddBrand',$listBrand,$group,'id="ddBrand" class="selectbox"');
				echo ' <a href="javascript:void(0);" id="dialog_brand">'.img(base_url().'assets/images/icons/add.png').'</a></td></tr>';
			
			
			echo '<tr>';
				echo '<td>Date Import <span class="require">*</span></td><td>:</td><td>';
						$value = (isset($_POST['txtdate'])?$_POST['txtdate']:'');
						$data = array('name'=>'txtdate','id'=>'txtdate','value'=>$value,'class'=>'textbox');
						echo form_input($data);
				echo '</td></tr>';
			
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
		$(document).ready(function() {
		    //$('#dialog').dialog();
		    $('#dialog_cat').click(function() {
		        $('#dialogCat').dialog();
		        $("#error_cat").html('');
				$("#success_cat").html('');
				$("#txtnamecat").val('');
		        return false;
		    });
		    $('#dialog_brand').click(function() {
		        $('#dialogBrand').dialog();
		        $("#error_brand").html('');
				$("#success_brand").html('');
				$("#txtnamebrand").val('');
		        return false;
		    });
		});
	</script>    

   <div id="dialogCat" title="Category Form" style="display:none"> 
   		<?php
   			echo "<div id='error_cat' class='msg_error'></div>";
   			echo "<div id='success_cat' class='success'></div>";
   			$attr_ = array('name'=>'frm_cat','onSubmit'=>'return validateCategory();');
   			echo form_open('stock/add_category',$attr_);
   				echo "<table align='center'>";
   					echo "<tr>";
   						echo "<td>Category:</td>";
	   					echo "<td>";
	   						$data = array('name'=>'txtnamecat','id'=>'txtnamecat','class'=>'dialog_textbox');
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
	   	function validateCategory(){	
			var msg_error_cat = $("#error_cat");
			var msg_success_cat = $("#success_cat");
			var namcat = document.frm_cat.txtnamecat;
			
			msg_error_cat.html("");
			if(namcat.value == "" || namcat.value == null){
				msg_error_cat.html("Please enter category!");
				namcat.focus();
				return false;				
			}else{			
				var txt = namcat.value;		
				$.get("<?php echo site_url('stock/get_cat_code/"+ txt +"'); ?>",
				   function(data){
				     if(data){				     	
				     	msg_error_cat.html("The category is already exist!");			     	
				     }else{
				     	saveDataCat(txt,msg_success_cat);
				     	namcat.value = "";
				     	msg_error_cat.html("");
				     }
				   });
				return false;
			}	
		}
		function saveDataCat(txt,msg_id){
			$.ajax({
			     type: "POST",
			     url: "<?php echo site_url('stock/add_category'); ?>",
			     data: {'txtnamecat':txt},
			     dataType: 'json',
			     success: function(data)
			     {		     
			        if(data){
			        	msg_id.html("Success to save the category " + txt + " !");		        	
			            var ind_ = 0;
			            $(data).each(function(index, item) {
		                     ind_++;
		                     $("#ddCategory").get(0).options[ind_] = new Option(item.category, item.cat_id);		                     
		                });	        	
			        }else{
			        	msg_id.html("Fail to save!");
			        }
			     }
			});
		}
	
   </script>
   <div id="dialogBrand" title="Brand Form" style="display:none"> 
   		<?php
   			echo "<div id='error_brand' class='msg_error'></div>";
   			echo "<div id='success_brand' class='success'></div>";
   			$attr_ = array('name'=>'frm_brand','onSubmit'=>'return validateBrand();');
   			echo form_open('stock/add_brand',$attr_);
   				echo "<table align='center'>";
   					echo "<tr>";
   						echo "<td>Brand:</td>";
	   					echo "<td>";
	   						$data = array('name'=>'txtnamebrand','id'=>'txtnamebrand','class'=>'dialog_textbox');
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
	   	function validateBrand(){	
			var nambrand = document.frm_brand.txtnamebrand;
			var er_brand = $("#error_brand");
			var suc_brand = $("#success_brand");
						
			er_brand.html("");
			
			if(nambrand.value == "" || nambrand.value == null){				
				er_brand.html("Please enter brand!");
				nambrand.focus();
				return false;				
			}else{			
				var txt = nambrand.value;		
				$.get("<?php echo site_url('stock/get_brand_code/"+ txt +"'); ?>",
				   function(data){
				     if(data){				     	
				     	er_brand.html("The category is already exist!");			     	
				     }else{
				     	saveDataBrand(txt,suc_brand);
				     	nambrand.value = "";
				     	er_brand.html("");
				     }
				   });
				return false;
			}	
		}
		function saveDataBrand(txt,msg_id){
			$.ajax({
			     type: "POST",
			     url: "<?php echo site_url('stock/add_brand'); ?>",
			     data: {'txtnamebrand':txt},
			     dataType: 'json',
			     success: function(data)
			     {		     
			        if(data){
			        	msg_id.html("Success to save the brand " + txt + " !");		        	
			            var ind = 0;
			            $(data).each(function(index, item) {
		                     ind++;
		                     $("#ddBrand").get(0).options[ind] = new Option(item.brand, item.brand_id);		                     
		                });	        	
			        }else{
			        	msg_id.html("Fail to save!");
			        }
			     }
			});
		}
	
   </script>   
   
<?php
	$this->load->view("template/footer"); 
?>