<?php $this->load->view("template/header"); ?>
<div class="main_dashboard">
	<div style="height:20px;">&nbsp;</div>
	<div class="icon" align="center">     	
			<h3 class="icon_menu">Control Panel</h3>
			<?php $path = base_url(); ?>                        
        	<?php echo anchor('stock',img($path.'assets/images/icons/item.png').'<br/><span>View Stock</span>');?>
        	<?php echo anchor('report',img($path.'assets/images/icons/itreport.png').'<br/><span>View Report</span>');?>
        	<?php echo anchor('user',img($path.'assets/images/icons/viewuser.png').'<br/><span>View User</span>');?>
        	<div class="clear"></div>
    </div>
    <!--div class="welcome" style="border-left:1px solid #CCCCCC; padding:0px 0px 50px 20px;"-->
    <div class="welcome">          
       	<div class="box">
	       	<h3 class="icon_chart">Stock Info</h3>
	      	<table border="0" width="90%" cellspacing="4" cellpadding="4">
	      		<tr>
	      			<td width="90">Used</td>
	      			<td width="10">:</td>
	      			<td>
	      				<?php 
	      					$tmpused = $listUsed->used;
	      					if($tmpused>0){
	      						echo anchor('stock/used',$tmpused);
	      					}else{
	      						echo $tmpused;
	      					} 
	      				?>
	      			</td>
	      		</tr>
	      		<tr>
	      			<td>In Stock</td>
	      			<td>:</td>
	      			<td>
	      				<?php 
	      					$tmpstock = $listStock->stock;
	      					if($tmpstock>0){
	      						echo anchor('stock/instock',$tmpstock);
	      					}else{
	      						echo $tmpstock;
	      					} 
	      				?>
	      			</td>
	      		</tr>
	      		<tr>
	      			<td>Problem</td>
	      			<td>:</td>
	      			<td>
	      				<?php 
	      					$tmpproblem = $listProblem->problem;
	      					if($tmpproblem>0){
	      						echo anchor('stock/problem',$tmpproblem);
	      					}else{
	      						echo $tmpproblem;
	      					} 
	      				?>
	      			</td>
	      		</tr>
	      		<tr style="height:50px;">
	      			<td align="right">Total</td>
	      			<td>:</td>
	      			<td><?php echo ($tmpused+$tmpstock+$tmpproblem); ?></td>
	      		</tr>
	      	</table>
      	</div>
    </div>
	<div style="clear:both;"></div>
</div>

<?php $this->load->view("template/footer"); ?>