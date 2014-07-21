function doSubmit_(formName,msg,doaction){	
	
	if(isChecked()){
		var conf=confirm("Are you sure you want to "+ msg +" the document(s)?");
		if(conf){
			formName.action=doaction;
			formName.submit();			
		}
	}else{
		alert("Please check an item!");
	}
}

function isChecked(){	
	var bool = false;
	var emeleneCheck = document.getElementsByTagName("input");
	for (i = 1; i < emeleneCheck.length; i++){		
		//alert();
		var chk = document.getElementById("ch"+i).checked;
		alert(chk);	
		if(chk)
		{
			bool = true;
		}		
	}	
	return bool;
}