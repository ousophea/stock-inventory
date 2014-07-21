                	
			         
               
        </div>
        <!--end content-->

        <!--start footer-->             
        <div class="footer-bar clearfix">
            <div class="footer content clearfix">
                &copy; Stock Inventory 2012 DDD.
            </div>
        </div>
        <!--end footer-->
    </div>
    <script type="text/javascript">			
		$(document).ready(function() {
			if(document.getElementById('txtdate')!=null){			   
				$('#txtdate').datepicker({
					//numberOfMonths:2,							   
					dateFormat:'yy-mm-dd',							  
					yearRange: '2009:2014',
					buttonImage: ' <?php echo base_url().'assets/images/calendar.gif'; ?>',  
					buttonImageOnly: true,  
					showOn: 'button',
					changeMonth:true,
					changeYear:true,
					buttonText: 'Calendar',
					readonly:true
			   });
			}
			
			if(document.getElementById('txtend')!=null){			   
				$('#txtend').datepicker({
					//numberOfMonths:2,							   
					dateFormat:'yy-mm-dd',							  
					yearRange: '2009:2014',
					buttonImage: ' <?php echo base_url().'assets/images/calendar.gif'; ?>',  
					buttonImageOnly: true,  
					showOn: 'button',
					changeMonth:true,
					changeYear:true,
					buttonText: 'Calendar',
					readonly:true
			   });
			}
		});
		
		function getCurrentDate(){
			var arr=new Array();
			
			date=new Date()
			tom_day=date.getDate();
			tom_month=date.getMonth()+1;
			tom_year=date.getFullYear();
			
			if(tom_day>=1 && tom_day<=9){
				tom_day='0' + tom_day;
			}
			
			if(tom_month>=1 && tom_month<=9){
				tom_month='0' + tom_month;
			}
			
			arr[0]=tom_year;
			arr[1]=tom_month;
			arr[2]=tom_day;
			//alert(arr[2]);
			return arr;
		}
		
		var date = getCurrentDate()[0] +'-'+ getCurrentDate()[1] +'-'+ getCurrentDate()[2] ;
		if($('#txtdate').val() == ""){
			$('#txtdate').val(date);
		}
		if($('#txtend').val() == ""){
			$('#txtend').val(date);
		}
		
		if(document.getElementById("tmpdate") != null){
			$('#tmpdate').val(date);
		}
		
		var obj = $(".content");
		var h = ($(window).height()-216)+'px';
		//$(obj).css({height:h});
	</script>
</body>
    
</html>
