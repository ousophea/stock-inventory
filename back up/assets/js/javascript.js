function disActivateRecord(id,activate){
	if(activate==1){
		activate=0;
	}else{
		activate=1;
	}
	window.location="activatePage.htm?id=" +id+"&activate=" +activate;
}

function validateAddUser(){
	var emailFilter=/^.+@.+\..{2,4}$/;
	var msg=document.getElementById("errorMsg");
	var uName=document.frmUser.userName;
	var pwd=document.frmUser.password;
	var conpwd=document.frmUser.confirmPassword;
	var email = document.frmUser.email;
	
	if(uName.value==""){
		msg.innerHTML="Please enter username!";
		uName.focus();
		return false;
	}else if(pwd.value==""){
		msg.innerHTML="Please enter password!";
		pwd.focus();
		return false;
	}else if(conpwd.value==""){
		msg.innerHTML="Please enter confirm password!";
		conpwd.focus();
		return false;
	}else if(pwd.value != conpwd.value){
		msg.innerHTML="Confirm password doesn't match password!";
		conpwd.focus();
		return false;
	}else if(!emailFilter.test(trim(email.value))){		
		msg.innerHTML="The email is invalid!";
		email.focus();
		return false;
	}
	
}

function validateEditUser(){
	var emailFilter=/^.+@.+\..{2,4}$/;
	var msg=document.getElementById("errorMsg");
	var uName=document.frmUser.userName;
	var pwd=document.frmUser.password;
	var conpwd=document.frmUser.confirmPassword;
	var role = document.frmUser.role;
	var email = document.frmUser.email;
	
	if(uName.value==""){
		msg.innerHTML="Please enter username!";
		uName.focus();
		return false;
	}else if(pwd.value != conpwd.value){
		msg.innerHTML="Confirm password doesn't match password!";
		conpwd.focus();
		return false;
	}else if(role.value == 0){
		msg.innerHTML="Please select role!";
		role.focus();
		return false;
	}else if(!emailFilter.test(trim(email.value))){		
		msg.innerHTML="The email is invalid!";
		email.focus();
		return false;
	}
	
}

function validateAddItem(){
	var msg=document.getElementById("errorMsg");
	var code=document.frm.code;
	var serial=document.frm.ddSerial;
	var location=document.frm.ddLocation;
	
	if(serial.value == 0){
		msg.innerHTML="Please select serial number!";
		serial.focus();
		return false;
	}else if(code.value == ""){
		msg.innerHTML="Please enter code!";
		code.focus();
		return false;
	}else if(location.value == 0){
		msg.innerHTML="Please select location!";
		location.focus();
		return false;
	}
	
}
function validateEditItem(){
	var msg=document.getElementById("errorMsg");
	var code=document.frm.code;
	var location=document.frm.ddLocation;
	
	if(code.value == ""){
		msg.innerHTML="Please enter code!";
		code.focus();
		return false;
	}else if(location.value == 0){
		msg.innerHTML="Please select location!";
		location.focus();
		return false;
	}
	
}


function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode;
 	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

 	return true;
}

function trim(s) {
	return s.replace(/^\s+|\s+$/g,"");
}

function IsUSPhoneNumber(objdata,separator,firstL,secondL,thirdL,message)
{
	/*var value		= objdata.value;
	var valArr		= value.split(separator);
	var digit		= "99999";
	var errMessage	= "[Ex: " + digit.substr(0,firstL) + "-" + digit.substr(0,secondL) + "-" + digit.substr(0,thirdL) + "]";
	if (valArr.length == 3)
	{
		//
		var IsNo = 1;
		if ( valArr[0].length == firstL && valArr[1].length == secondL && valArr[2].length == thirdL)
		{
			if ( isNaN(valArr[0]) ) IsNo = 0;
			if ( isNaN(valArr[1]) ) IsNo = 0;
			if ( isNaN(valArr[2]) ) IsNo = 0;
			
			if ( IsNo == 0 )
			{
				alert("Please enter a valid data " + message + "\n" + errMessage);
				return false;
			}
		}
		else
		{
			alert("Please enter valid " + message + "\n" + errMessage);
			return false;
		}
	}
	else
	{
		alert("Please enter valid " + message + "\n" + errMessage);
		return false;
	}
	
return true;*/


	if(!(/^\d{3}-\d{3}-\d{4}$/).test(objdata.value))
    {
        alert("Please enter valid " + message + "\n" + "[Ex: 999-999-9999]");
        return (/^\d{3}-\d{3}-\d{4}$/).test(objdata.value);
    }
    else
        return (/^\d{3}-\d{3}-\d{4}$/).test(objdata.value);

}

