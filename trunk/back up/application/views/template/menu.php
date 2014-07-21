<div class="menu">
	<div class="wrapper1">
		<div class="wrapper">
		    <!-- start nav-wrapper  -->
		    <div class="nav-wrapper">	        
		        <!-- start nav  -->
		        <div class="nav">
		            <ul id="navigation">
		                <li>
							<?php 
								echo anchor('dashboard','				
		                    	<span class="menu-left">&nbsp;</span>
		                    	<span class="menu-mid">Dashboard</span>
		                    	<span class="menu-right">&nbsp;</span>');
		                    ?>
		                </li>
		                <li >              
							<a>
		                    	<span class="menu-left">&nbsp;</span>
		                    	<span class="menu-mid">Inventory</span>
		                    	<span class="menu-right">&nbsp;</span>
		                    </a>    
		                   
		                    <div class="sub">
		                        <ul>                                    	
		                        	<li><?php echo anchor('item','Item');?></li>
		                            <li><?php echo anchor('stock','Stock');?></li>                                       
		                        </ul>
		                        <div class="btm-bg">&nbsp;</div>
		                    </div>
		                </li>
		                <li class="">
		                    <a>
		                        <span class="menu-left">&nbsp;</span>
		                        <span class="menu-mid">Tracking</span>
		                        <span class="menu-right">&nbsp;</span>
		                    </a>
		                    <div class="sub">                                
		                        <ul>                                    
		                        	<li><?php echo anchor('report','Report','class="report"');?></li>		                        	
		                        </ul>
		                        <div class="btm-bg">&nbsp;</div>
		                    </div>
		                </li>
		                
		                <li class="last">
		                    <a>
		                    	<span class="menu-left">&nbsp;</span>
		                        <span class="menu-mid">Setting</span>
		                        <span class="menu-right">&nbsp;</span></a>
		                    <div class="sub">
		                        <ul>		                        	                                    	
		                        	<li><?php echo anchor('user','User');?></li>
		                        	<li><?php echo anchor('trash','Trash');?></li>                                       
		                        	<li><?php echo anchor('login/logout','Log out');?></li>
		                        </ul>
		                        <div class="btm-bg">&nbsp;</div>
		                    </div>                                
		                </li>
		                
		           	</ul>
		        </div>
				<!-- end nav  -->   
		    </div>
		    <!-- end nav-wrapper  -->	        
		</div>
	</div>
</div>