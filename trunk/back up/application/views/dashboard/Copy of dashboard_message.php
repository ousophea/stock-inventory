<?php $this->load->view("template/header"); ?>
<div class="main_dashboard">
	<div class="icon" align="center">      	
		<h3>Control Panel</h3>
		<?php $path = base_url(); ?>                        
        <?php echo anchor('stock',img($path.'assets/images/icons/item.png').'<br/><span>View Stock</span>');?>
        <?php echo anchor('report',img($path.'assets/images/icons/itreport.png').'<br/><span>View Report</span>');?>
        <?php echo anchor('user',img($path.'assets/images/icons/viewuser.png').'<br/><span>View User</span>');?>
    </div>
    <div class="welcome" style="border-left:2px solid #ffffff; padding:10px 0 50px 20px;">          
       	<h3>Vision </h3>
      	<p>
      		To be the leading, sustainable microfinance provider, helping clients to succeed in their businesses by providing suitable financial services to contribute to the development of Cambodia.
      	</p>
        <h3>Mission</h3>
      	<p>
      		HKL is committed to long-term social and financial sustainability and improving the income of its clients. HKL provides loans, savings, and other inclusive financial services countrywide, in particular to women and low income families in rural areas. 
      	</p>
    </div>
	<div style="clear:both;"></div>
</div>

<?php $this->load->view("template/footer"); ?>