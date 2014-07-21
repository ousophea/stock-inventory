<?php $this->load->view("template/header"); ?>
<?php 
	$path = base_url();
?>
	
		<h1>Problem Information</h1>	
		<div class="tab_add_new">
			<div class="form_search">
				<form name="frmsearch" action="" method="post">				
					
					<?php
						$val = (isset($_POST['txtSearch'])?$_POST['txtSearch']:'');
						$data = array('name'=>'txtSearch','value'=>$val,'class'=>'title');
						echo form_input($data);
						$url_search = site_url('problem/search');
					?>
					<a href="javascript:void(0);" onclick="doSearch(document.frmsearch,'<?php echo $url_search; ?>');" title="Search">
						<img src="<?php echo $path;?>assets/images/icons/search.png" alt=""/>
						Search
					</a>
				</form>
			</div>
			<div>&nbsp;</div>	
		</div>
		<div class="clear"></div>
		<div class="tab" style="padding:5px 5px 5px 0;">
			<?php				
				echo anchor('problem','Open <span>('.$open->Open.')</span>','id="open"').' | ';
				echo anchor('problem/resolved','Resolved <span>('.$resolved->Resolved.')</span>','id="resolved"').' | ';
				echo anchor('problem/closed','Closed <span>('.$closed->Closed.')</span>','id="closed"');				
			?>
		</div>
	<form name="frm" action="" method="post">	
		<table class="tbl">
			<thead>
			<tr>
				<th><input type="checkbox" name="all" onclick="checkAndUncheck(document.frm);"/></th>
				<th>No</th>
				<th>Code</th>
				<th>Serial Number</th>
				<th>Location</th>
				<th>Priority</th>
				<th>Process</th>				
				<th>Remark</th>
				<th>Message</th>				
				<th>Action</th>			
			</tr>
			</thead>
			<tbody>
			<?php
			if(count($listStock)){		
				$i = 0;
				foreach($listStock as $row):
					$i++;
					$id = $row['pro_id'];
			?>
			<tr id="bg<?php echo $i; ?>">
				<td><input type="checkbox" value="<?php echo $row['stock_id']; ?>" onclick="isCheckedBox('ch<?php echo $i; ?>','bg<?php echo $i; ?>')" name="chkboxes[]" id="ch<?php echo $i; ?>"/></td>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['code']; ?></td>
				<td><?php echo $row['serial_number']; ?></td>
				<td><?php echo $row['location']; ?></td>
				<td><?php echo $row['priority']; ?></td>
				<td><?php echo $row['process']; ?></td>				
				<td><?php echo $row['remark']; ?></td>
				<td><?php echo $row['msg']; ?></td>
				<td>
					<?php						
						echo anchor('problem/review/'.$id,'Review').' | ';
						echo anchor('problem/delete/'.$id,'Delete');
					?>
				</td>			
				
			</tr>
			<?php
				endforeach;
			}else{
				echo "<tr><td colspan='10'>No record(s)!</td></tr>";
			}
			?>
			</tbody>
		</table>
		
		<?php
	    	echo '<div class="content_pagging">'.$links.'</div>';
		?>
	</form>
	<script type="text/javascript">
		id_='<?php echo '#'.$current; ?>'.toLowerCase();
		$(id_).addClass('current');
	</script>
<?php $this->load->view("template/footer"); ?>