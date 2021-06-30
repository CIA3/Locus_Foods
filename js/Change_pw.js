

function checkPassword(){
	if(document.getElementById("pwd").value != document.getElementById("rpwd").value){
		alert("Passwords does not matched!!");
		return false;
	}
	
	else{
		alert("Password maches!!");
		return true;
	}
}

function enableButton(){
	if(document.getElementById("tc").checked){
		document.getElementById("sbtn").disabled = false;
	}
	else{
		documenr.getElementById("sbtn").disabled = true;
	}
}