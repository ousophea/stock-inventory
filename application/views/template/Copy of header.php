<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php $path = base_url(); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!--link rel="icon" href="<?php echo $path; ?>assets/images/icons/favicon.ico" type="image/x-icon"></link-->
        <link rel="icon" href="<?php echo $path; ?>assets/images/logo_ddd.png" type="image/png" />
        <title>Stock Inventory</title>
                
        <script type="text/javascript" src="<?php echo $path; ?>assets/js/jquery-1.4.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>assets/css/layout.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>assets/css/menu_style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>assets/css/format.css"/>
        <script type="text/javascript" src="<?php echo $path; ?>assets/js/javascript.js"></script>       
        
        <link type="text/css" rel="stylesheet" href="<?php echo $path; ?>assets/css/jquery-ui.css" />
		<script type="text/javascript" src="<?php echo $path; ?>assets/js/jquery-ui.min.js"></script>
		
		        
    </head>
    <body>
    <div class="page">
            <!--start header-->
        <div class="header">
            <div id="header_logo">            	
            	<a href="/main.htm">
            		<img border="0" src="<?php echo $path; ?>assets/images/ddd.png" alt=""/>            		
            	</a>
            </div>            
        </div>
        <!--end header-->
		
		<!--start menu-->		  
		<?php $this->load->view("template/menu"); ?>				
		<!--end menu-->
        
        <!--start content-->
        <div class="content">
        
        	<!--start main-->
            <div class="main">            	
		    	
