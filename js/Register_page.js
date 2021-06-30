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
	if(document.getElementById("cb").checked){
		document.getElementById("bt3").disabled = false;
	}
	else{
		documenr.getElementById("bt3").disabled = true;
	}
}

function disableButton(){
	var checkBox = document.getElementById("cb");

  var text = document.getElementById("bt3");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == false){
    document.getElementById("bt3").disabled = true;
  } else {
    document.getElementById("bt3").disabled = false;
  }
}