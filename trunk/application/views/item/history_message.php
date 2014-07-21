<?php $this->load->view("template/header"); ?>
<?php 
	$path = base_url();
?>
	
		<h1>History Information</h1>	
			
		<table class="tbl">
			<thead>
			<tr>				
				<th>No</th>
				<th>Code</th>
				<th>Serial Number</th>
				<th>Status</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Location</th>
				<th>User</th>
				<th>Date</th>
				<th>Remark</th>
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
				<td><?php echo $i; ?></td>
				<td><?php echo $row['code']; ?></td>
				<td><?php echo $row['serial_number']; ?></td>				
				<td><?php echo $row['status']; ?></td>
				<td><?php echo $row['category']; ?></td>
				<td><?php echo $row['brand']; ?></td>
				<td><?php echo $row['location']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['date_created']; ?></td>
				<td><?php echo $row['remark']; ?></td>
				<td><?php echo $row['do_action']; ?></td>			
			</tr>
			<?php
				endforeach;
			}else{
				echo "<tr><td colspan='11'>No record(s)!</td></tr>";
			}
			?>
			</tbody>
		</table>
	
<?php $this->load->view("template/footer"); ?>