<?php $this->load->view("template/header"); ?>
<?php 
	$path = base_url();
?>
	
		<h1>Reprot</h1>	
		<div class="tab_add_new">
			<div style="margin:-3px 0;">
				<form name="frmsearch" action="" method="post">				
					<input type="hidden" class="text" name="tmpdate" id="tmpdate" />
					<?php
						$url_search = site_url('report/index');
						$url_generate_report = site_url('report/generate_report');
						/*
						$val = (isset($_POST['txtSearch'])?$_POST['txtSearch']:'');
						$data = array('name'=>'txtSearch','value'=>$val,'class'=>'input');
						echo form_input($data);
						*/
						echo "&nbsp;Meterial: ";
						$group = (isset($_POST['ddCategory'])?$_POST['ddCategory']:'');
						echo form_dropdown('ddCategory',$listCategory,$group,'class="input"');									
						
						echo "&nbsp;Status: ";
						$group = (isset($_POST['ddStatus'])?$_POST['ddStatus']:'');
						echo form_dropdown('ddStatus',$listStatus,$group,'class="input"');
						
						echo "&nbsp;Form: ";
						$value = (isset($_POST['txtdate'])?$_POST['txtdate']:'');
						$data = array('name'=>'txtdate','id'=>'txtdate','value'=>$value,'class'=>'date');
						echo form_input($data);
						
						echo "&nbsp;To: ";
						$value = (isset($_POST['txtend'])?$_POST['txtend']:'');
						$data = array('name'=>'txtend','id'=>'txtend','value'=>$value,'class'=>'date');
						echo form_input($data);
					?>					
				
					<a href="javascript:void(0);" onclick="doSearch(document.frmsearch,'<?php echo $url_search; ?>');" title="Report">
						<img src="<?php echo $path;?>assets/images/icons/report.png" alt=""/>
						Report
					</a>
					
					<a href="javascript:void(0);" onclick="doSearch(document.frmsearch,'<?php echo $url_generate_report; ?>');" title="Export CSV">
						<img src="<?php echo $path;?>assets/images/icons/report.png" alt=""/>
						Export Excel
					</a>
										
				</form>
			</div>			
		</div>
		<div class="clear"></div>	
		<table class="tbl">
			<thead>
			<tr>				
				<th>No</th>
				<th>Code</th>
				<th>Serial Number</th>
				<th>Status</th>
				<th>Category</th>				
				<th>Brand</th>
				<th>Date Import</th>				
				<th>Remark</th>			
			</tr>
			</thead>
			<tbody>
			<?php
			if(count($listReport)){		
				$i = 0;
				foreach($listReport as $row):
					$i++;
			?>
			<tr id="bg<?php echo $i; ?>">				
				<td><?php echo $i; ?></td>
				<td><?php echo $row['code']; ?></td>
				<td><?php echo $row['serial_number']; ?></td>
				<td><?php echo $row['status']; ?></td>				
				<td><?php echo $row['category']; ?></td>
				<td><?php echo $row['brand']; ?></td>
				<td><?php echo $row['date_import']; ?></td>
				<td><?php echo $row['remark']; ?></td>			
			</tr>
			<?php
				endforeach;
			}else{
				echo "<tr><td colspan='10'>No result!</td></tr>";
			}
			?>
			</tbody>
		</table>
		
		<?php
	    	echo '<div class="content_pagging">'.$links.'</div>';
		?>

<?php $this->load->view("template/footer"); ?>