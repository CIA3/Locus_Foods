function formValidation(){
	
	var Fname = document.getElementById("fname").value;
	var Lname = document.getElementById("lname").value;
	var no = document.getElementById("mobile").value;
	var Email = document.getElementById("emailAdd").value;
	var Comment = document.getElementById("cmnt").value;
	
	
	
	if(Fname =="" ){
		
		alert("First name must be filled out");
		return false;
	}
	
	if(Lname =="" ){
		
		alert("Last name must be filled out");
		return false;
	}

	if(no =="" ){
		
		alert("Mobile number must be filled out");
		return false;
	}
	
	if(isNaN(no)){
		
		alert("mobile number must contain only numbers");
		return false;
	}
	
	if(no.length != 10){
		
		alert("Mobile number must be 10 digit");
		return false;
	}
	
	
	if(Email =="" ){
		
		alert("Email must be filled out");
		return false;
	}
	
	
	if(Comment =="" ){
		
		alert("Please put your comments");
		return false;
	}
	
	
	else{
		
		alert("Successfully submitted");
		return true;
	}
}



  