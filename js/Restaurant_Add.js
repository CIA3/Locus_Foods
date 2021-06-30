function formValidation1(){
	
	var Restaurant_Name = document.getElementById("restaurantN").value;
	var Restaurant_Address = document.getElementById("restAdd").value;
	var Phone_Number = document.getElementById("Pno").value;
	var Cuisine_Type = document.getElementById("ctyp").value;
	var Postal_Code= document.getElementById("Pcode").value;
	var Username = document.getElementById("Uname").value;
    var R_Logo = document.getElementById("restl").value;
	var R_Images = document.getElementById("resti").value;
	var R_Bio = document.getElementById("restb").value;
	
	
	if( Restaurant_Name == "" ){
		
		alert("Restaurant name must be filled out");
		return false;
	}
	
	if(Restaurant_Address == "" ){
		
		alert("Restaurant address must be filled out");
		return false;
	}
	
	if(Phone_Number == "" ){
		
		alert("Phone number must be filled out");
		return false;
	}
	
	if(isNaN(Phone_Number)){
		
		alert("Phone number must contain only numbers");
		return false;
	}
	
	if(Phone_Number.length != 10){
		
		alert("Phone number must be 10 digit");
		return false;
	}
	
	if(Cuisine_Type == "" ){
		
		alert("Cuisine Type must be filled out");
		return false;
	}
	
	if(Postal_Code == "" ){
		
		alert("Postal code must be filled out");
		return false;
	}
	
	if(isNaN(Postal_Code)){
		
		alert("Postal code must contain only numbers");
		return false;
	}
	
	if(Username == "" ){
		
		alert("Username must be filled out");
		return false;
	}
	
	if(R_Logo == "" ){
		
		alert("You should choose a logo for the restaurant");
		return false;
	}
	
	if(R_Images == "" ){
		
		alert("You should choose images for the restaurant");
		return false;
	}
	
	if(R_Bio == "" ){
		
		alert("You should give a description of the restaurant");
		return false;
	}
	
	
	if(document.getElementById("pwd").value != document.getElementById("rpwd").value){
		
		alert("Password Mismatch!!");
		return false;

	}
	else{
		
		
		return true;
	}
	
	
}

function enableButton() {
	
	if(document.getElementById("T&C").checked){
		document.getElementById("btns").disabled=false;
	}
	else{
		
		document.getElementById("btns").disabled=true;
		
	}
}