function checkFormatPhone(objdata,pattern){
	//var pattern=/^\d{3}-\d{3}-\d{3,4}$/;
	if(!(pattern).test(objdata.value))
	{			
		objdata.focus();
		objdata.select();
		return (pattern).test(objdata.value);
	}
	else{
		return (pattern).test(objdata.value);
	}
}

function checkBeforeDelete(){
	return confirm('Are you sure you want to delete?');
}


function checkAndUncheck_(){	
	var emeleneCheck = document.getElementsByTagName("input");
	var maincheck = document.frm.all;
	if(maincheck.checked == true ){
		for (i = 1; i < emeleneCheck.length; i++){		
			document.getElementById("ch"+i).checked = true;
			//document.getElementById("d"+(i+1)).style.background="#F4E2E1";		
		}		
	}
	else{
		for (i = 1; i < emeleneCheck.length; i++){			
			document.getElementById("ch"+i).checked = false;
			//document.getElementById("d"+(i+1)).style.background="";
		}
	}
}

function checkAndUncheck(formName){	
		
	var chks = formName.elements["chkboxes[]"];
	var maincheck = formName.all;
	
	if(maincheck.checked == true ){
		for (i = 0; i < chks.length; i++){		
			chks[i].checked = true;
			var bg = "bg"+(i+1);
			document.getElementById(bg).style.background="#F4E2E1";		
		}
				
	}
	else{
		for (i = 0; i < chks.length; i++){		
			chks[i].checked = false;
			var bg = "bg"+(i+1);
			document.getElementById(bg).style.background="";		
		}
	}
}

function doSubmit(formName,msg,doaction){
	
	if(isChecked(formName.elements["chkboxes[]"])){
		var conf=confirm("Are you sure you want to "+ msg +" the document(s)?");
		if(conf){
			formName.action=doaction;
			formName.submit();			
		}s
	}else{
		alert("Please check an item!");
	}
}

function isChecked(chks){
	var bool = false;
	for (i = 0; i < chks.length; i++){			
		var chk = chks[i];
		if(chk.checked){
			bool = true;
		}
	}	
	return bool;
}

function isCheckedBox(ch,id){
	//alert(id);
	checkbox=document.getElementById(ch);
	row=document.getElementById(id);
	//alert(checkbox.id);
	if(document.getElementById(ch).checked==true){
		row.style.background="#F4E2E1";		
	}else{
		row.style.background="";		
	}
}

function validateAddStock(){
	var msg=document.getElementById("errorMsg");
	var serial=document.frm.serialNumber;	
	var category=document.frm.ddCategory;
	var brand = document.frm.ddBrand;
	var dat = document.frm.txtdate;
	
	if(serial.value == ""){
		msg.innerHTML="Please enter name!";
		serial.focus();
		return false;
	}else if(category.value == 0){
		msg.innerHTML="Please select brand!";
		category.focus();
		return false;
	}else if(brand.value == 0){		
		msg.innerHTML="Please select model!";
		brand.focus();
		return false;
	}else if(dat.value==""){
		msg.innerHTML="Please select model!";
		dat.focus();
		return false;
	}
	
}

function doSearch(formName,doaction){
	formName.action=doaction;
	formName.submit();
}

