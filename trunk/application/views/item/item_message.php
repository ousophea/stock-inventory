<?php $this->load->view("template/header"); ?>
<?php 
	$path = base_url();
?>
	
		<h1>Item Information</h1>	
		<div class="tab_add_new">
			<div class="form_search">
				<form name="frmsearch" action="" method="post">					
					<?php
						$val = (isset($_POST['txtSearch'])?$_POST['txtSearch']:'');
						$data = array('name'=>'txtSearch','value'=>$val,'class'=>'title');
						echo form_input($data);
						$url_search = site_url('item/search');
					?>
					<a href="javascript:void(0);" onclick="doSearch(document.frmsearch,'<?php echo $url_search; ?>');" title="Search">
						<img src="<?php echo $path;?>assets/images/icons/search.png" alt=""/>
						Search
					</a>
				</form>
			</div>
		
		
	<form name="frm" action="" method="post">
			
			<?php
				echo anchor('item/add',img($path.'assets/images/icons/add.png').'Add New');				
			?>
			<a href="javascript:void(0);" onclick="doSubmit(document.frm,'delete','item/deleteall');" title="Delete">
				<img src="<?php echo $path;?>assets/images/icons/delete.gif" alt=""/>
				Delete
			</a>
			
		</div>
		<div class="clear"></div>	
		<table class="tbl">
			<thead>
			<tr>
				<th><input type="checkbox" name="all" onclick="checkAndUncheck(document.frm);"/></th>
				<th>No</th>
				<th>Code</th>
				<th>Serial Number</th>
				<th>Status</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Location</th>
				<th>Remark</th>
				<th>History</th>			
				<th>Action</th>			
			</tr>
			</thead>
			<tbody>
			<?php
			if(count($listItem)){		
				$i = 0;
				foreach($listItem as $row):
					$i++;
			?>
			<tr id="bg<?php echo $i; ?>">
				<td><input type="checkbox" value="<?php echo $row['stock_id']; ?>" onclick="isCheckedBox('ch<?php echo $i; ?>','bg<?php echo $i; ?>')" name="chkboxes[]" id="ch<?php echo $i; ?>"/></td>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['code']; ?></td>
				<td><?php echo $row['serial_number']; ?></td>				
				<td><?php echo $row['status']; ?></td>
				<td><?php echo $row['category']; ?></td>
				<td><?php echo $row['brand']; ?></td>
				<td><?php echo $row['location']; ?></td>
				<td><?php echo $row['remark']; ?></td>
				<td><?php echo anchor('item/history/'.$row['stock_id'],'History'); ?></td>
				<td>
					<?php
						echo anchor('item/edit/'.$row['stock_id'],'Edit').' | ';
						echo anchor('item/delete/'.$row['stock_id'],'Delete');
					?>
				</td>			
				
			</tr>
			<?php
				endforeach;
			}else{
				echo "<tr><td colspan='11'>No record(s)!</td></tr>";
			}
			?>
			</tbody>
		</table>
		
		<?php
	    	echo '<div class="content_pagging">'.$links.'</div>';
		?>
	</form>

<?php $this->load->view("template/footer"); ?>