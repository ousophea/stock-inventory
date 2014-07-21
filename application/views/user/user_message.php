<?php $this->load->view("template/header"); ?>
<?php 
	$path = base_url();
?>
	<form name="frm" action="" method="post">	
		<h1>User Information</h1>
		<?php
			$userRole = get_cookie('inventory_user_role');
			if($userRole){
		?>			
		<div class="tab_add_new">
			<?php
				echo anchor('user/add',img($path.'assets/images/icons/add.png').'Add New');				
			?>			
		</div>
		<div class="clear"></div>
		<?php } ?>
			
		<table class="tbl">
			<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>			
				<th>Username</th>
				<th>Role</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Action</th>		
			</tr>
			</thead>
			<tbody>
			<?php
			if(count($listUser)){		
				$i = 0;
				foreach($listUser as $row):
					$i++;
					$role = ($row['role']==1?'Administrator':'User');
			?>
			<tr>				
				<td><?php echo $i; ?></td>
				<td><?php echo $row['firstname']; ?></td>				
				<td><?php echo $row['lastname']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $role; ?></td>				
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>				
				<td>
					<?php
						echo anchor('user/edit/'.$row['user_id'],'Edit');
						if($userRole){
							echo ' | ';
							echo anchor('user/delete/'.$row['user_id'],'Delete');
						}
					?>
				</td>
			</tr>
			<?php
				endforeach;
			}
			?>
			</tbody>
		</table>		
	</form>

<?php $this->load->view("template/footer"); ?>